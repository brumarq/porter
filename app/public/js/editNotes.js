var md = new Remarkable();

document.getElementById("deleteNote").onclick = deleteNote;

function showEditWindow(env) {
    document.getElementById("viewNote").style.display = 'none';
    document.getElementById("editNote").style.display = 'block';
}

function deleteNote(env) {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "notesController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                document.location.href = "/workspace/notes/";
            }
        }
    }

    xhr.send(`action=deleteNote`);
}

function saveChanges(env) {

    title = document.getElementById("iptTitle").value;
    markupText = document.getElementById("markupText").value;
    htmlText = md.render(markupText);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "notesController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                getNote();
            }
        }
    }


    xhr.send(`action=saveChanges&markup=${markupText}&html=${htmlText}&title=${title}`);

    document.getElementById("editNote").style.display = 'none';
    document.getElementById("viewNote").style.display = 'block';
}

function getNote(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "notesController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = JSON.parse(xhr.response);
                let html = "";

                if (data != null) {
                    html += `<div class="row mb-3">
                                <div class="col-6 ">
                                    <a href="/workspace/notes/" type="button" class="float-left btn btn-sm btn-outline-dark ">Back</a>
                                </div>  
                                <div class="col-6 ">
                                    <button type="button" id="deleteNote" class="float-right btn btn-sm btn-danger"> Delete</button>
                                </div>                            
                            </div>
                            <div class="row">
                                <h2 class=" w-100">
                                    <?php echo $note[0]["title"] ?>
                                    ${data[0].title}
                                    <div class="float-right">
                                        <span class=" font-italic text-dark">${data[0].created}</span>
                                    </div>
                                </h2>
                            </div>
                            <hr>
                            <div class="row  float-right">
                                <button type="button" onclick="showEditWindow(this);" class="btn btn-dark">Edit</button>
                            </div>
                            <div id="htmlText" class="row" style="display: contents;">
${data[0].textHtml}
                            </div>`
                }

                document.getElementById("viewNote").innerHTML = html;

            }
        }
    }

    xhr.send(`action=getNoteJson`);
}