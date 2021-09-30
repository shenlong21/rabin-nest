<?php
    require_once 'header.php';

    if (!$loggedin) die("</div></body></html>");

    
    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
    if (isset($_POST['text'])) {
        $text = sanitizeString($_POST['text']);
        $text = preg_replace('/\s\s+/', ' ', $text);
        if ($result->num_rows)
        queryMysql("UPDATE profiles SET text='$text' where user='$user'");
        else queryMysql("INSERT INTO profiles VALUES('$user', '$text')");
    }
    else {
        if ($result->num_rows) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $text = stripslashes($row['text']);
        }
        else $text = "";
    }
    
    $text = stripslashes(preg_replace('/\s\s+/', ' ', $text));
    if (isset($_FILES['image']['name'])) {
        $saveto = "static/profiles/$user.jpg";

        move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
        $typeok = TRUE;
        switch($_FILES['image']['type'])
        {
            case "image/gif": $src = imagecreatefromgif($saveto); break;
            case "image/jpeg": // Both regular and progressive jpegs
            case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
            case "image/png": $src = imagecreatefrompng($saveto); break;
            default: $typeok = FALSE; break;
        }
        
        if ($typeok) {
            list($w, $h) = getimagesize($saveto);
            $max = 500;
            $tw = $w;
            $th = $h;
            if ($w > $h && $max < $w) {
                $th = $max / $w * $h;
                $tw = $max;
            }
            elseif ($h > $w && $max < $h) {
                $tw = $max / $h * $w;
                $th = $max;
            }
            elseif ($max < $w) {
                $tw = $th = $max;
            }

            $tmp = imagecreatetruecolor($tw, $th);
            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
            imageconvolution($tmp, array(array(-1, -1, -1),
            array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
            imagejpeg($tmp, $saveto);
            imagedestroy($tmp);
            imagedestroy($src);
        }
    }
?>

<div class="row">
    <div class="col m6 s12">
        <p class="flow-text">Update Profile</p>
        
        <div class="row">

            <form data-ajax='false' method='post' action='profile.php' enctype='multipart/form-data' col="col s12">
            <div class="row">
                <div class="input-field col s12">
                    
                    <textarea id="textarea1" class="materialize-textarea" name='text' placeholder="Type your bio"><?= $text ?></textarea>
                    <label for="textarea1">BIO</label>
                </div>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span> image</span>
                    <input type="file" name='image' size='14' >
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

            
            <!-- Image: <input type='file' name='image' size='14'> -->
            <!-- <input type='submit' value='Save Profile'> -->
            <button type="submit" class="btn">Save Profile </button>
        </form>
    </div>
    </div>
    <div class="row">

        <div class="col m6 s12">
                <p class="flow-text">Your Profile</p>
                <?php 
        showProfile($user);
        
        ?>
        </div>
    </div>

</div>
    <!-- <h3>Enter or edit your details and/or upload an image</h3> -->
       
</main>

<?php 
    // require_once 'footer.php';
?>
<script>
      $('#textarea1').val();
        M.textareaAutoResize($('#textarea1'));
</script>
        </body>
        </html>
