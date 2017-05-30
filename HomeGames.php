<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="CSS/styleSheet.css"/>
<body>

<h2 class="w3-center">Games</h2>

<div class="w3-content w3-display-container">
    <img class="mySlides" src="Images/nba.jpg" style="width:100%">
    <img class="mySlides" src="Images/fifa.jpg" style="width:100%">
    <img class="mySlides" src="Images/pool.jpg" style="width:100%">

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>

    <div style="text-align:center">
        <span class="dot" style="position:absolute;right:50%;top:90%" onclick="currentSlide(1)"></span> 
        <span class="dot" style="position:absolute;right:47%;top:90%" onclick="currentSlide(2)"></span> 
        <span class="dot" style="position:absolute;right:44%;top:90%"onclick="currentSlide(3)"></span> 
    </div>
</div>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
        }
        x[slideIndex-1].style.display = "block";  
}
</script>

