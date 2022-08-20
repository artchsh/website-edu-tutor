<?php include('./php_modules/server.php') ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/style.cssSS">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" type="image/x-icon" href="./resources/icons/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Образовательный портал</title>

    
</head>

<body class="bg-secondary">
    <!-- USER PROFILE -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="margin-bottom: 0.3em;"> Ваш профиль</h3>
                </div>
                <div class="modal-body">
                    <p><?php echo $name,' ', $surname ?></p>
                    <p>Подписка до <?php echo $expirationDate ?> включительно</p>
                    <?php if ($admin === 1) { // need to do with js to do loading.gif
               echo '
               <h3 style="margin-bottom: 0.3em;margin-top: 0.3em;"> Загрузка файлов</h3>
               <form action="./php_modules/upload.php" method="post" id="fileUpload" enctype="multipart/form-data">
                  <select class="form-select mb-1 w-25" id="subject" name="subject">                      
                     <option disabled>--Выберите предмет--</option>
                     <option value="physics">Физика</option>
                     <option value="math">Математика</option>
                     <option value="chem">Химия</option>
                  </select>
                  <select class="form-select mb-1 w-25" id="type_subject" name="type_subject">                      
                     <option disabled>--Выберите тип--</option>
                     <option value="variants">Вариант</option>
                     <option value="books">Учебник</option>
                     <option value="answers">Ответы</option>
                  </select>
                  <input type="file" class="form-control w-100" name="fileToUpload[]" id="fileToUpload" multiple>
               </form>
               ';
            }?>
                </div>
                <div class="modal-footer">
                    <img id='loading' src='./resources/icons/favicon.ico' style='visibility: hidden;'>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
                    <?php if ($admin ===1) {
                     echo '<button type="submit" form="fileUpload" id="btnFileToUpload" class="btn bg-primary text-white" name="submit"><i class="fa-solid fa-file-arrow-up"></i> Загрузить</button>';
                     }
                     ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./resources/icons/favicon-32x32.png" alt="" width="30" height="24">
                IlmiraEdu
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button type="button" class="border-0 nav-link bg-transparent" class="btn btn-primary"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-user"></i></button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-regular fa-arrow-right-from-bracket"></i></a>
                </li>
            </ul>
        </div>
    </nav>


    <!--
   <ul class="animate__animated animate__fadein">
      <li><a class="img shadow" href="#home"><img style="width: 44px" src="./resources/icons/android-chrome-192x192.png"></a></li>
      <li style="float:right"><a href="./php_modules/logout.php"><i class="fa-regular fa-arrow-right-from-bracket"></i></a></li>
      <li class="" style="float:right">
         <a href="#about" onclick="userProfile(1)" class="userbtn">
            <i class="fa-solid fa-user"></i>
         </a>
      </li>
   </ul>
         -->
    <div class="d-md-flex">
        <!-- 
      PHYSICS
    -->
        <div class="card m-2 shadow mw-25" style="width: 500px;">
            <div class="card-header text-center">
                <h1>Физика</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md text-center">
                        <div class="card-text">
                            <h3>Варианты</h3>
                            <?php
                     $dirVars = './materials/physics/variants';
                     foreach (new DirectoryIterator($dirVars) as $fileInfo) {
                     $fileName = $fileInfo->getBasename('.pdf');
                     $fileNameSuffix = $fileInfo->getBasename();
                     if ($fileName == "." or $fileName == ".." or $fileName == "answers") {
                     } else {
                     ?>
                            <div class="btn-group mb-1">
                                <button href="" class="btn btn-primary"
                                    onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
                                    <?php echo $fileName; ?>
                                </button>
                                <button class="btn btn-outline-primary"
                                    onclick="getPage(`<?php echo $dirVars; ?>/answers/<?php echo $fileName; ?>.png`)"><i
                                        class="fa-regular fa-file-spreadsheet"></i></button>
                            </div>
                            <?php
                     }
                     };
                     ?>
                        </div>
                    </div>
                    <div class="col-md text-center">
                        <div class="card-text">
                            <h3>Учебники</h3>
                            <?php
                     $dirVars = './materials/physics/books';
                     foreach (new DirectoryIterator($dirVars) as $fileInfo) {
                     $fileName = $fileInfo->getBasename('.pdf');
                     $fileNameSuffix = $fileInfo->getBasename();
                     if ($fileName == "." or $fileName == "..") {
                     } else {
                     ?>
                            <button class="btn btn-primary mb-1"
                                onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
                                <?php echo $fileName; ?>
                            </button>
                            <?php
                     }
                     };
                     ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 
      MATH
    -->
    <div class="card m-2 shadow mw-25" style="width: 500px;">
            <div class="card-header text-center">
                <h1>Математика</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md text-center">
                        <div class="card-text">
                            <h3>Варианты</h3>
                            <?php
                     $dirVars = './materials/math/variants';
                     foreach (new DirectoryIterator($dirVars) as $fileInfo) {
                     $fileName = $fileInfo->getBasename('.pdf');
                     $fileNameSuffix = $fileInfo->getBasename();
                     if ($fileName == "." or $fileName == ".." or $fileName == "answers") {
                     } else {
                     ?>
                            <div class="btn-group mb-1">
                                <button href="" class="btn btn-primary"
                                    onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
                                    <?php echo $fileName; ?>
                                </button>
                                <button class="btn btn-outline-primary"
                                    onclick="getPage(`<?php echo $dirVars; ?>/answers/<?php echo $fileName; ?>.png`)"><i
                                        class="fa-regular fa-file-spreadsheet"></i></button>
                            </div>
                            <?php
                     }
                     };
                     ?>
                        </div>
                    </div>
                    <div class="col-md text-center">
                        <div class="card-text">
                            <h3>Учебники</h3>
                            <?php
                     $dirVars = './materials/math/books';
                     foreach (new DirectoryIterator($dirVars) as $fileInfo) {
                     $fileName = $fileInfo->getBasename('.pdf');
                     $fileNameSuffix = $fileInfo->getBasename();
                     if ($fileName == "." or $fileName == "..") {
                     } else {
                     ?>
                            <button class="btn btn-primary mb-1"
                                onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
                                <?php echo $fileName; ?>
                            </button>
                            <?php
                     }
                     };
                     ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 
      CHEMISTRY
    -->
    <div class="card m-2 shadow mw-25" style="width: 500px;">
            <div class="card-header text-center">
                <h1>Химия</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md text-center">
                        <div class="card-text">
                            <h3>Варианты</h3>
                            <?php
                     $dirVars = './materials/chem/variants';
                     foreach (new DirectoryIterator($dirVars) as $fileInfo) {
                     $fileName = $fileInfo->getBasename('.pdf');
                     $fileNameSuffix = $fileInfo->getBasename();
                     if ($fileName == "." or $fileName == ".." or $fileName == "answers") {
                     } else {
                     ?>
                            <div class="btn-group mb-1">
                                <button href="" class="btn btn-primary"
                                    onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
                                    <?php echo $fileName; ?>
                                </button>
                                <button class="btn btn-outline-primary"
                                    onclick="getPage(`<?php echo $dirVars; ?>/answers/<?php echo $fileName; ?>.png`)"><i
                                        class="fa-regular fa-file-spreadsheet"></i></button>
                            </div>
                            <?php
                     }
                     };
                     ?>
                        </div>
                    </div>
                    <div class="col-md text-center">
                        <div class="card-text">
                            <h3>Учебники</h3>
                            <?php
                     $dirVars = './materials/chem/books';
                     foreach (new DirectoryIterator($dirVars) as $fileInfo) {
                     $fileName = $fileInfo->getBasename('.pdf');
                     $fileNameSuffix = $fileInfo->getBasename();
                     if ($fileName == "." or $fileName == "..") {
                     } else {
                     ?>
                            <button class="btn btn-primary mb-1"
                                onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)">
                                <?php echo $fileName; ?>
                            </button>
                            <?php
                     }
                     };
                     ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="./resources/js/script.js"></script>
</body>