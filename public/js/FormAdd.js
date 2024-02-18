function popupTF(){
    document.querySelector(".AddTask").classList.add("Active");
}function popdownTF(){
    document.querySelector(".AddTask").classList.remove("Active");
}

function popupUTF(){
    document.querySelector(".EditTask").classList.add("Active");
    
}function popdownUTF(){
    document.querySelector(".EditTask").classList.remove("Active");
}

function popupQF(){
    document.querySelector(".AddQuiz").classList.add("Active");
}function popdownQF(){
    document.querySelector(".AddQuiz").classList.remove("Active");
}

function popupQEF(){
    document.querySelector(".EditQuiz").classList.add("Active");

    var name = document.getElementsByName("name").value;


}function popdownQEF(){
    document.querySelector(".EditQuiz").classList.remove("Active");
}

function popupQuestion(){
    document.querySelector(".AddQuestion").classList.add("Active");
}function popdownQuestion(){
    document.querySelector(".AddQuestion").classList.remove("Active");
}

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