<?php
include('../../gizp.php');
// This is the data you want to pass to Python
//not right now, but might need this later
//$data = array('as', 'df', 'gh');
// Execute the python script with the JSON data
$dataToSend = array();

$result = shell_exec('python ../triggers/button.py ' . escapeshellarg(json_encode($dataToSend)));
// Decode the result
$resultData = json_decode($result, true);
//see if the button has been pressed
if($resultData['status'] == 'True'){
  //record video and audio
  shell_exec('sudo python ../record.py');
  //compress the data
  //video
  $fpath = '../example.h264';
  $fpath = gzCompressFile($fpath);
  //audio
  $apath = '../audio.wav';
  $apath  = gzCompressFile($afpath);

  //send the file(s) to the server
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://192.168.226.240/insertIntoDB.php");
  curl_setopt($ch, CURLOPT_POST, true);
  $postData = array('key'=>'summit123',
                'vn'=>'video.h264',
                'an'=>'audio.wav');
  curl_setopt($ch, CURLOPT_POSTFIELDS,$postData);
  curl_setopt($ch, CURLOPT_UPLOAD, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 86400); // 1 Day Timeout
  curl_setopt($ch, CURLOPT_INFILE, $fp);
  curl_setopt($ch, CURLOPT_NOPROGRESS, false);
  curl_setopt($ch, CURLOPT_BUFFERSIZE, 128);
  curl_setopt($ch, CURLOPT_INFILESIZE, filesize($fpath));
  $fileId = curl_exec($ch);
  // close cURL resource, and free up system resources
  curl_close($ch);
  //close the return file

  //get return video and audio
  if(!file_exists("video_".$fileId.".gz")){
    $videoLocation = "wget http://192.168.226.240/video/video_{$fileId}.gz";
    $audioLocation = "wget http://192.168.226.240/audio/audio{$fileId}.gz";
    exec($videoLocation);
    //exec($audioLocation);
    //extract the video and audio to play
    gzInflate("video_{$fileId}.gz");
    gzInflate("audio_{$fileId}.gz");
  }

  echo "[" . json_encode(array('id'=>$fileId)) ."]";
  }
?>
