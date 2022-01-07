
document.getElementById("addTask").onclick = addTask;
document.getElementById("addSubject").onclick = addSubject;

window.onload = function() {
    addCheckboxListeners();
};

document.getElementById('workspaces').addEventListener('change', function() {
    loadSubjects();
    loadTasks();
});

function addCheckboxListeners(){
    document.querySelectorAll("input[name=taskCheckbox]").forEach(taskCheckbox => {;
        taskCheckbox.addEventListener('change', function() {
            if (this.checked) {
                const taskId = this.id;

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "taskController", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            let data = JSON.parse(xhr.response);
                            const result = data['result'];

                            if (result == true) {
                                loadTasks();
                            }
                        }
                    }
                }


                xhr.send(`action=completeTask&taskId=${taskId}`);
            }
        });
    });
}

function addTask(){
    let task = document.getElementById("iptTaskDescription").value;
    let dateTime = document.getElementById("iptDate").value;

    var selPriority = document.getElementById("sltPriority");
    var priority= selPriority.options[selPriority.selectedIndex].text;

    var selSubject = document.getElementById("sltSubject");
    var subject= selSubject.options[selSubject.selectedIndex].id;

    var selWorkspace = document.getElementById("workspaces");
    var workspace = selWorkspace.options[selWorkspace.selectedIndex].value;
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "taskController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = JSON.parse(xhr.response);
                const result = data['result'];
                
                if (result == true) {
                    loadTasks();
                }
            }
        }
    }


    xhr.send(`action=addTask&task=${task}&dateTime=${dateTime}&priority=${priority}&subject=${subject}&workspace=${workspace}`);
}

function addSubject(){
    let subject = document.getElementById("inptSubject").value;
    
    var selWorkspace = document.getElementById("workspaces");
    var workspace = selWorkspace.options[selWorkspace.selectedIndex].value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "subjectController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = JSON.parse(xhr.response);
                const result = data['result'];
                
                if (result == true) {
                    loadSubjects();
                }
            }
        }
    }

    xhr.send(`action=addSubject&subject=${subject}&workspace=${workspace}`);
}

function loadSubjects(){
    var selWorkspace = document.getElementById("workspaces");
    var workspace = selWorkspace.options[selWorkspace.selectedIndex].value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "subjectController", true);
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


    xhr.send(`action=getSubjects&workspace=${workspace}`);
}

function loadTasks(){
    var selWorkspace = document.getElementById("workspaces");
    var workspace = selWorkspace.options[selWorkspace.selectedIndex].value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "taskController", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = JSON.parse(xhr.response);
                let html = "";

                if (data != null) {
                    data.forEach(task => {
                        html += `<tr>
                                    <th scope="row" class="text-center" style="width: 0;">
                                        <input class="form-check-input check_inside_table" style=" position: relative;" type="checkbox" name="taskCheckbox" id="${task.taskID}">
                                    </th>
                                    <td>${task.taskDescription} </td>
                                    <td>${task.dateTime}</td>
                                    <td>${task.priority}</td>
                                    <td>${task.subject}</td>
                                </tr>`
                    });
    
                    document.getElementById("taskResults").innerHTML = html;
                    addCheckboxListeners();
                }else{ 
                    document.getElementById("taskResults").innerHTML = "";
                }
            }
        }
    }


    xhr.send(`action=getTasks&workspace=${workspace}`);
}

