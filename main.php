<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form>
  <?php
  $sql = mysqli_query($link,'SELECT * FROM files');
  foreach($sql as $row){
?>
<h1 >
  <?php
  echo $row['file'];
  ?>
</h1>
<a href="?file=<?php  echo $row['file']; ?>">Cкачать</a>
<?php
}
?>
</form>  
<?php
if(isset($_GET['file'])) {
$file = 'file/'$_GET['file']'';
header('Content-Type: image/jpeg');
header('Content-Disposition: attachment; filename="itrobo.jpg"');
readfile($file);
}
?>
</body>
</html>