const movie = document.getElementById("titles");
movie.addEventListener("change", function() {
 
document.getElementById("horror").style.display="none";
document.getElementById("mystery").style.display="none";

if(movie.value === "2"){
    document.getElementById("horror").style.display="block";
    
}else if(movie.value === "3"){   
    document.getElementById("mystery").style.display="block";
}
});

/*const horror = document.getElementById("horror").innerHTML;
const horrormovies = `<h3 style="color:red">Latest horror movies...</h3><br>`+ horror;//here only ` can be used*/
