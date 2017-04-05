<?php

  session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Home | APC</title>
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
        <li><a href="history/home">History</a></li>
        <li><a href="language/home">Language</a></li>
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
    <div class="container" style="width: 70%; margin: auto">
      <h2 style="color: #1B2845">Welcome</h2>
      <h5 class="header col s12 light" style="text-indent: 25px">
        APCombined.com is a website designed to help students better prepare for the AP Exam. The class spans the entire year, which can cause issues once the AP Exams roll around. 
        APCombined.com has features to make sure that you as a student can retain as much knowledge as you need to get a 5 on the AP exam!
        The core idea of the website is to make resources readily available to a student.
        Keeping track of a paper or the current unit's notes may be a hassle for some people and for others nearly impossbile so the ease of access that the website provides should allow for greater organization overall.
        Good luck on your AP exams!
      </h5>
      <h5 class="header col s12 light" style="text-align: right; padding-right: 10%"> &#8211; Tyler and Dennis</h5>
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center"><i class="material-icons" style="color: #596277">format_list_bulleted</i></h2>
            <h5 class="center">Notes</h5>
            <p class="light" style="text-align: center"> You no longer need to worry about getting notes if you miss a day in class. The notes taken in each class will be uploaded within two days, so if you miss Tuesday's lecture on World War I, the notes will be available on here by Wednesday. </p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center"><i class="material-icons" style="color: #596277">assignment</i></h2>
            <h5 class="center">Tests</h5>
            <p class="light" style="text-align: center"> Numerous multiple choice tests are available for both US History and Language that you complete on the website. These tests are graded automatically, so you'll know your scores immediately, complete with an explanation for each question. </p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center"><i class="material-icons" style="color: #596277">insert_drive_file</i></h2>
            <h5 class="center">Essays</h5>
            <p class="light" style="text-align: center"> If you feel like you need extra practice writing, APCombined.com offers DBQs, LEQs, Rhetorical Analysis, and Synthesis prompts. Mrs. Brimer and Mrs. Kelly will grade essays sent to them and offer feedback so you can further improve your essay scores. </p>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php echo file_get_contents("footer.txt"); ?>
</html>