const form = document.querySelector(".loginForm"),
loginButton = form.querySelector(".btnLogin");

form.onclick = (e)=>{
    e.preventDefault();
}

loginButton.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "userController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = JSON.parse(xhr.response);
                if (data['message'] == "success") {
                    document.location.href = "workspace";
                }
            }
        }
    }
    /*var formData = new FormData(form);
    xhr.send(formData);*/

    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    xhr.send(`action=login&email=${email}&password=${password}`);
}