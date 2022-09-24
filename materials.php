<?php include('./php_modules/server.php') ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/css/style.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="manifest" href="/manifest.json">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="icon" type="image/x-icon" href="./resources/icons/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Образовательный портал</title>
</head>

<body class="bg-gray-400 dark:bg-gray-800 antialiased text-gray-900 dark:text-gray-200">
    <!-- USER PROFILE -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="margin-bottom: 0.3em;"> Ваш профиль</h3>
                </div>
                <div class="modal-body">
                    <p><?php echo $name,' ', $surname ?></p>
                    <p>Подписка до <?php echo $expirationDate ?> включительно</p>
                    <?php if ($admin === 1) { 
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
    </div>-->


    <!-- TAILWIND NAVBAR -->

<nav class="absolute top-0 left-0 bg-transparent container text-gray-600 capitalize dark:text-gray-300 p-3">
        <a href="#" class="text-xl font-bold align-bottom hover:text-gray-800 transition-colors duration-300 transform dark:hover:text-gray-200 mx-1.5">
            Ilmira
        </a>        
        <a href="#" class="align-middle hover:text-gray-800 transition-colors duration-300 transform dark:hover:text-gray-200 mx-1.5">
            <i class="fa-solid fa-user"></i>
        </a>
        <a href="./php_modules/logout.php" class="align-middle hover:text-gray-800 transition-colors duration-300 transform dark:hover:text-gray-200 mx-1.5">
            <i class="fa-regular fa-arrow-right-from-bracket"></i>
        </a>
</nav>




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
                            <div class="inline-flex rounded-md shadow-sm m-1" role="group">
                                <button type="button" onclick="getPage(`<?php echo $dirVars; ?>/<?php echo $fileNameSuffix; ?>`)" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                    <?php echo $fileName; ?>
                                </button>
                                <button type="button" onclick="getPage(`<?php echo $dirVars; ?>/answers/<?php echo $fileName; ?>.png`)" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                    <i class="fa-regular fa-file-spreadsheet"></i>
                                </button>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="./resources/js/script.js"></script>
</body>