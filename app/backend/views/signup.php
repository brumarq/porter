<?php require('templates/header.php'); ?>

<main class="form-signup text-center">
    <form class="signupForm" name="signup">
        <h1 class="h3 mb-3 fw-normal">Sign Up</h1>
        <div class="col-12">
            <div class="row">
                <div class="col-6 form-floating">
                    <input type="text" class="form-control" id="firstName" placeholder="First Name">
                </div>
                <div class="col-6 form-floating">
                    <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-floating">
                    <input type="email" name="email" class="form-control mt-3" id="signupEmail" placeholder="Email Address">
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-floating">
                    <input type="password" name="password" class="form-control mt-3" id="signupPassword" placeholder="Password">
                </div>
            </div>
            <div class="row mt-2 mb-1">
                <div class="col-12 form-floating ">
                    <small id="errorMessage" class="p-4 text-danger">
                        
                    </small>
                </div>
            </div>
            <div class="row justify-content-center">
                <button class="w-75 center btn btn-lg btn-primary btnSignup" type="submit">Sign Up</button>
            </div>
        </div>


    </form>
    <small class="pt-3">
        Already have an account? <a href="/" id="signupLink"> Log in</a>
    </small>
</main>

<script src="/js/signup.js"></script>
<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="../css/main.css">

<?php require('templates/footer.php'); ?>