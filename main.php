<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Документооборот</title>
  <link rel="icon" href="./image/Без названия (2).jpg" type="image/jpg">

  <link rel="stylesheet" href="./style.css">
  <!-- tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<?php 
  @include "Header/header.php";
?>
<form class="form">
  <?php
  $sql = mysqli_query($link,'SELECT * FROM files');
  foreach($sql as $row){
?>
<div class="text">
<h1 >
  <?php
  echo $row['file'];
  ?>
</h1>

<a href="main.php?path=file/<?php  echo $row['file']; ?>" class="flex mx-auto  w-32 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Cкачать</a>
</div>
<?php
}
?>
</form>  

<?php
if(isset($_GET['path']))
{
$url = $_GET['path'];//Очистить кэш

//Проверьте, существует ли путь к файлу или нет
if(file_exists($url)) {

//Определение информации заголовка
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($url).'"');
header('Pragma: public');

//Очистить выходной буфер системы
flush();

//Считайте размер файла
readfile($url,true);

//Завершить работу со скриптом
die();
}
else{
echo '';
}
}
echo '';

?>


</body>
</html>