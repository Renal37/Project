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
<a href="main.php?path=file/<?php  echo $row['file']; ?>">Cкачать</a>
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
echo "Путь к файлу не существует.";
}
}
echo "Путь к файлу не определен."

?>

</body>
</html>