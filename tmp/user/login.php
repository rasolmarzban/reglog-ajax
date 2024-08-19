 <div class="reglog-wrapper" id="reglog"
     style="background-color: 
     <?php list($r, $g, $b) = sscanf($wp_reglog_options['form-bg-color'], "#%02x%02x%02x"); ?>
     rgba(<?php echo $r ?>,<?php echo $g ?>,<?php echo $b ?>, <?php echo $wp_reglog_options['form-bg-opacity'] ?>);
     ">
     <div class="login-wrapper">
         <form method="post" action="post" id="reglog-login">
             <?php if (isset($wp_reglog_options['login-title'])): ?>
                 <h3 id="logo"><?php echo $wp_reglog_options['login-title'] ?></h3>
             <?php endif ?>
             <div class="alert" style="display: none;">
             </div>

             <div class=" reglog-input-container">
                 <input type="email" id="user-email" name="email" />
                 <label for="email">Email</label>
             </div>
             <div class="reglog-input-container">
                 <input type="password" id="user-password" name="password" />
                 <label for="password">Password</label>
             </div>
             <a class="forgot" href="#">Forgot Password?</a>
             <a class="register" href="#">Register</a>

             <input type="submit" class="button-primary" name="submit" value="Log In" />

         </form>
     </div>
 </div>