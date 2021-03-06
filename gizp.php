<?php
/**
 * GZIPs a file on disk (appending .gz to the name)
 *
 * From http://stackoverflow.com/questions/6073397/how-do-you-create-a-gz-file-using-php
 * Based on function by Kioob at:
 * http://www.php.net/manual/en/function.gzwrite.php#34955
 *
 * @param string $source Path to file that should be compressed
 * @param integer $level GZIP compression level (default: 9)
 * @return string New filename (with .gz appended) if success, or false if operation fails
 */
function gzCompressFile($source, $level = 9){
    $dest = $source . '.gz';
    $mode = 'wb' . $level;
    $error = false;
    if ($fp_out = gzopen($dest, $mode)) {
        if ($fp_in = fopen($source,'rb')) {
            while (!feof($fp_in))
                gzwrite($fp_out, fread($fp_in, 1024 * 512));
            fclose($fp_in);
        } else {
            $error = true;
        }
        gzclose($fp_out);
    } else {
        $error = true;
    }
    if ($error)
        return false;
    else
        return $dest;
}
//from elsewhere on stack stackoverflow.com/questions/11265914/how-can-i-extract-or-uncompress-gzip-file-using-php
function gzInflateFile($file_name){
  // Raising this value may increase performance
  //$buffer_size = 4096; // read 4kb at a time
  //$out_file_name = str_replace('.gz', '', $file_name);

  // Open our files (in binary mode)
//  $file = gzopen($file_name, 'rb');
  //$out_file = fopen($out_file_name, 'wb');

  // Keep repeating until the end of the input file
  //while (!gzeof($file)) {
      // Read buffer-size bytes
      // Both fwrite and gzread and binary-safe
    //  fwrite($out_file, gzread($file, $buffer_size));
//  }

  // Files are done, close files
  //fclose($out_file);
  //gzclose($file);

}
?>
