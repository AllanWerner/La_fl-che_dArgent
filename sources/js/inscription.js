

document.addEventListener("DOMContentLoaded", function () {
    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    a.addEventListener("click", login);
    b.addEventListener("click", register);

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.classList.add("white-btn");
        b.classList.remove("white-btn");
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.classList.remove("white-btn");
        b.classList.add("white-btn");
        x.style.opacity = 0;
        y.style.opacity = 1;
    }
});
