 <?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Adsapi extends CI_Controller {
     
     function __construct() {
      parent::__construct();
         if (!$this->session->has_userdata('is_logged_in')) {
             redirect(base_url().'login');
         }
      // $this->load->helper('form');
      $this->load->model('Mainmodel', 'mm'); 
         $this->load->helper('form');
         $this->load->library('email');
     }

     public function index() { 
 
     }


 public function adtype(){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.myhomeport.info/api/v1.0/business/types");
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: 77351569-09ab-4236-92d7-e9b2848328da',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode( curl_exec($ch), true );
        curl_close($ch);
         
        echo $output;

    }

    public function advertisers($id = ''){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.myhomeport.info/api/v1.0/business/type/".$id);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: 77351569-09ab-4236-92d7-e9b2848328da',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode( curl_exec($ch), true );
        curl_close($ch);
         

        $data['data'] = $output;
        $data['title'] = 'General Advertisers';
        $data['msg'] = $this->session->flashdata('msg');
        $data['view'] = $this->load->view('admin/advertisers', $data, TRUE);
        $this->load->view('admin/main', $data);

    }

    public function addtype($id = ''){

        $data = $this->mm->fetchArr('businesstypes', '', ['id' => $id])[0];

        $post['types'] = array($data['name']);
        $post = json_encode($post); 
        // print_r($post); die;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.myhomeport.info/api/v1.0/business/types");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: 77351569-09ab-4236-92d7-e9b2848328da',
            'Content-Type: application/json',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data['info'] = curl_getinfo($ch);

        $data['data'] = json_decode(curl_exec($ch), true); 

        $data['resCode'] = $data['info']['http_code'];

        curl_close($ch); 

          // print_r($data['data'][0]['_id']);

        if (isset($data['data'][0]['_id'])) {
          $this->mm->updateRow('businesstypes', ['typeId' => $data['data'][0]['_id'], 'apicheck' => 'yes'], ['id' => $id]);
        }
 
        if (isset($data['data'][0]['_id'])) {
            echo '<span class="alert alert-success">Record added successfully</span>';
        } else {
            echo '<span class="alert alert-danger">Couldn\'t add the record</span>';
        }

    }

    public function api_deletetype($typeId = ''){ 

        if( $typeId == '' ) {  
            $this->session->set_flashdata('msg', '<span class="alert alert-danger">Could not delete.</span>'); 
            return false; 
        }
         
        $post['ids'] = array($typeId); 
        $post = json_encode($post); 
        // print_r($post); die;
        

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.myhomeport.info/api/v1.0/business/types",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "DELETE",
          CURLOPT_POSTFIELDS => $post,
          CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Authorization: 77351569-09ab-4236-92d7-e9b2848328da",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Type: application/json",
            "Host: api.myhomeport.info",
            "Postman-Token: 7dbde3c1-a02b-4472-a76e-ffbc8a62a814,0c56fb1c-1b8c-4f2b-9117-0a71e3c2f787",
            "User-Agent: PostmanRuntime/7.15.0",
            "accept-encoding: gzip, deflate",
            "cache-control: no-cache",
            "content-length: 36"
          ),
        ));

        $response = json_decode(curl_exec($curl), true);

        $err = curl_error($curl);

        curl_close($curl);
         
        if ($err) { 
            // $this->session->set_flashdata('msg', '<span class="alert alert-danger ">"cURL Error #:" . $err</span>');
          echo $err;
        } else {
          if (isset($response['result'])) {
              echo 'success';
          }
            // $this->session->set_flashdata('msg', '<span class="alert alert-success">Deleted successfully</span>');
        } 

    }

    public function adbusiness($id = '', $name = '') {
        
        $name = urldecode($name);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.myhomeport.info/api/v1.0/business/type/".$id);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: 77351569-09ab-4236-92d7-e9b2848328da',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode( curl_exec($ch), true );
        curl_close($ch);
         // print_r($output);die;
        
    }

    public function insertbusiness($id, $apitypeid) {
       
      $data['data'] = $this->mm->fetchArr('business', '', ['id' => $id])[0];
      // print_r($data);
      // die;

      $address = '';
      if ($data['data']['AddressLine2'] == '') {

        $address = ucfirst($data['data']['AddressLine1']).", ".strtoupper($data['data']['PostCode']);

      } elseif ($data['data']['AddressLine3'] == '') {

        $address = ucfirst($data['data']['AddressLine1']).", ".ucfirst($data['data']['AddressLine2']).", ".strtoupper($data['data']['PostCode']);

      } else {
        $address = ucfirst($data['data']['AddressLine1']).", ".ucfirst($data['data']['AddressLine2']).", ".ucfirst($data['data']['AddressLine3']).", ".strtoupper($data['data']['PostCode']);
      }

      if ($data['data']['apitypeId'] == '') {
        echo '<span class="alert alert-info">Need to push the business category first</span>'; return;
      }

      $postdata = array(
           'typeId'      => $data['data']['apitypeId'],
           'name'        => ucfirst($data['data']['name']),
           'phone'       => array($data['data']['tel']),
           'email'       => $data['data']['email'],
           'web'         => $data['data']['web'],
           'address'     => $address,
           'location'    => array(
                'latitude' => (double)$data['data']['lat'], 
                'longitude' => (double)$data['data']['longitude']
            )
        );
        
       $jsondata = json_encode($postdata);

       // echo '$jsondata';
       // print_r($jsondata); die;
 
       $curl = curl_init();

       curl_setopt_array($curl, array(
         CURLOPT_URL => "https://api.myhomeport.info/api/v1.0/business",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS => $jsondata,
         CURLOPT_HTTPHEADER => array( 
             "Authorization: 77351569-09ab-4236-92d7-e9b2848328da", 
             "Content-Type: application/json", 
           ),
         ));

       $response = json_decode( curl_exec($curl), true );
       $err = curl_error($curl);

       curl_close($curl);

       print_r($response);


       if ($err) {
         echo "cURL Error #:" . $err;
       } else { 

          $this->mm->updateRow('business', ['_id' => $response['_id']], ['id' => $id]);
          echo 'success';

       }
    }

    public function updatebusiness(){

       $data['data'] = $this->mm->fetchArr('business', '', ['id' => $id])[0];
       // print_r($data);
       // die;

       $address = '';
       if ($data['data']['AddressLine2'] == '') {

         $address = ucfirst($data['data']['AddressLine1']).", ".strtoupper($data['data']['PostCode']);

       } elseif ($data['data']['AddressLine3'] == '') {

         $address = ucfirst($data['data']['AddressLine1']).", ".ucfirst($data['data']['AddressLine2']).", ".strtoupper($data['data']['PostCode']);

       } else {
         $address = ucfirst($data['data']['AddressLine1']).", ".ucfirst($data['data']['AddressLine2']).", ".ucfirst($data['data']['AddressLine3']).", ".strtoupper($data['data']['PostCode']);
       }

        $postdata = array(
          '_id'         => $this->input->post('_id'),
          'typeId'      => $data['data']['apitypeId'],
          'name'        => ucfirst($data['data']['name']),
          'phone'       => array($data['data']['tel']),
          'email'       => $data['data']['email'],
          'web'         => $data['data']['web'],
          'address'     => $address,
          'location'    => array(
               'latitude' => (double)$data['data']['lat'], 
               'longitude' => (double)$data['data']['longitude']
          )
        );

        
        
       $jsondata = json_encode($postdata);

       // echo '$jsondata';
       // print_r($jsondata); die;
 
       $curl = curl_init();

       curl_setopt_array($curl, array(
         CURLOPT_URL => "https://api.myhomeport.info/api/v1.0/business",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "PUT",
         CURLOPT_POSTFIELDS => $jsondata,
         CURLOPT_HTTPHEADER => array( 
             "Authorization: 77351569-09ab-4236-92d7-e9b2848328da", 
             "Content-Type: application/json", 
           ),
       ));

       $response = json_decode( curl_exec($ch), true );
       $err = curl_error($curl);

       curl_close($curl);

       if ($err) {
         echo "cURL Error #:" . $err;
       } else {
         echo $response;
       }
    }

    public function getbusiness($id = ""){


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.myhomeport.info/api/v1.0/business/".$id,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Authorization: 77351569-09ab-4236-92d7-e9b2848328da",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Type: application/json",
            "Host: api.myhomeport.info",
            "Postman-Token: 267f7c72-a82d-462d-afe3-0f1f05ece8c8,4d9b3e74-0190-4694-bea1-a0ace3089888",
            "User-Agent: PostmanRuntime/7.15.0",
            "accept-encoding: gzip, deflate",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          $data['fail'] = "cURL Error #:" . $err;
        } else {
          $data['response'] = $response;
        }

        $data['typeid'] = $id;
        $data['data'] = json_decode($response, True);
        $data['title'] = ' Business';
        $data['msg'] = $this->session->flashdata('msg');
        $data['view'] = $this->load->view('admin/getbusiness', $data, TRUE);
        $this->load->view('admin/main', $data);

    }

    public function deletebusiness($businessid = '', $apibusinessid = ""){
 

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.myhomeport.info/api/v1.0/business/".$apibusinessid,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "DELETE",
          CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Authorization: 77351569-09ab-4236-92d7-e9b2848328da",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Type: application/json",
            "Host: api.myhomeport.info",
            "Postman-Token: 4593aeaa-b7ad-4d85-a586-499386310516,f6846f95-c79b-4d34-9a4d-0bd78b89a61a",
            "User-Agent: PostmanRuntime/7.15.0",
            "accept-encoding: gzip, deflate",
            "cache-control: no-cache",
            "content-length: "
          ),
        ));

        $response = json_decode( curl_exec($curl), true );
        $err = curl_error($curl);

        curl_close($curl);
 
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          $this->mm->deleteRow('business', ['id' => $businessid]);
          $this->session->set_flashdata('msg', '<span class="alert alert-success">Deleted Successfully</span>');
          redirect('admin/businesses/'.$this->session->userdata('typeId').'/'.$this->session->userdata('typeName'));
        }
    } 

  
}

