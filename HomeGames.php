<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="CSS/styleSheet.css"/>
<body>

<h2 class="w3-center">Games</h2>

<div class="w3-content w3-display-container imagewrapper">
    <a href ="Nba-Game.php"><img class="mySlides" src="Images/nba.jpg" style="width:100%"></a>
    <a href ="Fifa-Game.php"><img class="mySlides" src="Images/fifa.jpg" style="width:100%"></a>
    <a href ="Pool-Game.php"><img class="mySlides" src="Images/pool.jpg" style="width:100%"></a>
    

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    
    <div style="text-align:center">
        <span class="dot" style="position:absolute;right:50%;top:90%" onclick="currentSlide(1)"></span> 
        <span class="dot" style="position:absolute;right:47%;top:90%" onclick="currentSlide(2)"></span> 
        <span class="dot" style="position:absolute;right:44%;top:90%"onclick="currentSlide(3)"></span> 
        
    </div>
</div>
<centre>
<a href="Add-Nba.php"><input type="button" class="button button1" value="Add Nba Game " style ="position: relative; left: 32% "  /></a>
<a href="Add-Fifa.php"><input type="button" class="button button1" value="Add Fifa Game" style ="position: relative; left: 32% " /></a>
<a href="Add-Pool.php"><input type="button" class="button button1" value="Add Pool Game" style ="position: relative; left: 32% " /></a><br>
<a href="Standings.php"><input type="button" class="button button1" value="View Standings" style ="position: relative; left: 44.3%" /></a>
</centre>
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

