//ADD FORM
function popupTF(){
    document.querySelector(".AddTask").classList.add("Active");
}function popdownTF(){
    document.querySelector(".AddTask").classList.remove("Active");
}

//EDIT/UPDATE TASK FORM
function popupUTF(){
    document.querySelector(".EditTask").classList.add("Active");
    
}function popdownUTF(){
    document.querySelector(".EditTask").classList.remove("Active");
}

//ADD QUIZ FORM
function popupQF(){
    document.querySelector(".AddQuiz").classList.add("Active");
}function popdownQF(){
    document.querySelector(".AddQuiz").classList.remove("Active");
}

//QUIZ EDIT FORM
function popupQEF(){
    document.querySelector(".EditQuiz").classList.add("Active");
}function popdownQEF(){
    document.querySelector(".EditQuiz").classList.remove("Active");
}

//ADD QUESTION FORM
function popupQuestion(){
    document.querySelector(".AddQuestion").classList.add("Active");
}function popdownQuestion(){
    document.querySelector(".AddQuestion").classList.remove("Active");
}

//ADD SUBJECT FORM
function popupSF(){
    document.querySelector(".AddSubject").classList.add("Active");
}function popdownSF(){
    document.querySelector(".AddSubject").classList.remove("Active");
}

function popupDF(){
    document.querySelector(".AddDocument").classList.add("Active");
}function popdownDF(){
    document.querySelector(".AddDocument").classList.remove("Active");
}
//ADD MATERIALS FORM
function popupAM(){
    document.querySelector(".AddMaterial").classList.add("Active");
}function popdownAM(){
    document.querySelector(".AddMaterial").classList.remove("Active");
}

//ADD DOCUMENTS FORM
function popupDF(){
    document.querySelector(".AddDocs").classList.add("Active");
}function popdownDF(){
    document.querySelector(".AddDocs").classList.remove("Active");
}

function popupTF2(){
    document.querySelector(".AddTaskMaterial").classList.add("Active");
    
    document.querySelector(".AddMaterial").classList.remove("Active");
    document.querySelector(".AddQuizMaterial").classList.remove("Active");
}function popdownTF2(){
    document.querySelector(".AddTaskMaterial").classList.remove("Active");
}


function popupQF2(){
    document.querySelector(".AddQuizMaterial").classList.add("Active");

    document.querySelector(".AddMaterial").classList.remove("Active");
    document.querySelector(".AddTaskMaterial").classList.remove("Active");
}function popdownQF2(){
    document.querySelector(".AddQuizMaterial").classList.remove("Active");
}