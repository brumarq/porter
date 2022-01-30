if (document.getElementById("createNewWorkspace") != undefined) {
    document.getElementById("createNewWorkspace").onclick = addNewWorkspace;
}

function addNewWorkspace() {
    const givenWorkspaceName = document.getElementById("iptWorkspaceName").value;

    addWorkspace(givenWorkspaceName);
}

function addWorkspace(givenWorkspaceName = "") {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "workspaceController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = JSON.parse(xhr.response);
                const result = data['result'];

                if (result == true) {
                    document.location.href = '/workspace';
                }
            }
        }
    }

    xhr.send(`action=addWorkspace&name=${givenWorkspaceName}`);
}