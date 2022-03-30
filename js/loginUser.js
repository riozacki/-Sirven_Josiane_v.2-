function loginForm() {

    let nom = document.forms["formLogin"]["nom"];
    let mail = document.forms["formLogin"]["mail"];
    let mdp = document.forms["formLogin"]["mdp"];


    if (nom.value !== nom.value) {
        alert("Le nom indiquait n'existe pas, peut-être une erreurs de saisie.");
        nom.focus();
        for (let displayA of displayAll) {
            displayA.style.display = "none";
        }
        formLogin.style.display = "block";
        return false;
    }
    /*
    if (mail.value !== mailc.value) {
        alert("JS: Vos e-mails ne correspondent pas !");
        mail.focus();
        for (let displayA of displayAll) {
            displayA.style.display = "none";
        }
        formFirst.style.display = "block";
        return false;
    }

    return true;
    */
}