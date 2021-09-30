<?php
    require_once 'header.php';
    
    $error = $user = $pass = "";
    
    if (isset($_POST['user'])) {
        $user = sanitizeString($_POST['user']);
        $pass = sanitizeString($_POST['pass']);
        
        if ($user == "" || $pass == "")
            $error = 'Not all fields were entered';
        else {
            $result = queryMySQL("SELECT user,pass FROM members WHERE user='$user' AND pass='$pass'");
            if ($result->num_rows == 0) {
                $error = "Invalid login attempt";
            }
            else {
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                
                die("<p class='flow-text'>You are now logged in. Please <a data-transition='slide'
                href='members.php?view=$user'>click here</a> to continue.</p></main>
                </body></html>");
            }
        }
    }
    echo <<<_END

    <div class='center'>
        <p class='flow-text'>LOG IN </p>
        <p>Enter your credentials</p>
        <p class='red'>$error</p>
    </div>
    
        <form method='post' action='login.php'>
           
        <div class='row'>
            <div class="col s6 offset-s3">
                <div class='input-field'>
                    <i class="material-icons prefix">account_circle</i>
                    <label for='user'>Username</label>
                    <input type='text' id='user' maxlength='16' name='user' value='$user' placeholder='Username'>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="col s6 offset-s3">
                <div class='input-field'>
                    <i class='material-icons prefix'>border_color</i>
                    <label for='pass'>Password</label>
                    <input id='pass' type='password' maxlength='16' required name='pass' value='$pass' placeholder='Password'>
                </div>
            </div>
        </div>   
            
        <div class='center'>
        <button class='btn'  type='submit'> Log in </button>
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
