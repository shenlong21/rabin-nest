<?php
    // connecting to database
    $dbhost = 'localhost';
    $dbname = 'rabinNest';
    $dbuser = 'root';
    $dbpass = '';

    $connection = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

    if ($connection->connect_error)
        die("Fatal Error!");

    function createTable($name, $query) {
        queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
        echo "Query Executed Successfully!";
    }


    function queryMysql($query) {
        global $connection;
        $result = $connection->query($query);
        if (!$result)
            die("Fatal Error");
        return $result;
    }

    function destroySession() {
        $_SESSION = array();
        // if(session_id() != "" || isset($_COOKIE[session_name()]))
        //     setcookie(session_name(), '', time()-2592000, '/');

        session_destroy();
    }


    function sanitizeString($var) {
        global $connection;
        $var = strip_tags($var);
        $var = htmlentities($var);
        if (get_magic_quotes_gpc())
            $var = stripslashes($var);
        return $connection->real_escape_string($var);
    }


    function showProfile($user) {
        $image = "static/profiles/defaultjpg.jpg";
        if (file_exists("static/profiles/$user.jpg"))
        $image = "static/profiles/$user.jpg";   
        $bio = '';
        $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
        if ($result->num_rows) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $bio = $row['text'];
        }
        if ($bio == "")
            $bio = "Your bio will appear here";
        
echo <<<_PROFILE
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-image">
            <img src="$image">
            <span class="card-title">$user</span>
            </div>
            <div class="card-content">
            <p>$bio</p>
            </div>
            
        </div>
    </div>
</div>

_PROFILE;
    }


?>
