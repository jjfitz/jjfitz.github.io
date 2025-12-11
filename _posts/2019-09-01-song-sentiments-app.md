---
title: Song Sentiments App
description: A shiny app for sentiment analysis of song lyrics, using R and various sentiment libraries to visualize positive and negative words.
author: jason
date: 2019-09-01 00:34:00 +0800
categories: [Music, Sentiment Analysis]
tags: [song lyrics, sentiment analysis, shiny, R]
pin: false
math: false
---



<div class="container-fluid main-container">

<h1 class="title toc-ignore">Lyric Sentiments</h1>

</div>


<div id="introduction" class="section level2">
<h2>Introduction</h2>
<p>This might sound strange, but I think it is fascinating to look at the words we say and why we choose them. I think that the words we say/hear have an effect on us. I started to become curious at the different songs I was listening to, and I started to think of doing some basic sentiment analysis on them. As I started to look more into it, I decided that I would build a shiny app so that people could see a quick sentiment analysis of what they listen to. In the future I am hoping to build it out so that you can do it on albums, artists, and export the lyrics, but for now it is just the songs.</p>
<p>Here is a link to access the shiny app to look at your favorite songs:</p>
<p><a href="https://jjfitz.shinyapps.io/lyrics/" class="uri">https://jjfitz.shinyapps.io/lyrics/</a></p>
</div>
<div id="getting-the-lyrics" class="section level2">
<h2>Getting the Lyrics</h2>
<p>After I built the app, I have been finding that there are R packages out there that already pull song lyrics, like geniusR. I might use those in the future for albums and artists. I pull the lyrics by scrapping the azlyrics.com website. Their Urls are structered by putting in the artist and the song name, and poof, you can get the lyrics.</p>
</div>
<div id="doing-the-analysis" class="section level2">
<h2>Doing the Analysis</h2>
<p>To do the analysis, I use a little bit of all the different sentiment libraries. I use the bing sentiments to get whether or not a word is negative or positive, afinn to get how negative or positive a word is, and nrc to look at the basic adjective that a word could belong too. The words in the nrc dataset does have words that have multiple adjectives associated with them, so keep that in mind. I pretty much count up all the words, and then make graphs out of them.</p>
</div>




<!-- </div> -->

<script>

// add bootstrap table styles to pandoc tables
function bootstrapStylePandocTables() {
  $('tr.header').parent('thead').parent('table').addClass('table table-condensed');
}
$(document).ready(function () {
  bootstrapStylePandocTables();
});


</script>

<!-- dynamically load mathjax for compatibility with self-contained -->
<script>
  (function () {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src  = "https://mathjax.rstudio.com/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML";
    document.getElementsByTagName("head")[0].appendChild(script);
  })();
</script>

