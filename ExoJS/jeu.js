var grille= document.getElementById("Jeu");
var texteJoueur = document.getElementById("texteJoueur");
var resetButton = document.getElementById("reset");
var boolvalue = true;
var joueurActif = 1;
var coup = 0;
var nbCase = 9;
var victoire = false; 
var sideSize = nbCase/Math.sqrt(nbCase);
var grilleScore =new Array();  //tableau contenant les scores


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
                this.innerHTML = "X";
                grilleScore[col][row]=joueurActif;
            }
            else
            {
                this.innerHTML = "O";
                grilleScore[col][row]=joueurActif;  
            }  
            coup++;
            isWin(col,row);
            
        }
    }
}

function isWin(col,row)
{
    var count = 0;
    for(i=0;i<sideSize;i++)     //check lignes
    {
        if(grilleScore[col][i] == joueurActif)
            count++;
        if(count == sideSize)
            victoire = true;
    }
    
    if(!victoire)
    {
        count = 0;
        for(i=0;i<sideSize;i++)  // check colonnes
        {
            if(grilleScore[i][row] == joueurActif)
                count++;
            if(count == sideSize)
                victoire = true;
        }
    }
    
    if(!victoire)
    {
        count = 0;
        for(i=0;i<sideSize;i++) // check diagonales 1
        {
            if(grilleScore[i][i] == joueurActif)  
                count++;
            if(count == sideSize)
                victoire = true;
        }
    }

    if(!victoire)
    {
        count = 0;
        for(i=0;i<sideSize;i++) // check diagonales 2
        {
            if(grilleScore[i][sideSize-(i+1)] == joueurActif)  
                count++;
            if(count == sideSize)
                victoire = true;     
        }
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
        {
            grilleScore[i][j] = 0;      //Init tableau score
        }
    }
}