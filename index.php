<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Образовательный портал - Логин</title>
  <link rel="stylesheet" href="resources/css/style.css">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      justify-content: center;
      align-items: center;
      display: flex;
      align-items: center;
      height: 100vh;
    }

    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      transition: 0.1s ease-in;
    }

    button:hover {
      opacity: 0.8;
    }

    .container {
      padding: 16px;
      width: 300px;
      margin: auto;
    }
  </style>
</head>

<body>
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input id="uname" type="text" required>

    <label for="psw"><b>Password</b></label>
    <input id="pwd" type="password" required>

    <button type="submit" onclick="check()">Login</button>
  </div>
  <script src="resources/js/script.js"></script>
</body>

</html>