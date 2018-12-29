<?php
if ($export_type == 'word') {
  header("Content-Type: application/vnd.msword");
  header("Expires: 0");//no-cache
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");//no-cache
  header("content-disposition: attachment;filename=".$title.".doc");
}else if ($export_type == 'excel') {
  header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
  header("Content-Disposition: attachment; filename=".$title.".xls");  //File name extension was wrong
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: private",false);
}


?>
<html>
<head>
  <style media="screen">
  @page
{
  size: 21cm 29.7cm;  /* A4 */
  margin: 1cm 1cm 1cm 1cm; /* Margins: 2 cm on each side */
  mso-page-orientation: portrait;
}
  </style>
</head>
<body>
<?php $this->load->view($content)?>
</body>
</html>
<?php
?>
