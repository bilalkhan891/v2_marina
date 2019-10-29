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

function myDie(){
  echo 'myDie';
}
 
        // Sends Push notification for Android users
  function android($data, $reg_id) {
      $url = 'https://android.googleapis.com/gcm/send';
      $message = array(
          'title' => $data['mtitle'],
          'message' => $data['mdesc'],
          'subtitle' => '',
          'tickerText' => '',
          'msgcnt' => 1,
          'vibrate' => 1
      );
      
      $headers = array(
        'Authorization: key=' .$API_ACCESS_KEY,
        'Content-Type: application/json'
      );

      $fields = array(
          'registration_ids' => array($reg_id),
          'data' => $message,
      );

    return $this->useCurl($url, $headers, json_encode($fields));
  }
  
  // Sends Push's toast notification for Windows Phone 8 users
  function WP($data, $uri) {
    $delay = 2;
    $msg =  "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
            "<wp:Notification xmlns:wp=\"WPNotification\">" .
                "<wp:Toast>" .
                    "<wp:Text1>".htmlspecialchars($data['mtitle'])."</wp:Text1>" .
                    "<wp:Text2>".htmlspecialchars($data['mdesc'])."</wp:Text2>" .
                "</wp:Toast>" .
            "</wp:Notification>";
    
    $sendedheaders =  array(
        'Content-Type: text/xml',
        'Accept: application/*',
        'X-WindowsPhone-Target: toast',
        "X-NotificationClass: $delay"
    );
    
    $response = $this->useCurl($uri, $sendedheaders, $msg);
    
    $result = array();
    foreach(explode("\n", $response) as $line) {
        $tab = explode(":", $line, 2);
        if (count($tab) == 2)
            $result[$tab[0]] = trim($tab[1]);
    }
    
    return $result;
  }
  
        // Sends Push notification for iOS users
  function iOS($data, $devicetoken) {

    static $passphrase = 'joashp';
     
    $deviceToken = $devicetoken;
    $ctx = stream_context_create();
    // ck.pem is your certificate file
    stream_context_set_option($ctx, 'ssl', 'local_cert', 'ck.pem');
    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
    // Open a connection to the APNS server
    $fp = stream_socket_client(
      'ssl://gateway.sandbox.push.apple.com:2195', $err,
      $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
    if (!$fp)
      exit("Failed to connect: $err $errstr" . PHP_EOL);
    // Create the payload body
    $body['aps'] = array(
      'alert' => array(
          'title' => $data['mtitle'],
                'body' => $data['mdesc'],
       ),
      'sound' => 'default'
    );
    // Encode the payload as JSON
    $payload = json_encode($body);
    // Build the binary notification
    $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
    // Send it to the server
    $result = fwrite($fp, $msg, strlen($msg));
    
    // Close the connection to the server
    fclose($fp);
    if (!$result)
      return 'Message not delivered' . PHP_EOL;
    else
      return 'Message successfully delivered' . PHP_EOL;
  }
  
  // Curl 
   function useCurl(&$model, $url, $headers, $fields = null) {
          // Open connection
          $ch = curl_init();
          if ($url) {
              // Set the url, number of POST vars, POST data
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       
              // Disabling SSL Certificate support temporarly
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              if ($fields) {
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
              }
       
              // Execute post
              $result = curl_exec($ch);
              if ($result === FALSE) {
                  die('Curl failed: ' . curl_error($ch));
              }
       
              // Close connection
              curl_close($ch);
  
              return $result;
        }
    }
 
