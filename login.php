<?php include 'header.php'; ?>
<div class="container fade-in">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-start">Administrator Login</h2>
            <hr>
            <form method="POST" action="functions/loginf.php" id="login-form">
                <div class="password-container" id="password-container">
                    <div class="form-group">
                        <label for="username"><i class="fas fa-envelope"></i> Username:</label>
                        <input type="text" class="form-control" name="admin_username" id="admin_username"
                            placeholder="Enter your username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> Password:</label>
                        <input type="password" class="form-control" name="admin_password" id="admin_password"
                            placeholder="Enter your password" autocomplete="off" required>
                    </div>
                    <i class="show-icon fas fa-eye" id="showPassword"></i>

                    <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger"><i class="fas fa-info-circle"></i> <?php echo $_GET['error']; ?></p>
                    <?php } elseif (isset($_GET['redirecting_error'])) { ?>
                    <p class="alert alert-danger text-dark"><i class="fas fa-info-circle"></i>
                        <?php echo $_GET['redirecting_error']; ?><?php } ?></p>
                    <button type="submit" name="submit" class="btn btn-dark btn-block shadow-lg"><i
                            class="fas fa-sign-in-alt"></i> Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
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
</script>
<?php include 'footer.php'; ?>