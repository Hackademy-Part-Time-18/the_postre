const body = document.querySelector('body'),
sidebar = body.querySelector(".sidebar"),
// toggle = body.querySelector(".toggle"),
modeSwitch = body.querySelector(".toggle-switch"),
modeText = body.querySelector(".mode-text");


function toggleSidebar() {
    sidebar.classList.toggle("close");
}
function MouseSideUp () {
    sidebar.classList.remove("close");
}
function MouseSideLeave () {
    sidebar.classList.add("close");
}

// modeSwitch.addEventListener("click", () => {
// body.classList.toggle("dark");

// if (body.classList.contains("dark")) {
// modeText.innerText = "Light mode";
// } else {
// modeText.innerText = "Dark mode";

// }
// });
