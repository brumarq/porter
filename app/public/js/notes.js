document.getElementById("addNote").onclick = addNote;

document.getElementById('workspaces').addEventListener('change', function () {
    getNotes();
});

function getNotes() {
    var selWorkspace = document.getElementById("workspaces");
    var workspace = selWorkspace.options[selWorkspace.selectedIndex].value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "notesController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let notes = JSON.parse(xhr.response);
                let htmlListOfNotes = "";

                if(notes != null){
                    notes.forEach(note => {
                        htmlListOfNotes += `<a href="/workspace/notes/viewEdit?id=${note["NotesID"]}" class="link-dark">
                                                    <li class="list-group-item text-dark" >
                                                         ${note["title"]}
                                                        <span class="float-right font-italic text-dark">${note["created"]}</span>
                                                    </li>
                                                </a>`
                    });
    
                    document.getElementById("notesList").innerHTML = htmlListOfNotes;
                }else{ 
                    document.getElementById("notesList").innerHTML = "";
                }
            }
        }
    }


    xhr.send(`action=getNotes&workspace=${workspace}`);
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
                    getNotes();
                }
            }
        }
    }

    xhr.send(`action=addNote&title=${noteTitle}&workspace=${workspace}`);
}