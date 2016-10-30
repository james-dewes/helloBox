<?php
if(isset($_GET['k']) && $_GET['k']=='12345'){
  switch($_GET['kommand']){
    case 'record':

      break;
    case 'stop':
      break;

  }
}
// This is the data you want to pass to Python
//not right now, but might need this later
//$data = array('as', 'df', 'gh');
// Execute the python script with the JSON data
$dataToSend = '';
$result = shell_exec('python ../triggers/button.py ' . escapeshellarg(json_encode($dataToSend)));

// Decode the result
$resultData = json_decode($result, true);
//see if the button has been pressed
if($resultData['status'] == 'True'){
  shell_exec('sudo python ../record.py');
  //open the file
  $fp = fopen('../example.h264');
  //send the file to the server
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://192.168.226.240/insertIntoDB.php");
  curl_setopt($ch, CURLOPT_POST, true);
  $postData = array('key'=>'summit123',
                'vn'=>'video.h264',
                'an'=>'audio');
  curl_setopt($ch, CURLOPT_POSTFIELDS,$postData);
  curl_setopt($ch, CURLOPT_UPLOAD, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 86400); // 1 Day Timeout
  curl_setopt($ch, CURLOPT_INFILE, $fp);
  curl_setopt($ch, CURLOPT_NOPROGRESS, false);
  curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'CURL_callback');
  curl_setopt($ch, CURLOPT_BUFFERSIZE, 128);
  curl_setopt($ch, CURLOPT_INFILESIZE, filesize($localFile));
  //curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);
  }
sleep(5);



?>
