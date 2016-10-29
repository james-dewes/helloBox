<?php
if($_GET['k']=='12345'){
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
while(True){
  // Execute the python script with the JSON data
  $result = shell_exec('python ../triggers/button.py ' . escapeshellarg(json_encode($data)));

  // Decode the result
  $resultData = json_decode($result, true);
  //see if the button has been pressed
  if($resultData['status'] == 'True'){
    shell_exec('/Documents/helloBox/Kiosk/record.py');
  }
sleep(5)
}



?>
