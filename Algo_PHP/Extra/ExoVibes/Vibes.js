var acc = document.getElementsByClassName("accordion");
var accPannel = document.getElementsByClassName("accordionItem");
var accPlus = document.getElementsByClassName("plus");
var image = document.getElementsByClassName("image");
var burger = document.getElementById("burger");
var aBurger = document.getElementsByClassName("aBurger");
var deg = 360;
for (i = 0; i < acc.length; i++) {

  acc[i].addEventListener("click", function() {

    var accClassName = this.parentNode.className;
    for (j = 0; j < accPannel.length; j++) {
        accPannel[j].className = 'accordionItem close';
        accPlus[j].innerHTML = '+';
    }
    if (accClassName == 'accordionItem close') {
        this.parentNode.className = 'accordionItem open';
        this.getElementsByClassName("plus")[0].innerHTML = '-';
    }

  });
} 

for (i = 0; i < aBurger.length; i++) {
    aBurger[i].addEventListener("click",function() {
        document.getElementsByClassName("mainBurger")[0].classList.toggle("hiddenBurger");
    });
}
/*document.getElementsByClassName("mainBurger")[0].addEventListener("click",function() {
    document.getElementsByClassName("mainBurger")[0].classList.toggle("hiddenBurger");
});*/
burger.addEventListener("click",function() {
    document.getElementsByClassName("mainBurger")[0].classList.toggle("hiddenBurger");
});

for(i=0;i < image.length;i++)
{
    image[i].addEventListener("click",function()
    {
        if( this.className == "image clic")
            this.className = "image noclic";
        else if( this.className =="image noclic")
            this.className = "image clic";
        if( this.className == "image noclicrotate")
        {
            this.childNodes[0].style.transform ="rotate("+deg+"deg)";
            deg = deg + 360;
            this.childNodes[0].style.position ="relative";
        }
        if( this.className.includes("image Foff"))
            this.classList.toggle("foff");
        
    });
}


