const loginForm = document.querySelector(".loginForm"),
    loginButton = loginForm.querySelector(".btnLogin");

loginForm.onclick = (e) => {
    e.preventDefault();
}

loginButton.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "userController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = JSON.parse(xhr.response);
                const result = data['message'];

                if (result == "success") {
                    document.location.href = "workspace";
                    document.getElementById("errorMessage").innerHTML = "";
                } else {
                    document.getElementById("errorMessage").innerHTML = result;
                }
            }
        }
    }

    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    xhr.send(`action=login&email=${email}&password=${password}`);
}

