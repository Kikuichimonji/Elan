var albhabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
var coup = 7;
var mot = document.getElementById("reponse").innerText;
//document.getElementById("reponse").innerHTML = "plus de triche";
var restant = mot.length;
var dessin = document.getElementById("pendu");
var clavier = document.getElementsByClassName("clavier");
var result = document.getElementById("resultat");
var rejoue = document.getElementById("replay");
var liste = JSON.parse(listemot);
albhabet.forEach(element => {
    document.getElementById("texte").innerHTML += "<span class='clavier'>"+element+"</span>";
});


for(i=0;i<clavier.length;i++){
    clavier[i].addEventListener("click",clickClavier);
}
function clickClavier()
{
    var bool = false;
    for(j=0;j<mot.length;j++)
    {
        if(mot[j] == this.innerHTML)
        {
            document.getElementById(j).innerHTML= this.innerHTML;
            bool = true;
            restant--;
        }
        if(bool)
            this.className = "clavier true";
        else 
            this.className = "clavier false";
        this.removeEventListener("click",clickClavier);
    }
    if(!bool)
    {
        coup--;
        dessin.setAttribute("src","pendu"+(7-coup)+".jpg");
    }
    if(coup <= 0)
    {
        dessin.innerHTML = "PERDU";
        stopClick();
        iAmError();
    }
    else if(!restant)
    {
        dessin.innerHTML = "GAGNER";
        stopClick();
        aWinnerIsYou();
    }
}
function stopClick()
{
    [].forEach.call(clavier,function(perdu){
        perdu.removeEventListener("click",clickClavier)
    });
}
function aWinnerIsYou()
{
    new Audio('julien.mp3').play()
    result.innerHTML = "BRAVO"
    result.classList.toggle("gagnant");
    rejoue.style.visibility = "initial";
}
function iAmError()
{
    result.innerHTML = "PERDU"
    result.classList.toggle("perdant");
    new Audio('perdu.mp3').play()
    rejoue.style.visibility = "initial";
}
function replay()
{
    rejoue.classList.toggle("clic");
    setTimeout(function(){
        document.location.reload(true);
    },1000);
    
}