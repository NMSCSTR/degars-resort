const passwordInput = document.getElementById("admin_password");
const showPasswordIcon = document.getElementById("showPassword");
const passContainer = document.getElementById("password-container");

passContainer.style.position = "relative";
showPasswordIcon.style.position = "absolute";
showPasswordIcon.style.top = "65%";
showPasswordIcon.style.right = "10px";
showPasswordIcon.style.transform = "translateY(-50%)";
showPasswordIcon.style.cursor = "pointer";

showPasswordIcon.addEventListener("click", () => {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showPasswordIcon.classList.remove("fa-eye");
        showPasswordIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        showPasswordIcon.classList.remove("fa-eye-slash");
        showPasswordIcon.classList.add("fa-eye");
    }
});