const signupForm = document.querySelector(".signupForm"),
signupButton = signupForm.querySelector(".btnSignup");

signupForm.onclick = (e)=>{
    e.preventDefault();
}

signupButton.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "userController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = JSON.parse(xhr.response);
                const result = data['message'];
                
                if (result == "userAdded") {
                    document.location.href = "workspace";
                }else if (result == null) {
                    document.getElementById("errorMessage").innerHTML = "Email already exists!"
                } else  {
                    document.getElementById("errorMessage").innerHTML = result;
                }
            }
        }
    }

    let email = document.getElementById("signupEmail").value;
    let password = document.getElementById("signupPassword").value;
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;


    xhr.send(`action=signup&email=${email}&password=${password}&firstName=${firstName}&lastName=${lastName}`);
}