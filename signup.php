<?php
    require_once 'header.php';
    
    echo <<<_END
        <script>
            function checkUser(user) {
                if (user.value == '') {
                    $('#used').html('&nbsp;')
                    return
                }
                $.post ('checkuser.php',
                    { user : user.value },
                        function(data) {
                        $('#used').html(data)
                        }
                )
            }
        </script> 
_END;

    $error = $user = $pass = "";
    
    if (isset($_SESSION['user'])) destroySession();
    
    if (isset($_POST['user']))
    {
        $user = sanitizeString($_POST['user']);
        $pass = sanitizeString($_POST['pass']);
        $confirm = sanitizeString($_POST['confirmpass']);

        if ($user == "" || $pass == "") {
            $error = 'Not all fields were entered<br><br>';
        }
        else if ($pass != $confirm) {
            $error = "Passwords do not match!";
        }
        else {
            $result = queryMysql("SELECT * FROM members WHERE user='$user'");
            if ($result->num_rows)
                $error = 'That username already exists<br><br>';
            else {
                queryMysql("INSERT INTO members VALUES('$user', '$pass')");
                die('<h4>Account created</h4>Please log in.</div></body></html>');
            }
        }
    }
    echo <<<_END
        <div class='center'>
            <p class='flow-text'>SIGN UP </p>
            <p>Enter details to sign up</p>
            <p class='red-text'>$error</p>
        </div>
        
        <form method='post' action='signup.php' id='signupform'>
            <div class='row'>
                <div class="col s6 offset-s3">
                    <div class='input-field'>
                        <i class="material-icons prefix">account_circle</i>
                        <label for='user'>Username</label>
                        <input id='user' type='text' maxlength='16' required name='user' value='$user' onBlur='checkUser(this)' placeholder='Enter username'>
                        <span id='used' class="helper-text" data-error="wrong" data-success="right">This name will be used to identify you on this site</span>
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class="col s6 offset-s3">
                    <div class='input-field'>
                        <i class='material-icons prefix'>border_color</i>
                        <label for='pass'>Password</label>
                        <input id='pass' type='password' maxlength='16' required name='pass' value='$pass' placeholder='Enter Password'>
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class="col s6 offset-s3">
                    <div class='input-field'>
                        <i class='material-icons prefix'>border_color</i>
                        <label for='confpass'>Confirm Password</label>
                        <input id='confpass' type='password' maxlength='16' required name='confirmpass' value='$pass' placeholder='Confirm Password'>
                    </div>
                </div>
            </div>

            <div class='center'>
                <button class='btn'  type='submit'> Sign Up </button>
            </div>
        </form>
        </main>
_END;

    require_once 'footer.php';

echo <<<_END_HTML
        </body>
        </html>

_END_HTML;
?>