// {
//     "address": "Swansea Marina, Lockside,Swansea,SA1 1WG",
//     "phone": ["01792 470310"],
//     "email": "swanmar@swansea.gov.uk",
//     "web": "http://www.swanseamarina.org.uk/",
//     "facebook": "https://www.facebook.com/swanseamarina",
//     "flickr":"https://www.flickr.com/photos/swanseamarina",
//     "twitter":"http://twitter.com/swanseamarina",
//     "security": ["01792 646440"],
//     "vhf":80,
//     "waypoint": "51° 36′.40N 03° 55′.60W",
//     "openingHours":[
//             {"day":"Monday - Friday","time":"7AM-7PM"},
//             {"day":"Saturday","time":"7AM-10PM"},
//             {"day":"Sunday","time":"7AM-10PM"}
//      ],
//      "location": {"latitude":51.6166388, "longitude":-3.9340329}
// }


// {
//     "address": "Swansea Marina, Lockside,Swansea,SA1 1WG",
//     "phone": [ "01792 470310" ],
//     "email": "swanmar@swansea.gov.uk",
//     "web": "http://www.swanseamarina.org.uk",
//     "facebook": "https://www.facebook.com/swanseamarina",
//     "flickr": "https://www.flickr.com/photos/swanseamarina",
//     "twitter": "http://twitter.com/swanseamarina",
//     "security": [ "01792 646440" ]
//     "vhf": 80,
//     "waypoint": "51° 36′.40N 03° 55′.60W",
//     "openingHours": [
//         { "day": "Monday - Friday", "time": "7AM-7PM" },
//         { "day": "Saturday", "time": "7AM-10PM" },
//         { "day": "Sunday", "time": "7AM-10PM" }
//     ],
//     "_id": 0,
//     "location": { "longitude": -3.934033, "latitude": 51.61664 },
// }

