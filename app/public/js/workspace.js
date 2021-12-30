window.onload = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "workspaceController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = JSON.parse(xhr.response);
                const result = data['message'];

                console.log(result);
            }
        }
    }

    xhr.send(`action=loadWorkspace`);
}