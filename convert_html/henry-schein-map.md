---
title: Genealogy
description: Using read_gedcom to read gedcom files with R from FamilySearch or Ancestry.
author: jason
date: 2019-09-26 11:33:00 +0800
categories: [Genealogy, R]
tags: [gedcom, R, family_history]
pin: true
math: true
---

<div class="container-fluid main-container">

<h1 class="title toc-ignore">Henry Schein Map</h1>

</div>


<div id="henry-schein-leaflet-map" class="section level2">
<h2>Henry Schein Leaflet Map</h2>
<p>In order to see the map that we built for Henry Schein, click here:</p>
<p><a href="https://jjfitz.shinyapps.io/hs_leaflet/" class="uri">https://jjfitz.shinyapps.io/hs_leaflet/</a></p>
<p>I had the great opportunity to do an internshipwith Henry Schein the previous summer and was able to build a connection with the lead Data Scientist there. They donated some of the data for this project to our society, where I was then appointed as team lead.</p>
<p>The data has been changed from the original for privacy, but this is what we where able to provide for Henry Schein. They told us that they wanted to be able to see their customers on a map, and have statistical summaries for those customers. We where given free reign to put anything that seemed useful to provide about the customers. I will go through the process of what we learned and what we had to do in order to get this map working.</p>
</div>
<div id="geocoding" class="section level2">
<h2>Geocoding</h2>
<p>The biggest part of this project was converting the customers addresses into lat/lng’s so that we could plot those onto the map. We at first didn’t know how big the dataset was going to be, so we where trying to find different methods of geocoding without using the Google Maps API. We learned a lot of what Bing, OpenStreet Maps, and OpenSci had to offer as far as geocoding goes. When we got the data set, We tried the other methods we had researched, but they weren’t able to get all of the addresses correct. We saw that it was small enough that it wouldn’t go over the Google Maps Geocoding API, so we decided to use that instead.</p>
<p>It is pretty straight forward to geocode after that. We first pasted the different parts of the address together:</p>
<example of geocoding>
<p>And then we fed it into the API:</p>
<example>
<p>We could now finally plot the customers on the map! We then had to learn a little bit more about shiny. We found a package that gave a little bit of style to shiny apps called shinydashboard. We started to learn how to make our plots reactive, and changing our graphs to where the map boundaries where. We built more tabs so that Henry Schein would be able to look at their customers that where within the app.</p>
<p>This was a really fun project to be a part of. I learned more about geocoding and learned a lot of what it takes to make a shiny app.</p>
</div>




</div>

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
