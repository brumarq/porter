const form = document.querySelector(".loginForm"),
loginButton = form.querySelector(".btnLogin");

form.onclick = (e)=>{
    e.preventDefault();
}

loginButton.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../api/login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
            }
        }
    }
    var formData = new FormData(form);
    xhr.send(formData);
}