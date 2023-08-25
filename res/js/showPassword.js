const passwordInput = document.getElementById("admin_password");
const showPasswordIcon = document.getElementById("showPassword");

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