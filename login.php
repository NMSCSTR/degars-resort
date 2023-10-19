<?php include 'header.php'; ?>
<title>Degars Resort | Login</title>

<div class="container fade-in">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <img class="d-block mx-auto mb-4" src="https://img.icons8.com/external-others-inmotus-design/67/external-D-qwerty-keypad-others-inmotus-design.png" alt="" width="72" height="72">
            <h1 class="fw-bolder text-center">Administrator Login</h1><hr>
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
<script src="res/js/showPassword.js"></script>
<?php include 'footer.php'; ?>