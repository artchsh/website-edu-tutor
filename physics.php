<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="resources/css/style.css">
  <title>Образовательный портал</title>
</head>
<body>
<div class="navbar shadow">
  <ul>
    <?php
    $dirCategory = './materials';
    foreach (new DirectoryIterator($dirCategory) as $category) {
      $categoryName = $category->getBasename();
      if ($categoryName == "." or $categoryName == "..") {} else {
      ?>
        <li><a href="../<?php echo $categoryName;?>.php"><?php echo $categoryName;?></a></li>
      <?php
    }};
    ?>
  </ul>
</div>
  <div class="files shadow">
    <ul>
      <li class="category"><h5>Варианты</h5></li>
    <?php
    $dirVars = './materials/physics/variants';
    foreach (new DirectoryIterator($dirVars) as $fileInfo) {
      $fileName = $fileInfo->getBasename('.pdf');
      $fileNameSuffix = $fileInfo->getBasename();
      if ($fileName == "." or $fileName == "..") {} else {
        ?>
          <li>
            <a onclick="getPage(`<?php echo $dirVars;?>/<?php echo $fileNameSuffix;?>`)">
              <p><?php echo $fileName;?></p>
            </a>
          </li>
        <?php
      }};
    ?> 
      <li class="category"><h5>Книги</h5></li>
      <?php
    $dirBook = './materials/physics/books';
    foreach (new DirectoryIterator($dirBook) as $fileInfo) {
      $fileName = $fileInfo->getBasename('.pdf');
      $fileNameSuffix = $fileInfo->getBasename();
      if ($fileName == "." or $fileName == "..") {} else {
        ?>
          <li>
            <a onclick="getPage(`<?php echo $dirBook;?>/<?php echo $fileNameSuffix;?>`)">
              <p><?php echo $fileName;?></p>
            </a>
          </li>
        <?php
      }};
    ?> 
    </ul> 
  </div>
  <iframe id="viewer" src="">Ваш браузер не поддерживает просмотр файлов.</iframe>
<script>
  function getPage(page) {
    document.getElementById("viewer").src = `${page}`;
  }
</script>
</body>
</html>