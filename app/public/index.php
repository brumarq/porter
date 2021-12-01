<?php
require_once('../router.php');

$url = trim($_SERVER['REQUEST_URI'], '/');
$router = new router();
$router->route($url);

?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body class="text-center">

    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top bg-dark">
          <a class="navbar-brand" href="#">Porter</a>
        </nav>
      </header>

    <main class="form-signin">
        <form class="loginForm" name="login">
          <h1 class="h3 mb-3 fw-normal">Log In</h1>
      
          <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control mt-3" id="password" placeholder="Password">
          </div>
      
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary btnLogin" type="submit">Sign in</button>
        </form>
      </main>

    <script src="/js/login.js"></script>
</body>

</html>


