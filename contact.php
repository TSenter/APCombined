<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Contact | APC</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/initCopy.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.16/clipboard.min.js"></script>
</head>
<style>
    
    h1 {
        text-align: center;
    }
    
    h2 {
        text-align: center;
    }
    
    h6 {
        text-align: center;
        color: #fff;
        text-shadow: #fff 0 -1px 4px, #ff0 0 -2px 10px, #ff8000 0 -10px 20px, red 0 -18px 40px;
    }
    
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
        background-color: #DFDFDF;
    }
    
    main {
        flex: 1 0 auto;
    }
</style>
<nav>
    <div class="nav-wrapper">
        <ul class="left hide-on-med-and-down">
            <li><a href="history/home">History</a></li>
            <li><a href="language/home">Language</a></li>
        </ul> <a href="https://apcombined-tsenter.c9users.io/" class="brand-logo center">AP Combined</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="login">Login</a></li>
            <li><a href="calendar">Calendar</a></li>
        </ul> <a data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="side-nav" id="mobile">
            <li><a href="login">Login</a></li>
            <li><a href="history/home">History</a></li>
            <li><a href="language/home">Language</a></li>
            <li><a href="calendar">Calendar</a></li>
            <li class="active"><a>Contact</a></li>
        </ul>
    </div>
</nav>
<main>
    <h1>Contact</h1>
    <div class="container" style="margin: 0 auto; width: 50%">
        <div class="row" style="text-align: center">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text"> <span class="card-title">Mrs. Brimer</span>
                        <p>clare.brimer@knoxschools.org</p>
                    </div>
                    <div class="card-action">
                        <button class="btn brimer waves-effect waves-light" onclick="Materialize.toast('Copied to clipboard!', 2000)" data-clipboard-text="clare.brimer@knoxschools.org">Copy</button>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text"> <span class="card-title">Mrs. Kelly</span>
                        <p>tiffany.kelly@knoxschools.org</p>
                    </div>
                    <div class="card-action">
                        <button class="btn brimer waves-effect waves-light" onclick="Materialize.toast('Copied to clipboard!', 2000)" data-clipboard-text="tiffany.kelly@knoxschools.org">Copy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    echo file_get_contents("footer.txt");
?>