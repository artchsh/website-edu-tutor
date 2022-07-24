<?php include('./php_modules/server.php') ?>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="resources/css/style.css">
   <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
   <link rel="manifest" href="/manifest.json">
   <link rel="icon" type="image/x-icon" href="./resources/icons/favicon.ico">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="./resources/js/script.js"></script>
   <title>Образовательный портал</title>
</head>
<body>
   <div id="myDropdown" class="dropdown-content animate__animated">
      <div class="content shadow">
         <h3 style="margin-bottom: 0.3em;"> Ваш профиль</h3>
         <a onclick="userProfile(2)" class="content__btncls">x</a>
         <p><?php echo $name,' ', $surname ?></p>
         <p>Подписка до <?php echo $expirationDate ?></p>
         <?php if ($admin === 1) {
               echo '
               <h3 style="margin-bottom: 0.3em;margin-top: 0.3em;"> Загрузка файлов</h3>
               <form action="./php_modules/upload.php" method="post" enctype="multipart/form-data">
                  <select class="select" id="subject" name="subject">                      
                     <option disabled>--Выберите предмет--</option>
                     <option value="physics">Физика</option>
                     <option value="math">Математика</option>
                     <option value="chem">Химия</option>
                  </select>
                  <select class="select" id="type_subject" name="type_subject">                      
                     <option disabled>--Выберите тип--</option>
                     <option value="variants">Вариант</option>
                     <option value="books">Учебник</option>
                  </select>
                  <input type="file" name="fileToUpload" id="fileToUpload">
                  <button type="submit" class="btn btn-fw btn__submit" style="margin-bottom: 0em;" name="submit"><i class="fa-solid fa-file-arrow-up"></i> Загрузить</button>
               </form>
               ';
            }?>
      </div>
   </div>
   <ul class="animate__animated animate__fadein">
      <li><a class="img shadow" href="#home"><img style="width: 44px" src="./resources/icons/android-chrome-192x192.png"></a></li>
      <li style="float:right"><a href="./php_modules/logout.php"><i class="fa-regular fa-arrow-right-from-bracket"></i></a></li>
      <li class="" style="float:right">
         <a href="#about" onclick="userProfile(1)" class="userbtn">
            <i class="fa-solid fa-user"></i>
         </a>
      </li>
   </ul>
   
   <div class="table animate__animated animate__fadein">
      <div class="table__category shadow">
         <h1>Физика</h1>
         <div class="table__subcategory">
            <h3>Варианты</h3>
            <?php
               $dirVars = './materials/physics/variants';
               foreach (new DirectoryIterator($dirVars) as $fileInfo) {
               $fileName = $fileInfo->getBasename('.pdf');
               $fileNameSuffix = $fileInfo->getBasename();
               if ($fileName == "." or $fileName == "..") {
               } else {
               ?>
            <p onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
               <?php echo $fileName; ?>
            </p>
            <?php
               }
               };
               ?>
         </div>
         <div class="table__subcategory">
            <h3>Учебники</h3>
            <?php
               $dirVars = './materials/physics/books';
               foreach (new DirectoryIterator($dirVars) as $fileInfo) {
               $fileName = $fileInfo->getBasename('.pdf');
               $fileNameSuffix = $fileInfo->getBasename();
               if ($fileName == "." or $fileName == "..") {
               } else {
               ?>
            <p onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
               <?php echo $fileName; ?>
            </p>
            <?php
               }
               };
               ?>
         </div>
      </div>
      <!-- CHEMISTRY -->
      <div class="table__category shadow">
         <h1>Химия</h1>
         <div class="table__subcategory">
            <h3>Варианты</h3>
            <?php
               $dirVars = './materials/chem/variants';
               foreach (new DirectoryIterator($dirVars) as $fileInfo) {
               $fileName = $fileInfo->getBasename('.pdf');
               $fileNameSuffix = $fileInfo->getBasename();
               if ($fileName == "." or $fileName == "..") {
               } else {
               ?>
            <p onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
               <?php echo $fileName; ?>
            </p>
            <?php
               }
               };
               ?>
         </div>
         <div class="table__subcategory">
            <h3>Учебники</h3>
            <?php
               $dirVars = './materials/chem/books';
               foreach (new DirectoryIterator($dirVars) as $fileInfo) {
               $fileName = $fileInfo->getBasename('.pdf');
               $fileNameSuffix = $fileInfo->getBasename();
               if ($fileName == "." or $fileName == "..") {
               } else {
               ?>
            <p onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
               <?php echo $fileName; ?>
            </p>
            <?php
               }
               };
               ?>
         </div>
         </div>
         <!-- MATHEMATICS -->
      <div class="table__category shadow">
         <h1>Математика</h1>
         <div class="table__subcategory">
            <h3>Варианты</h3>
            <?php
               $dirVars = './materials/math/variants';
               foreach (new DirectoryIterator($dirVars) as $fileInfo) {
               $fileName = $fileInfo->getBasename('.pdf');
               $fileNameSuffix = $fileInfo->getBasename();
               if ($fileName == "." or $fileName == "..") {
               } else {
               ?>
            <p onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
               <?php echo $fileName; ?>
            </p>
            <?php
               }
               };
               ?>
         </div>
         <div class="table__subcategory">
            <h3>Учебники</h3>
            <?php
               $dirVars = './materials/math/books';
               foreach (new DirectoryIterator($dirVars) as $fileInfo) {
               $fileName = $fileInfo->getBasename('.pdf');
               $fileNameSuffix = $fileInfo->getBasename();
               if ($fileName == "." or $fileName == "..") {
               } else {
               ?>
            <p onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
               <?php echo $fileName; ?>
            </p>
            <?php
               }
               };
               ?>
         </div>
      
   </div>
</body>