---
title: Speed Reading Web App
description: A web app to help users practice and measure speed reading, featuring word count, reading time estimation, and interactive JavaScript tools.
author: jason
date: 2019-09-20 00:34:00 +0800
categories: [Web App, Reading]
tags: [speed reading, JavaScript, reading efficiency, web app]
pin: false
math: false
---

[Try the Speed Reading App here](/speed-reading-app/)

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Speed Reading</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript">

      // https://stackoverflow.com/questions/33682895/can-i-force-the-browser-to-render-dom-changes-during-javascript-execution

      function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
          if ((new Date().getTime() - start) > milliseconds){
            break;
          }
        }
      }

      function count_word() {
        var x = document.getElementById("speed_text");
        var split_word = x.value.split(" ", 1000);
        var ww = document.getElementById("totwords");
        ww.innerHTML = "There are: " + split_word.length + " words in this text";
        var wpm = document.getElementById("wpm").value;
        var minu = split_word.length / wpm; 
        document.getElementById("read_time").innerHTML = "Minutes it will take to finish: " + minu;
      }

      // const input = document.querySelector('speed_text');
      // const log = document.getElementById('totwords');

      // input.addEventListener('change', updateValue);

      // function updateValue(e) {
      //   log.textContent = e.srcElement.value;
      // }

      function speed_read() {
        var w = document.getElementById("speed_text").value;
        var wpm = document.getElementById("wpm").value;
        var numword = document.getElementById("numwords").value;
        var el = document.getElementById("speed_word");
        var split_words = w.split(" ", 1000);
        var speed = (60000 / wpm)*numword;

        if (numword == 1) {
          for (var i = 0; i <= split_words.length - 1; i++) {
            setTimeout(function(i) {
                el.innerHTML = split_words[i];
            }, speed * i, i);
          }
        }
        if (numword == 2) {
          for (var i = 0; i <= split_words.length - 1; i+=2) {
            setTimeout(function(i) {
                el.innerHTML = split_words[i] + " " + split_words[i+1];
            }, speed * i, i);
          }
        }
        if (numword == 3) {
          for (var i = 0; i <= split_words.length - 1; i+=3) {
            setTimeout(function(i) {
                el.innerHTML = split_words[i] + " " + split_words[i+1] + " " + split_words[i+2];
            }, speed * i, i);
          }
        }
      }

    </script>

  </head>
  <body>
    <div id="navbar-placeholder"></div>

    <script>
        // Fetch and insert navbar.html
        fetch('/navbar.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbar-placeholder').innerHTML = data;
            })
            .catch(error => {
                console.error('Error loading navigation bar:', error);
            });
    </script>

    <div class="container">
      <h1 class="page-header">Introduction</h1>
      <p class="lead">Paste in some text that you want to read quickly. Hit the start button to start reading.</p>
      <textarea onchange="count_word();" id="speed_text" placeholder="Paste in here..." class="center-block form-control">This is just some test text. Click on start reading to read.</textarea>
      WPM: <input onchange="count_word();" type="text" id="wpm", value="300"><br/>
      Words to see at a time: <input onchange="count_word();" type="text" id="numwords", value="1"><br/>
      <p id="totwords"></p>
      <p id="read_time"></p>
    </div>

    <div class="jumbotron">
      <div class="container">
        <h1 class="text-center" id="speed_word">This is some sample text.</h1>
        <input id="clickMe" type="button" value="Start Reading" onclick="speed_read();" class="center-block" />
      </div>
    </div>


    <!-- <blockquote class="blockquote">
      <p>"Imagination is more important than knowledge."</p>
      <footer>Albert Einstein</footer>
    </blockquote> -->
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/bootstrap.min.js"></script>

    <footer id="footer-placeholder">place</footer>

    <script>
      // Fetch and insert footer.html
      fetch('/footer.html')
        .then(response => response.text())
        .then(data => {
          const footerContainer = document.getElementById('footer-placeholder');
          footerContainer.innerHTML = data;
      
          // Find all script tags in the inserted HTML
          const scripts = footerContainer.querySelectorAll('script');
      
          scripts.forEach(oldScript => {
            const newScript = document.createElement('script');
      
            // Copy attributes
            [...oldScript.attributes].forEach(attr => {
              newScript.setAttribute(attr.name, attr.value);
            });
      
            // Copy content (if inline)
            if (oldScript.textContent) {
              newScript.textContent = oldScript.textContent;
            }
      
            // Replace the old script with the new one (so it executes)
            oldScript.parentNode.replaceChild(newScript, oldScript);
          });
        })
        .catch(error => {
          console.error('Error loading footer:', error);
        });
      </script>
  </body>
</html>