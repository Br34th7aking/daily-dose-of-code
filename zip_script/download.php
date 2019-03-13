<?php
session_start();
?>
<?php
$_SESSION['files'] = $_GET['files'];

if ($_SESSION['files']) {
  $file_list = explode(',', $_SESSION['files']);
  // foreach ($file_list as $file) {
  //   echo end(explode('/', $file));
  //   echo '<br />';
  // }
  $zip = new ZipArchive;
  $zipname = 'download.zip';
  $zip->open($zipname, ZipArchive::CREATE);
  // Add files to the zip file
  foreach ($file_list as $file) {
    $rel_path = 'files/' . end(explode('/', $file));
    $zip->addFile($rel_path); // add file using relative path 
  }
  $zip->close();

  header('Content-Type: application/zip');
  header('Content-Disposition: attachment; filename='.$zipname);
  header("Content-length: " . filesize($zipname));

  readfile($zipname);

  unlink($zipname);
} else {
  echo "No file to download";
}







// echo "<p>
// This is " .  $_SESSION['files'] . "
// </p>";
?>
