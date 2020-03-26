var grille= document.getElementById("Jeu");
var texteJoueur = document.getElementById("texteJoueur");
var resetButton = document.getElementById("reset");
var boolvalue = true;
var joueurActif = 1;
var coup = 0;
var nbCase = 9;
var victoire = false; 
var sideSize = nbCase/Math.sqrt(nbCase);
var symboleJ1 = "X";
var symboleJ2 = "O";

var grilleScore =new Array();  //tableau contenant les scores

  
    document.getElementById("Jeu").innerHTML="";
    //sideSize=size/Math.sqrt(size);
    grille.style.width = (sideSize) *100 +"px"; //Change la taille en fonction du nombre de cases (pour le flex)
    resetButton.onclick = reset;
    for(i=0;i<sideSize;i++){ //Creation de la grille
        grilleScore[i]=new Array(sideSize);
        for(j=0;j<sideSize;j++)
        {
            grille.innerHTML +=  "<div class='case' id="+i+j+"></div>";
            grilleScore[i][j] = 0;      //Init tableau score
        }
    }
    var caseGrille = document.getElementsByClassName("case");
    for(i=0;i < caseGrille.length;i++)  
        caseGrille[i].onclick=play; //Quand on clic sur une case on lance la fonction play()



function play() //Fonction quand on clique sur une case 
{
    if(!victoire)
    {
        if(this.innerHTML == "")
        {
        var col = this.id.slice(0,1);
        var row = this.id.slice(1,2);

            if(joueurActif ==1)
            {
                this.innerHTML = symboleJ1;
                grilleScore[col][row]=joueurActif;
            }
            else
            {
                this.innerHTML = symboleJ2;
                grilleScore[col][row]=joueurActif;  
            }  
            coup++;
            isWin(col,row);
            
        }
    }
    if (coup > 0)
        document.getElementById("Options").style.display = "none";
}

function isWin(col,row)
{
    var countH,countV,countD1,countD2 = 0; countH = countV = countD1 = countD2;

    for(i=0;i<sideSize;i++)     //check lignes
    {
        if(grilleScore[col][i] == joueurActif) //check lignes
            countH++;
        if(grilleScore[i][row] == joueurActif) //check colones
            countV++;
        if(grilleScore[i][i] == joueurActif)   //check diagonal 1
            countD1++;
        if(grilleScore[i][sideSize-(i+1)] == joueurActif)   //check diagonal 2
            countD2++;
        if(countH == sideSize || countV == sideSize || countD1 == sideSize ||countD2 == sideSize)
            victoire = true;
    }
    
    if(victoire)
        texteJoueur.innerHTML = "Bravo joueur " + joueurActif + " vous avez gagné !!";
    else if(!victoire && coup == nbCase)
        texteJoueur.innerHTML = "Vous êtes nuls";
    else{
            boolvalue = !boolvalue;
            joueurActif = boolvalue ? 1 :2;
            texteJoueur.innerHTML = "C'est au joueur " + joueurActif + " de jouer";
        }

}
function changeJ1(){
    symboleJ1 = document.getElementById("symbJ1").value;
    document.getElementById("symboleJ1").innerHTML = symboleJ1;
}
function changeJ2(){
    symboleJ2 = document.getElementById("symbJ2").value;
    document.getElementById("symboleJ2").innerHTML = symboleJ2;
}
function reset() // Permet d'effacer le contenu des cases
{
    var caseGrille = document.getElementsByClassName("case");
    for(i=0;i < caseGrille.length;i++) 
    caseGrille[i].innerHTML="";
    boolvalue = true;
    joueurActif = 1;
    coup = 0;
    victoire = false;
    texteJoueur.innerHTML = "C'est au joueur " + joueurActif + " de jouer";
    for(i=0;i<sideSize;i++){ //reset grille
        for(j=0;j<sideSize;j++)
            grilleScore[i][j] = 0;      //Init tableau score
    }
    document.getElementById("Options").style.display = "initial";
    document.getElementById("symbJ1").value ="";
    document.getElementById("symbJ2").value ="";

}