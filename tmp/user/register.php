<div class="reglog-wrapper" id="reglog">
    <div class="login-wrapper">
        <form method="post" action="" methode="POST" id="reglog-register">
            <?php if (isset($wp_reglog_options['register-title'])): ?>
                <h3 id="logo"><?php echo $wp_reglog_options['register-title'] ?></h3>
            <?php endif ?>
            <div class="alert" style="display: none;">
            </div>
            <div class="reglog-input-container">
                <input type="text" id="firstname" name="first-name" />
                <label for="first-name">First Name</label>
            </div>
            <div class="reglog-input-container">
                <input type="text" id="lastname" name="last-name" />
                <label for="last-name">Last Name</label>
            </div>
            <div class="reglog-input-container">
                <input type="email" id="useremail" name="user-email" />
                <label for="user-email">Email</label>
            </div>
            <div class="reglog-input-container">
                <input type="password" id="userpassword" name="user-password" />
                <label for="user-password">Password</label>
            </div>
            <a class="forgot" href="#">Forgot Password?</a>
            <a class="register" href="#">Login</a>

            <input type="submit" class="button-primary" name="submit" value="Register" />

        </form>
    </div>
</div>