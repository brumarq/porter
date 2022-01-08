document.getElementById('workspaces').addEventListener('change', function () {
    loadNotes();
});

document.getElementById("addNote").onclick = addNote;

function loadNotes() {
    /*var selWorkspace = document.getElementById("workspaces");
    var workspace = selWorkspace.options[selWorkspace.selectedIndex].value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "notesController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = JSON.parse(xhr.response);
                let htmlSubjectSection = "";
                let hmtlSltSubject = "<option></option>"

                if(data != null){
                    data.forEach(subject => {
                        htmlSubjectSection += `<tr>
                                    <td>${subject.description}</td>
                                </tr>`
    
                        hmtlSltSubject += `<option id="${subject.id}"> ${subject.description} </option>`
                    });
    
                    document.getElementById("subjectResults").innerHTML = htmlSubjectSection;
                    document.getElementById("sltSubject").innerHTML = hmtlSltSubject;
                }else{ 
                    document.getElementById("subjectResults").innerHTML = "";
                    document.getElementById("sltSubject").innerHTML = hmtlSltSubject;
                }
            }
        }
    }


    xhr.send(`action=getNotes&workspace=${workspace}`);*/
}


function addNote() {
    let noteTitle = document.getElementById("inptNoteTitle").value;

    var selWorkspace = document.getElementById("workspaces");
    var workspace = selWorkspace.options[selWorkspace.selectedIndex].value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "notesController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = JSON.parse(xhr.response);
                const result = data['result'];

                if (result == true) {
                    console.log(result);
                }
            }
        }
    }

    xhr.send(`action=addNote&title=${noteTitle}&workspace=${workspace}`);
}