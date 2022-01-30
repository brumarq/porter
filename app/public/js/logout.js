if (document.getElementById("logoutButton") != undefined) {
    document.getElementById("logoutButton").onclick = logout;
}


function logout() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "userController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = JSON.parse(xhr.response);
                const result = data['result'];

                if (result == true) {
                    window.location.replace("/");
                }
            }
        }
    }

    xhr.send(`action=logout`);
}