// {
//   "ids":[
//     "ID1"
//     "ID1"
//   ]
// }


// {
//     "ids":[
//       "5d0cc9bcbc01b133de26c0a3",
//       "5d0cca4788f1c92e7eef9664",
//       "5d0cca2cbc01b133de26c0ab",
//       "5d0cca39bc01b133de26c0ad",
//       "5d0cd29cbc01b133de26c0b3",
//       "5d0c81f088f1c92e7eef9645",
//       "5d0b833857e9a3ed797cf680",
//       "5d0b8345d738477cd2768155",
//       "5d0cc9f8bc01b133de26c0a7",
//       "5d0cca0dbc01b133de26c0a9",
//       "5d0cc94988f1c92e7eef9662",
//       "5d0b835457e9a3ed797cf682",
//       "5d0b836357e9a3ed797cf684",
//       "5d0cc9d4bc01b133de26c0a5",
//       "5d0b8372d738477cd2768157",
//       "5d0ccacebc01b133de26c0b1",
//       "5d0b837f57e9a3ed797cf686",
//       "5d0f032e463d5183036b5e3c",
//       "5d0f9823463d5183036b5e3e",
//       "5d10da7ef16a89feed66a4eb",
//       "5d0b838dd738477cd2768159",
//       "5d0fbed1f16a89feed66a4e9"
//     ]
// }