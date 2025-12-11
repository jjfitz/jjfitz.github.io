---
title: Scavenger Hunt Web App
description: An interactive scavenger hunt game built with Bootstrap and JavaScript. This is a Scavenger Hunt that I used to propose to my wife.
author: jason
date: 2019-08-15 00:34:00 +0800
categories: [Web App, Games]
tags: [scavenger hunt, Bootstrap, JavaScript, game]
pin: false
math: false
---

<!-- <!DOCTYPE html> -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scavenger Hunt</title>

    <!-- Bootstrap -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <!-- <div class="sidenav">
      <a href="#about">SLD</a>
      <a href="#services">Questions</a>
      <a href="#clients">Games</a>
      <a href="#contact">Scavenger Hunts</a>
    </div> -->
    <!-- <div id="wrapper">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a href="#">Home</a></li>
            <li><a href="#">Another link</a></li>
            <li><a href="#">Next link</a></li>
            <li><a href="#">Last link</a></li>
        </ul>
    </div>
    <div id="page-content-wrapper">
        <div class="page-content"> -->
    <!-- <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Home</a>
        </div> -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Assignments <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="assignments.html">Assignments Page</a></li>
                <li><a href="hello.html">Week 1</a></li>
                <li><a href="index.html">Week 2</a></li>
                <li><a href="https://nameless-woodland-94520.herokuapp.com/online-store.php">Week 3</a></li>
                <li><a href="#">Week 4</a></li>
                <li><a href="https://nameless-woodland-94520.herokuapp.com/Budgets/login.php">Week 5</a></li>
                <li><a href="https://nameless-woodland-94520.herokuapp.com/Budgets/login.php">Week 6</a></li>
                <li><a href="https://nameless-woodland-94520.herokuapp.com/Budgets/login.php">Week 7</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Analysis<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="analysis.html">Data Analysis Home</a></li>
                <li><a href="analysis/2_Case_Study.html">Wealth and Life Expectancy (Gapminder)</a></li>
                <li><a href="analysis/Case_Study_3.html">Gun Deaths</a></li>
                <li><a href="analysis/Case_Study4.html">The Rise In Human Heights</a></li>
                <li><a href="analysis/Case_Study06.html">Words Between References of Jesus</a></li>
                <li><a href="analysis/Case_Study07.html">IBC Businesses</a></li>
                <li><a href="analysis/Case_Study08.html">Stocks: Interacting With Time</a></li>
                <li><a href="analysis/Case_Study10.html">Building The Past</a></li>
                <li><a href="analysis/job_search.html">Semester Project</a></li>
              </ul>
            </li>
            <li>
              <a href="online-scavenger-hunt.html" role="button">Online Scavenger Hunt</a>
            </li>
          </ul> -->
        <!--</div>--><!-- /.navbar-collapse -->
      <!--</div>--><!-- /.container-fluid -->
    <!--</nav>-->

    <div class="jumbotron">
      <div class="container">
        <h1 class="text-center">Scavenger Hunt!</h1>
        <p>Good Morning!</p>
        <p>I hope you are willing to go on a scavenger hunt! If at anytime you have any questions about the instructions, please let me know. Also, let me know when you start. If you accept this invitation, please go to the place where we first met :) There should be a note addressed to you on as you walk in from the east doors. it should be on a desk. Enter the password, when you find it, to continue :)</p>
        <script type="text/javascript">
        function validateForm() {
            var x = document.getElementById("fname").value;
            if (x != "iloveu") {
                alert("This is not the right password");
                return false;
            } else {
              document.getElementById("demo").innerHTML = "<p>You did it!" + "</p>";
            }
        } 
        document.getElementById('demo1').style.display = 'none'
        document.getElementById('demo2').style.display = 'none'
        document.getElementById('demo3').style.display = 'none'
        function toggle_visibility1() {
       var e = document.getElementById("demo1");
       var x = document.getElementById("fname").value;
       if (x != "iloveu") {
        alert("This is not the right password");
                return false;
       } else {
         if(e.style.display == 'block')
            e.style.display = 'none';
         else
            e.style.display = 'block';
       }
     }
     function toggle_visibility2() {
       var e = document.getElementById("demo2");
       var x = document.getElementById("fnam").value;
       if (x != "eternity") {
        alert("This is not the right password");
                return false;
       } else {
         if(e.style.display == 'block')
            e.style.display = 'none';
         else
            e.style.display = 'block';
       }
     }
     function toggle_visibility3() {
       var e = document.getElementById("demo3");
       var x = document.getElementById("fna").value;
       if (x != "fitzgerald") {
        alert("This is not the right password");
                return false;
       } else {
         if(e.style.display == 'block')
            e.style.display = 'none';
         else
            e.style.display = 'block';
       }
     }
        </script>
        Password: <input type="text" id="fname">
        <button onclick="toggle_visibility1()">Submit</button>
        <p id="demo"></p>
        <div id="demo1" style="display: none">
          <p>I'm glad you found it! Now please go to where we had our first date :) You should see another note addressed to you on the right side of the building by a bench as you are walking towards the doors.</p>
          Password: <input type="text" id="fnam">
        <button onclick="toggle_visibility2()">Submit</button>
        </div>
        <div id="demo2" style="display: none">
          <p>Hooray! You are here! One more stop alone (sorry) and then we will be together again! Please go to where we first held hands :) You should see another note addressed to you by the Cinemark theater entrance.</p>
          Password: <input type="text" id="fna">
        <button onclick="toggle_visibility3()">Submit</button>
        </div>
        <div id="demo3" style="display: none">
          <p>That's it! Now come find me at the back of the old Provo temple :) Let me know when you are on your way! I'll be watching for you ;)</p>
        </div>
      </div>
    </div>
    <!-- </div>
    </div> -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--https://conversationstartersworld.com/first-date-questions/ #38
    https://www.zoosk.com/date-mix/dating-advice/first-date-tips/dating-questions-ask-first-date/ 
    chess game - https://lichess.org/-->
    <script src="bootstrap/bootstrap.min.js"></script>
  </body>
</html>