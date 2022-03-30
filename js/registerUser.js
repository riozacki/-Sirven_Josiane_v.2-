function registerForm() {

    let nom = document.forms["form_first"]["nom"];
    let prenom = document.forms["form_first"]["prenom"];
    let mail = document.forms["form_first"]["mail"];
    let mailc = document.forms["form_first"]["mailc"];
    let tel = document.forms["form_first"]["tel"];
    let adresse = document.forms["form_first"]["adresse"];
    let cp = document.forms["form_first"]["cp"];
    let ville = document.forms["form_first"]["ville"];
    let mdp = document.forms["form_first"]["mdp"];
    let mdpc = document.forms["form_first"]["mdpc"];



    if (nom.value == '') {
        alert("Entrez votre nom.");
        nom.focus();
        for (let displayA of displayAll) {
            displayA.style.display = "none";
        }
        formFirst.style.display = "block";
        return false;
    }

    if (mdp.value !== mdpc.value) {
        alert("JS: Vos mot de passe ne correspondent pas !");
        mdp.focus();
        for (let displayA of displayAll) {
            displayA.style.display = "none";
        }
        formFirst.style.display = "block";
        return false;
    }

    if (mail.value !== mailc.value) {
        alert("JS: Vos e-mails ne correspondent pas !");
        mail.focus();
        for (let displayA of displayAll) {
            displayA.style.display = "none";
        }
        formFirst.style.display = "block";
        return false;
    }
    //location.reload();
    return true;

}