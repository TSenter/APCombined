<?php

    session_start();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <title>Calendar | APC</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="css/calendar.css" type="text/css" rel="stylesheet" media="screen,projection" />
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
            </ul> <a href="https://www.apcombined.com/" class="brand-logo center">AP Combined</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="login">Login</a></li>
                <li class="active"><a href="calendar">Calendar</a></li>
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
        <?php
    
    include('php/connect.php');
    
    $month = date("n");
    $year = date("Y");
    $class = "2G";
    
    $classes = array("1B", "2B", "4B", "1G", "2G", "4G");
    
    if (isset($_GET['month']) && $_GET['month'] > 0 && $_GET['month'] < 13) {
        $month = $_GET['month'];
    }
    if (isset($_GET['class'])) {
        if (in_array($_GET['class'], $classes)) {
            $class = $_GET['class'];
        }
    }
    if (isset($_GET['year']) && $_GET['year'] > 0) {
        $year = $_GET['year'];
    }
    
    $date = getdate(strtotime("$month/1/$year"));
    $days = date("t", strtotime("previous month", $date['0']));
    $dateNum = 0;
    
    $sql = "SELECT `date`,`description`,`type`,`subject` FROM calendar WHERE `classes` LIKE '%$class%'";
    $result = mysqli_query($conn, $sql);
    
    $events = array();
    while ($row=mysqli_fetch_array($result)) {
        if (!isset($events[$row['date']])) {
            $events[$row['date']] = array();
        }
        $events[$row['date']][] = $row;
    }
    
    print_eol(" <div id=\"calendar-wrap\">");
    print_eol("     <header><h1 style=\"color: #596277\">" . $date['month'] . " $year</h1></header>");
    print_eol("     <div id=\"calendar\">");
    print_eol("         <ul class=\"weekdays\">");
    print_eol("             <li>Sunday</li>");
    print_eol("             <li>Monday</li>");
    print_eol("             <li>Tuesday</li>");
    print_eol("             <li>Wednesday</li>");
    print_eol("             <li>Thursday</li>");
    print_eol("             <li>Friday</li>");
    print_eol("             <li>Saturday</li>");
    print_eol("         </ul>");
    print_eol("         <ul class=\"days\">");
    
    if ($date['wday'] !== 0) {
        for ($i = $date['wday']; $i > 0; $i--) {
            print_eol("             <li class=\"other-month\">");
            print_eol("                 <div class=\"date\">" . ($days - $i + 1) . "</div>");
            print_eol("             </li>");
        }
    }
        
    $days = date("t", strtotime("$month/1/$year"));
    
    $j = getdate(date("m/01/Y"))['wday'];
    for ($i = 0; $i <= 7 - $j; $i++) {
        $date = "$year-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" . str_pad(($i + 1), 2, "0", STR_PAD_LEFT) . " 00:00:00";
//        echo $date . "<br>";
        print_eol("             <li class=\"day\">");
        print_eol("                 <div class=\"date\">" . ($i + 1) . "</div>");
        if (isset($events[$date])) {
            foreach ($events[$date] as $row) {
                print_eol("                 <div class=\"event" . $row['type'] . "\">");
                print_eol("                     <div class=\"event-desc" . $row['type'] . "\">");
                print_eol("                         <strong>" . $row['description'] . "</strong>");
                print_eol("                     </div>");
                if (isset($row['subject'])) {
                    print_eol("                     <div class=\"event-time" . $row['type'] . "\">");
                    print_eol("                         " . $row['subject']);
                    print_eol("                     </div>");
                }
                print_eol("                 </div>");
            }
        }
        print_eol("             </li>");
        $dateNum++;
    }
    
    print_eol("         </ul>");
    print_eol("         <ul class=\"days\">");
    
    $wday = "";
    
    for ($i = $dateNum; $i < $days; $i++) {
        $date = "$year-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" . str_pad(($i + 1), 2, "0", STR_PAD_LEFT) . " 00:00:00";
        $wday = getdate(strtotime($date))['wday'];
        print_eol("             <li class=\"day\">");
        print_eol("                 <div class=\"date\">" . ($i + 1) . "</div>");
        if (isset($events[$date])) {
            foreach ($events[$date] as $row) {
                print_eol("                 <div class=\"event" . $row['type'] . "\">");
                print_eol("                     <div class=\"event-desc" . $row['type'] . "\">");
                print_eol("                         <strong>" . $row['description'] . "</strong>");
                print_eol("                     </div>");
                if (isset($row['subject'])) {
                    print_eol("                     <div class=\"event-time" . $row['type'] . "\">");
                    print_eol("                         " . $row['subject']);
                    print_eol("                     </div>");
                }
                print_eol("                 </div>");
            }
            
        }
        print_eol("             </li>");
        if ($wday === 6) {
            print_eol("         </ul>");
            if ($dateNum + 1 !== $days) {
                print_eol("         <ul class=\"days\">");
            } else {
                print_eol("         </ul>");
            }
        }
        $dateNum++;
    }
    
    if ($month + 1 <= 12)
        $month++;
    else {
        $month = 1;
        $year++;
    }
    
    $date = getdate(strtotime($month . "/1/$year"));
    $dateNum = 1;
    
    print_eol("         <ul class=\"days\">");
    
    while ($date['wday'] !== 0) {
        print_eol("             <li class=\"other-month\">");
        print_eol("                 <div class=\"date\">" . ($dateNum) . "</div>");
        print_eol("             </li>");
        $date = getdate(strtotime($date['mon'] . "/" . ($date['mday'] + 1) . "/" . $year));
        $dateNum++;
    }
    
    print_eol("          </ul>");
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `date` FROM calendar WHERE `id`='0'"));
    print_eol("          <p style=\"width: 100%\">Last updated: " . date("M. j, g:i a", strtotime($result['date'])) . "</p>");
    print_eol("      </div>");
    print_eol("  </div>");
    
    function print_eol($text) {
        echo $text . PHP_EOL;
    }
    
    ?>
    </main>
    <?php

  echo file_get_contents("footer.txt");

?>