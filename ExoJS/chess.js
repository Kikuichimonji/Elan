var mainGrille = document.getElementById("grille");
var grilleCases = document.getElementsByClassName("case");
var tailleGrille = 8;
var couleur = "white";


for(i=0;i<tailleGrille;i++)
{
    couleur = couleur == "white" ? "black" : "white";
    for(j=0;j<tailleGrille;j++)
    {
        couleur = couleur == "white" ? "black" : "white";
        mainGrille.innerHTML += "<div class='case' id="+i+j+" style='background-color :"+couleur+"'><img src='black queen.png'</div>";

    }
}

function setViewport(img, x, y, width, height) {
    img.style.left = "-" + x + "px";
    img.style.top  = "-" + y + "px";

    if (width !== undefined) {
        img.parentNode.style.width  = width  + "px";
        img.parentNode.style.height = height + "px";
    }
}

