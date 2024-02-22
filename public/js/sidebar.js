const body = document.querySelector("body"),
sidebar = body.querySelector(".sidebar"),
toggle = body.querySelector(".toggle"),
modeSwitch = body.querySelector(".toggle-switch"),
modeText = body.querySelector(".mode-text");

var savedMode = localStorage.getItem("mode");
var activateMode = JSON.parse(savedMode);
if (activateMode === 1) {
body.classList.add("dark");
modeText.innerText = "Light Mode";
} else {
modeText.innerText = "Dark Mode";
}

toggle.addEventListener("click", () => {
sidebar.classList.toggle("close");
});

modeSwitch.addEventListener("click", () => {
body.classList.toggle("dark");
if (body.classList.contains("dark")) {
  modeText.innerText = "Light Mode";
  localStorage.setItem("mode", "1");
} else {
  modeText.innerText = "Dark Mode";
  localStorage.setItem("mode", "2");
}
});


