$(document).ready(function(){
    var tempsRestant;
    var timer;

    // Initialiser le compteur à 30 minutes
    function initialiserCompteur() {
        tempsRestant = 0.5 * 60; // 30 minutes en secondes
        afficherTemps();
        demarrerCompteur();
    }

    // Afficher le temps restant
    function afficherTemps() {
        var minutes = Math.floor(tempsRestant / 60);
        var secondes = tempsRestant % 60;
        var tempsAffiche = pad(minutes) + ":" + pad(secondes);
        $("#count-time").text(tempsAffiche);
        // Changer la couleur en rouge si le temps restant est inférieur à 10 secondes
        if (tempsRestant <= 10) {
            $("#count-time").css("color", "red");
        }
    }

    // Démarrer le compteur
    function demarrerCompteur() {
        timer = setInterval(function(){
            tempsRestant--;
            if (tempsRestant >= 0) {
                afficherTemps();
            } else {
                clearInterval(timer);
                // Appeler la fonction generateRandomNumber lorsque le temps est écoulé
                generateRandomNumber();
                setInterval(updateNumber, 60);
            }
        }, 1000); // Mettre à jour toutes les secondes
    }

    // Fonction pour ajouter un zéro devant les chiffres < 10
    function pad(number) {
        return (number < 10 ? '0' : '') + number;
    }

    // Fonction pour générer un nombre aléatoire et le mettre à jour
    function generateRandomNumber() {
        var randomNumber = Math.floor(Math.random() * 90) + 1;
        return randomNumber < 10 ? '0' + randomNumber : randomNumber;
    }
    function updateNumber() {
        $('#random-number').text(generateRandomNumber());
    }

    // Démarrer automatiquement le compteur au chargement de la page
    initialiserCompteur();
});
