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

<section class="text-gray-600 body-font">
  <div class="docPanel">
    <form class="bg-gray-100 rounded-lg p-8 flex flex-col mt-10" action="" method="post"  enctype="multipart/form-data">
      <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Загрузка файлов</h2>
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-600">Загрузите файл</label>
        <input type="file" name="file" id="" class="w-full bg-white rounded border border-gray-300 focus:bg-red-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <input  type="submit" value="Добавить" name="btn" class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-500 rounded text-lg">
      <a href="main.php">Перейти к файлам</a>
    </form>
  </div>
</section>

<!-- <section>
  <form action="" method="post"  enctype="multipart/form-data">
  <input type="file" name="file" id="file" required><label for="file" name='btn'>Выбрать изображение</label>
    <input type="submit" value="Добавить" name="btn">
  </form>
</section> -->  
<?php
if (isset($_POST["btn"])) {
  $files = $_FILES['file']['type'];
  $file = $_FILES['file']['tmp_name'];
  echo $files;
  $filename = $_FILES['file']['name'];
  if ($files =='text/plain' or $files == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' or $files == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
    if ($file) {
    move_uploaded_file($_FILES['file']['tmp_name'], 'file/' . $_FILES['file']['name']);
    $add = mysqli_query($link, "INSERT INTO files (file) values ('$filename')");
    header("location:index.php");
    if ($link->query($add)) {
      echo "<p class='info'>Вы успешно добавиили</p>";
    }

}
}
}
?>

</body>
</html>
