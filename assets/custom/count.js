$(document).ready(function(){
    var tempsRestant;
    var timer;
    var randomNumberTimer;
    var numerosTires = [];

    function initialiserCompteur() {
        tempsRestant = 0.15 * 60;
        afficherTemps();
        demarrerCompteur();
    }

    function afficherTemps() {
        var minutes = Math.floor(tempsRestant / 60);
        var secondes = tempsRestant % 60;
        var tempsAffiche = pad(minutes) + ":" + pad(secondes);
        $("#count-time").text(tempsAffiche);
        if (tempsRestant <= 10) {
            $("#count-time").css("color", "red");
        }
    }

    function demarrerCompteur() {
        timer = setInterval(function(){
            tempsRestant--;
            if (tempsRestant >= 0) {
                afficherTemps();
            } else {
                clearInterval(timer);
                randomNumberTimer = setInterval(updateNumber, 60);
                setInterval(function() {
                    clearInterval(randomNumberTimer);
                    var numeroTire = generateRandomNumber();
                    numerosTires.push(numeroTire); 
                    afficherTableau(numerosTires);
                    setTimeout(function() {
                        randomNumberTimer = setInterval(updateNumber, 60);
                    }, 1000);
                }, 3000);
            }
        }, 1000);
    }

    function pad(number) {
        return (number < 10 ? '0' : '') + number;
    }

    function generateRandomNumber() {
        var randomNumber;
        var formattedNumber;
        if (numerosTires.length === 90) {
            $("#end-game").removeClass("d-none");
        } else {
            do {
                randomNumber = Math.floor(Math.random() * 90) + 1;
                formattedNumber = randomNumber;
            } while (numerosTires.includes(formattedNumber)); 
        
            $('#random-number').text(formattedNumber);
            updateBallsLeft();
            return formattedNumber; 
        }
    } 

    function updateNumber() {
        var randomNumber = Math.floor(Math.random() * 90) + 1;
        var formattedNumber = randomNumber;
        $('#random-number').text(formattedNumber);
        // var audio = document.getElementById("drump-sound");
        // audio.play();
    }

    function updateBallsLeft() {
        var ballesRestantes = 89 - numerosTires.length;
        $("#ball-rest").text(ballesRestantes + " BALLS LEFT");
    }   

    function afficherTableau(tableau) {
        $("#nbr-tire").empty();
        for (var i = 0; i < tableau.length; i++) {
            var numero = tableau[i];
            var divElement = $("<div>").addClass("rounded-circle mt-2 mr-1").css({
                "width": "40px",
                "height": "40px",
                "font-size": "22px"
            });
    
            var couleurFond = "";
            
            if (numero >= 1 && numero <= 18) {
                couleurFond = "#E97E08";
            } else if (numero >= 19 && numero <= 36) {
                couleurFond = "#FECA02";
            } else if (numero >= 37 && numero <= 54) {
                couleurFond = "#73BD27";
            } else if (numero >= 55 && numero <= 72) {
                couleurFond = "#00A3D1";
            } else {
                couleurFond = "#B396FF"; 
            }
    
            divElement.css("background-color", couleurFond); 
            var pElement = $("<p>").text(numero); 
            divElement.append(pElement); 
            $("#nbr-tire").append(divElement);
            $("#num_"+numero).css("color", "white");
        }
    }

    $("#startGames").click(function(){
        initialiserCompteur();
    });

});
