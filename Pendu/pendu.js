var albhabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
var coup = 8;
var mot = document.getElementById("reponse").innerText;
document.getElementById("reponse").innerHTML = "plus de triche";
var restant = mot.length;
var dessin = document.getElementById("dessin");
var clavier = document.getElementsByClassName("clavier");
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
        coup--;
    dessin.innerHTML = coup;
    if(coup <= 0)
    {
        dessin.innerHTML = "PERDU";
        stopClick();
    }
    else if(restant == 0)
    {
        dessin.innerHTML = "GAGNER";
        stopClick();
    }
}
function stopClick()
{
    [].forEach.call(clavier,function(perdu){
        perdu.removeEventListener("click",clickClavier)
    });
}