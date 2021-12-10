<?php require ('templates/header.php'); ?>

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

<?php require ('templates/footer.php'); ?>
