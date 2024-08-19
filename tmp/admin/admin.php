<div class="wrap">
    <h1>Hello world</h1>


    <form action="" method="post">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Login Active</th>
                <td><input type="checkbox" name="login-active" <?php echo $wp_reglog_options['login-active'] ? 'checked' : '' ?>> </td>
            </tr>
            <tr valign="top">
                <th scope="row">Register Active</th>
                <td><input type="checkbox" name="register-active" <?php echo $wp_reglog_options['register-active'] ? 'checked' : '' ?>></td>
            </tr>
            <tr valign="top">
                <th scope="row">Login Form Title</th>
                <td><input type="text" name="login-title" value="<?php echo isset($wp_reglog_options['login-title']) ? $wp_reglog_options['login-title'] : '' ?>"></td>
            </tr>
            <tr valign="top">
                <th scope="row">Register Form Title</th>
                <td><input type="text" name="register-title" value="<?php echo isset($wp_reglog_options['register-title']) ? $wp_reglog_options['register-title'] : '' ?>"></td>
            </tr>
            <tr valign="top">
                <th scope="row">Select your background color:</th>
                <td>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
                    </script>
                    <input type=color name="form-bg-color" value="<?php echo isset($wp_reglog_options['form-bg-color']) ? $wp_reglog_options['form-bg-color'] : '' ?>">
                    <!-- color -->
                    <input type="range" name="form-bg-opacity" min="0" max="1" step="0.1" value="<?php echo isset($wp_reglog_options['form-bg-opacity']) ? $wp_reglog_options['form-bg-opacity'] : '' ?>">
                    <!-- transparency -->

                    <div class="test-opacity">Test opacity</div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"></th>
                <td><input type="submit" name="saveData" class="button" value="Save Settings"></td>
            </tr>
        </table>
    </form>

</div>

<script>
    $(document).ready(function() {

        $("input").change(function() {

            var opacity = $("input[type=range]").val();
            var color = $("input[type=color]").val();

            var rgbaCol = 'rgba(' + parseInt(color.slice(-6, -4), 16) + ',' + parseInt(color.slice(-4, -2), 16) + ',' + parseInt(color.slice(-2), 16) + ',' + opacity + ')';

            $('.test-opacity').css('background-color', rgbaCol)
        })
    })
</script>