<?php 
    require_once 'header.php';
    $text ="";
    if (!$loggedin) 
        die("</div></body></html>");
    if (isset($_GET['view'])) 
        $view = sanitizeString($_GET['view']);
    else $view = $user;
    if (isset($_POST['text'])) {
        $text = sanitizeString($_POST['text']);
        if ($text != "") {
            $pm = substr(sanitizeString($_POST['pm']),0,1);
            $time = time();
            queryMysql("INSERT INTO messages VALUES(NULL, '$user',
            '$view', '$pm', $time, '$text')");
        }
    }
    if ($view != "") {
        if ($view == $user) $name1 = $name2 = "Your";
        else {
            $name1 = "<a href='members.php?view=$view'>$view</a>'s";
            $name2 = "$view's";
        }
        echo "<h3>$name1 Messages</h3>";
        // showProfile($view);
echo <<<_END
<div class="row">
    <div class="col m7 s12">


_END;
date_default_timezone_set('UTC');

        if (isset($_GET['erase'])) {
            $erase = sanitizeString($_GET['erase']);
            queryMysql("DELETE FROM messages WHERE id=$erase AND recip='$user'");
        }

        $query = "SELECT * FROM messages WHERE recip='$view' ORDER BY time DESC";
        $result = queryMysql($query);
        $num = $result->num_rows;
        for ($j = 0 ; $j < $num ; ++$j) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if ($row['pm'] == 0 || $row['auth'] == $user ||
            $row['recip'] == $user) {
                echo date('M jS \'y g:ia:', $row['time']);
                echo " <a href='messages.php?view=" . $row['auth'] .
                "'>" . $row['auth']. "</a> ";
                if ($row['pm'] == 0)
                echo "wrote: &quot;" . $row['message'] . "&quot; ";
                else
                echo "whispered: <span class='whisper'>&quot;" .
                $row['message']. "&quot;</span> ";
                if ($row['recip'] == $user)
                echo "[<a href='messages.php?view=$view" .
                "&erase=" . $row['id'] . "'>erase</a>]";
                echo "<br>";
            }
        }
    }
    if (!$num)
    echo "<br><span class='info'>No messages yet</span><br><br>";
    echo "<br><a data-role='button'
    href='messages.php?view=$view'>Refresh messages</a>";
echo <<<_END1
        <form method='post' action='messages.php?view=$view'>
            <p>Type here to leave a message</p>
            <p><label>
                    <input type="radio" class="with-gap" name='pm' id='public' value='0' checked />
                    <span>Public</span>
                </label>
                
                <label>
                    <input type="radio" class="with-gap" name='pm' id='private' value='1' />
                    <span>Private</span>
                </label>
            </p>
            <div class="row">
                <div class="input-field col s12">
                    <div class='col s11'>
                        <textarea id="textarea1" class="materialize-textarea" name='text' placeholder="Type your message" data-length="4096" focus></textarea>
                    </div>
                    <div class='col s1'>
                        <button type="submit" class="waves-effect btn-flat"><i class="material-icons">send</i></button>
                    </div>
                </div>
            </div>
               
        </form><br>
    </div>
    <div class="col m5 s12">
        <p class="flow-text">Your Profile</p>
    
_END1;
        showProfile($view);

echo <<<_END2

    </div>
</div>

            
_END2;

        
?>
 </div><br>
 </body>
</html>