<?php include 'Header.html';?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<br>  
<form class="example" action="search.html" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search for Books" name="booksearch">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
<br>

<div class="slideshow-container">
<div class="mySlides fade">
  <img src="images/Main.png" style="width:100%">
  <div class="text">Image One</div>
</div>

<div class="mySlides fade">
  <img src="images/Main.png" style="width:100%">
  <div class="text">Image Two</div>
</div>

<div class="mySlides fade">
  <img src="images/Main.png" style="width:100%">
  <div class="text">Image Three</div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
  
  <div class="footer">
    <p>Praga #1</p>
  </div>
</html> 
