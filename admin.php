<?php 
    session_start();
    ini_set("date.timezone", "America/New_York");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Admin Portal | APC</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
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
</style>
<nav>
    <div class="nav-wrapper">
        <ul class="left hide-on-med-and-down">
            <li><a href="https://history.apcombined.com">History</a></li>
            <li><a href="https://language.apcombined.com">Language</a></li>
        </ul>
        <a href="https://www.apcombined.com/" class="brand-logo center">AP Combined</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="login">Login</a></li>
            <li><a href="calendar">Calendar</a></li>
        </ul>
        <a data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
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
    <?php
    
        $passes = array(
            '[REMOVED]' => '[REMOVED]',
            '[REMOVED]' => '[REMOVED]',
            '[REMOVED]' => '[REMOVED]'
        );
    
        // TODO Handle past events
        if (isset($_POST['page_action'])) {
            include('php/connect.php');
            if ($_POST['page_action'] === "add_event") {
                $temp = array("1B", "2B", "4B", "1G", "2G", "4G");
                $classes = array();
                foreach ($temp as $class) {
                    if (!empty($_POST[$class]))
                        $classes[] = $class;
                }
                $date = date("Y-m-d", strtotime($_POST['date']));
                $sql = "INSERT INTO `calendar` (`date`, `classes`, `description`, `subject`, `type`) VALUES ('" . $date . "', '" . implode(",", $classes) . "', '" . htmlentities($_POST['description'], ENT_QUOTES) . "', '" . htmlentities($_POST['subject'], ENT_QUOTES) . "', '" . $_POST['type'] . "')";
                mysqli_query($conn, $sql);
                $date = date("Y-m-d H:i:s");
                $sql = "UPDATE `calendar` SET `date` = '$date' WHERE `calendar`.`id` = 0";
            } else if ($_POST['page_action'] === "delete_user") {
                $email = $_POST['delete'];
                mysqli_query($conn, "DELETE FROM `users` WHERE `users`.`email` = '$email'");
            } else if ($_POST['page_action'] === "ban_user") {
                if (isset($_POST['ban'])) {
                    $email = $_POST['ban'];
                    $name = $_POST['user_name'];
                    $ip = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `ip` FROM users WHERE `email`='" . $email . "'"))['ip'];
                    $reason = $_POST['reason'];
                
                    mysqli_query($conn, "INSERT INTO `bannedUsers` (`name`, `ip`, `reason`) VALUES ('$name', '$ip', '$reason')");
                }
            } else if ($_POST['page_action'] === "login") {
                $user = $_POST['user'];
                $pass = $_POST['password'];
                if (password_verify($pass, $passes[$user])) {
                    echo "<script type=\"text/javascript\">" . PHP_EOL;
                    echo "window.onload = Materialize.toast('Logged in as \'admin\'', 4000)" . PHP_EOL;
                    echo "</script>";
                    $_SESSION['admin'] = 0;
                    if ($user == '[REMOVED]')
                        $_SESSION['subject'] = "US History";
                    else if ($user == '[REMOVED]')
                        $_SESSION['subject'] = "Language and Composition";
                } else {
                    echo "<script type=\"text/javascript\">" . PHP_EOL;
                    echo "window.onload = Materialize.toast('Your username and/or password don\'t match. Please try again.', 4000)" . PHP_EOL;
                    echo "</script>";
                }
            } else if ($_POST['page_action'] === "save_event") {
                $id = intval($_POST['id']);
                $temp = array("1B", "2B", "4B", "1G", "2G", "4G");
                $classes = array();
                foreach ($temp as $class) {
                    if (!empty($_POST[$class]))
                        $classes[] = $class;
                }
                $date = date("Y-m-d", strtotime($_POST['date']));
                $sql = "UPDATE calendar SET `date`='" . $date . "', `classes`='" . implode(",", $classes) . "', `description`='" . htmlentities($_POST['description'], ENT_QUOTES) . "', `subject`='" . htmlentities($_POST['subject'], ENT_QUOTES) . "', `type`='" . $_POST['type'] . "' WHERE `id`='" . $_POST['id'] . "'";
                mysqli_query($conn, $sql);
            } else if ($_POST['page_action'] === "delete_event") {
                $event = $_POST['delete'];
                mysqli_query($conn, "DELETE FROM `calendar` WHERE `id`='$event'");
            }
        }
        
        if (!isset($_SESSION['admin'])) {
            echo file_get_contents("templates/login.html");
        } else if (!isset($_GET['action']) && isset($_SESSION['admin'])) {
            system("php templates/panel.php");
        } else if (isset($_SESSION['admin']) && $_GET['action'] === "event_add") {
            system("php templates/event_add.php" . (isset($_SESSION['subject']) ? " subject='" . $_SESSION['subject'] . "'" : ""));
        } else if (isset($_SESSION['admin']) && $_GET['action'] === "event_modify") {
            $str = "php templates/event_modify.php ";
            foreach ($_GET as $key => $value) {
                $str .= "$key=" . urlencode($value) . " ";
            }
            system(trim($str));
        } else if (isset($_SESSION['admin']) && $_GET['action'] === "user_modify") {
            system("php templates/user_modify.php");
        } else if (isset($_SESSION['admin']) && $_GET['action'] === "logout") {
            unset($_SESSION['admin']);
            $url = "https://www.apcombined.com/admin";
            die('<script type="text/javascript">window.location=\'' . $url . '\';</script>');
        }
    
    ?>
</main>
<?php

  echo file_get_contents("footer.txt");

?>