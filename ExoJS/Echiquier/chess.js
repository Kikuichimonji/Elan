var mainGrille = document.getElementById("grille");
var grilleCases = document.getElementsByClassName("case");
var tailleGrille = 8;
var couleur = "grey";
var couleurPions ="white";
var tabPieces =["tour","cavalier","fou","king","queen","fou","cavalier","tour","pion"];

for(i=0;i<tailleGrille;i++)
{
    couleur = couleur == "grey" ? "brown" : "grey";
    for(j=0;j<tailleGrille;j++)
    {
        couleur = couleur == "grey" ? "brown" : "grey";
        if(i==1 || i==6)
            mainGrille.innerHTML += "<div class='case' id="+i+j+" style='background-color :"+couleur+"'><img src='"+couleurPions+" "+tabPieces[8]+".png'></div>";
        else if(i==0 || i==7)
            mainGrille.innerHTML += "<div class='case' id="+i+j+" style='background-color :"+couleur+"'><img src='"+couleurPions+" "+tabPieces[j]+".png'></div>";
        else
            mainGrille.innerHTML += "<div class='case' id="+i+j+" style='background-color :"+couleur+"'></div>";
    }
    couleurPions = i > 4 ? "black" : "white";

}

