<?php session_start(); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <title>404 | APC</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
    </head>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: #DFDFDF;
        }
        
        main {
            flex: 1 0 auto;
        }
        
        .hit-the-floor {
            color: #fff;
            font-size: 12em;
            font-weight: bold;
            font-family: Helvetica;
            text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0, 0, 0, .1), 0 0 5px rgba(0, 0, 0, .1), 0 1px 3px rgba(0, 0, 0, .3), 0 3px 5px rgba(0, 0, 0, .2), 0 5px 10px rgba(0, 0, 0, .25), 0 10px 10px rgba(0, 0, 0, .2), 0 20px 20px rgba(0, 0, 0, .15);
        }
        
        .hit-the-floor {
            text-align: center;
        }
        
        body {
            background-color: #f1f1f1;
        }
    </style>
    <nav>
        <div class="nav-wrapper">
            <ul class="left hide-on-med-and-down">
                <li><a href="https://history.apcombined.com">History</a></li>
                <li><a href="https://language.apcombined.com">Language</a></li>
            </ul> <a href="https://www.apcombined.com/" class="brand-logo center">AP Combined</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="login">Login</a></li>
                <li><a href="calendar">Calendar</a></li>
            </ul> <a data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="side-nav" id="mobile">
                <li><a href="login">Login</a></li>
                <li><a href="history/home">History</a></li>
                <li><a href="language/home">Language</a></li>
                <li><a href="calendar">Calendar</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>
        </div>
    </nav>
    <main>
        <div class="container">
            <h1 class="hit-the-floor">404</h1>
            <p style="text-align: center; color: #596277">The page right now isn't available right now, can I take a message?</p>
            <div class="row">
                <form class="col s12" action="php/404" method="post">
                    <fieldset style="width: 70%; margin: auto">
                        <div class="row">
                            <div class="input-field col s12">
                                <input autocorrect="off" autocapitalize="off" spellcheck="false" id="username" type="text" name="username" class="validate" required>
                                <label for="username">Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea autocorrect="off" autocapitalize="off" spellcheck="off" id="message"  name="message" class="materialize-textarea" required></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <button class="btn waves-effect" type="submit" name="action" style="float: right">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
    <?php

  echo file_get_contents("footer.txt");

?>
