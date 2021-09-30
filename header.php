<?php
    session_start();

echo <<<_INIT
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset=\"UTF-8\">
            <meta http-equiv="\X-UA-Compatible\" content=\"IE=edge\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <script src='jquery.js'></script>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link rel='stylesheet' href='style.css'>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        </head>
_INIT;

    require_once 'functions.php';

    $userstr = 'Welcome Guest';

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $loggedin = TRUE;
        $userstr = "Logged in as : $user";
    }
    else    
        $loggedin = FALSE;
        
        
echo <<<_MAIN_PARTIAL
            <title>Robin's Nest: $userstr</title>
        </head>
        <body>
            <div data-role='page' class=''>
            <header>
                <nav>
                    <div class="nav-wrapper teal darken-3 px-2">
                        <a href="#" class="brand-logo"><i class="large material-icons">local_library</i>Rabin Nest</a>
_MAIN_PARTIAL;
if ($loggedin) {
echo <<<_LOGGEDIN
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a data-role='button' data-inline='true' data-icon='home' data-transition="slide" href='members.php?view=$user'>Home</a></li>
                            <li><a data-role='button' data-inline='true' data-transition="slide" href='members.php'>Members</a></li>
                            <li><a data-role='button' data-inline='true' data-transition="slide" href='friends.php'>Friends</a></li>
                            <li><a data-role='button' data-inline='true' data-transition="slide" href='messages.php'>Messages</a></li>
                            <li><a data-role='button' data-inline='true' data-transition="slide" href='profile.php'>Edit Profile</a></li>
                            <li><a data-role='button' data-inline='true'  data-transition="slide" href='logout.php'>Log out</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <main class='container'>
_LOGGEDIN;
}
else
{
echo <<<_GUEST
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a data-role='button' data-inline='true' data-icon='home' data-transition='slide' href='index.php'>Home</a></li>
                <li><a data-role='button' data-inline='true' data-icon='plus' data-transition="slide" href='signup.php'>Sign Up</a></li>
                <li><a data-role='button' data-inline='true' data-icon='check' data-transition="slide" href='login.php'>Log In</a></li>
            </ul>
            </div>
            </nav>
            </div>
            <main class='container'>
            
_GUEST;
}

            //     <ul id="nav-mobile" class="right hide-on-med-and-down">
            //         <li><a href="sass.html">Sass</a></li>
            //         <li><a href="badges.html">Components</a></li>
            //         <li><a href="collapsible.html">JavaScript</a></li>
            //     </ul>
            //     </div>
            // </nav>
            //     <div id='logo' class='center'><img id='robin' src='rabin.png'></div>
            //     <div class='username'>$userstr</div>
            // </div>
            // <div data-role='content'>


?>
