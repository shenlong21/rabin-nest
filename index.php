<?php
    
    require_once 'header.php';
    
    echo "<div class='center flow-text'><p>Welcome to Robin's Nest</p>";
    
    if ($loggedin) echo " $user, you are logged in";
    else {
        echo '<h5>Please sign up or log in to continue</h5>';
        echo '<a class="waves-effect waves-light btn mx-1 darken-3" href="signup.php"><i class="material-icons left">group_add</i>sign up</a>';
        echo '<a class="waves-effect waves-light btn mx-1 darken-3" href="login.php"><i class="material-icons left">directions_run</i>login</a>';
    } 
    
echo <<<_END_MAIN
            </div><br>
            </main>
            
            <script>
            $(document).ready(function(){
                $('.materialboxed').materialbox();
              });
            </script>

_END_MAIN;

require_once 'footer.php';

echo <<<_END_HTML
        </body>
        </html>
_END_HTML;        
?>