<?php require('templates/header.php'); ?>

<main class="form-signin text-center">
    <form class="loginForm" name="login">
        <h1 class="h3 mb-3 fw-normal">Log In</h1>
        <div class="col-12">
            <div class="row">
                <div class="col-12 form-floating">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-floating">
                    <input type="password" name="password" class="form-control mt-3" id="password" placeholder="Password">
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-12 form-floating">
                    <small id="errorMessage" class=" p-4 text-danger">
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-floating">
                    <button class="w-100 btn btn-lg btn-primary btnLogin" type="submit">Sign In</button>
                </div>
            </div>
        </div>
    </form>
    <small class="pt-3">
        Don't have an account? <a href="/signup" id="signupLink"> Sign up</a>
    </small>
</main>

<script src="/js/login.js"></script>
<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="../css/main.css">

<?php require('templates/footer.php'); ?>