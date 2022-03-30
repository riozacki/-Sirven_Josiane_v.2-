const navLinks = document.getElementById('nav_links');
const arrayNavLinks = navLinks.children;

// Réorganisation et des liens de droite de la navbar
arrayNavLinks[2].textContent = "Promotion";
arrayNavLinks[0].textContent = "Mon panier";
arrayNavLinks[3].textContent = "Déconnexion";
arrayNavLinks[3].addEventListener('click', (e) => {
    window.location.href = 'index.php';
})

// Récupération du Json du nouvel inscris
function displayJsonUser() {
    let arrayDataUser = [];
    let arrayDataUser2 = [];
    fetch('newUser.json')
        .then(response => {
            // console.log(response);
            return response.json();
        })
        .then(jsondata => {
            //console.log(jsondata);
            dataUser = jsondata;
            //console.log(dataUser);
            //arrayDataUser = [];

            //console.log(arrayDataUser);
            /*let display = document.getElementById('display_data');
            let welcomeMsg = document.createElement('h2');
            welcomeMsg.textContent = `Bienvenue à vous  ${dataUser.user0.nom}`;
            display.appendChild(welcomeMsg);*/
            arrayDataUser.push(dataUser);

        });

    fetch('connectUser.json')
        .then(response => {
            // console.log(response);
            return response.json();
        })
        .then(jsondata2 => {
            //console.log(jsondata2);
            dataUser2 = jsondata2;
            //console.log(dataUser2);

            arrayDataUser2.push(dataUser2);
            //console.log(arrayDataUser2);
            /* let display = document.getElementById('display_data');
            let welcomeMsg = document.createElement('h2');
            welcomeMsg.textContent = `Bienvenue à vous  ${dataUser2.user0.nom}`;
            display.appendChild(welcomeMsg);
            return dataUser2;*/

        });

    if (arrayDataUser !== arrayDataUser2) {
        let display = document.getElementById('display_data');
        let welcomeMsg = document.createElement('h2');
        welcomeMsg.innerHTML = "Bienvenue à vous " + `${arrayDataUser2.user0}`;
        display.appendChild(welcomeMsg);
    } else {
        let display = document.getElementById('display_data');
        let welcomeMsg = document.createElement('h2');
        welcomeMsg.innerHTML = "Bienvenue à vous " + `${arrayDataUser.user0}`;
        display.appendChild(welcomeMsg);
    }


    console.log(arrayDataUser);
    console.log(arrayDataUser2);

    const obj = {
        ...arrayDataUser[0]
    }
    console.log(obj);


}

displayJsonUser();






// ajoutez un evenements d ecoute sur le form ----