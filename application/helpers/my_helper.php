<?php 
 // $this =& get_instance();

function removeDirectory($path) {
  $files = glob($path . '/*');
  foreach ($files as $file) {
    is_dir($file) ? removeDirectory($file) : unlink($file);
  }
  rmdir($path);
  return;
}
function is_sha1($str) {
    return (bool) preg_match('/^[0-9a-f]{40}$/i', $str);
}
function myDie(){
  echo 'myDie'; die;
}

function myPushNoti($msg_payload, $deviceTokens){
  $url = 'https://fcm.googleapis.com/fcm/send';
  //$url = "https://iid.googleapis.com/iid/v1:batchRemove"; 
  $fields['to'] = $deviceTokens['iOSToken'];
  $fields['body'] = $msg_payload;
  // echo json_encode($fields); die;
  $headers = array(
  'Content-Type:application/json',
     'Authorization:key='.$deviceTokens['firebaseToken']
  ); 
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
  $result = curl_exec($ch);
  curl_close($ch);
  var_dump($result);
}