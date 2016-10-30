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
$result = shell_exec('python ../triggers/button.py ' . escapeshellarg(json_encode($data)));

// Decode the result
$resultData = json_decode($result, true);
//see if the button has been pressed
if($resultData['status'] == 'True'){
  shell_exec('sudo python ../record.py');
  //send the file to the server
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://192.168.226.240/insertIntoDB.php");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);
  }
sleep(5);



?>
