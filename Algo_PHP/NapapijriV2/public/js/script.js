var login = document.getElementById("passlogin");
var failogin = document.getElementById("failogin");
var failpass = document.getElementById("failpass");
var login1 = document.getElementById("password1");
var login2 = document.getElementById("password2");

function valider(){
    failogin.innerHTML="Cet identifiant n'est pas enristré dans la base de données (et toc) !";
    return false;
}

function validercreate(){

    if(login1.value != login2.value)
    {
        failpass.innerHTML = "Les mots de passes ne correspondent pas"
        return false;
    }
}
