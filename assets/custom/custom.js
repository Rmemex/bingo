$(document).ready(function() {
    var bingoId2Play = null
    var bingoName2Play = null
    var bingoTicketPrice2Play = null

    nameUser2P = null
    mailUser2P = null
    commentUser2P = null
    nbrTicket2P = null

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $("#assoc-page").addClass("d-none");
    $("#play2").addClass("d-none");
    $("#play3").addClass("d-none");
    $("#pop-signup").addClass("d-none");
    $('#num_32').css("color", "white");

    $("#play-page").click(function() {
        $("#assoc-page").addClass("d-none");
        $("#page-play").removeClass("d-none");
    });

    $("#asso-page").click(function() {
        $("#page-play").addClass("d-none");
        $("#assoc-page").removeClass("d-none");
    });

   

    $("#valide_payement").click(function() {
        $("#play1").addClass("d-none");
        $("#play2").addClass("d-none");
        $("#play3").removeClass("d-none");
    });
    
    $("#go-login").click(function() {
        $("#pop-signup").addClass("d-none");
        $("#pop-login").removeClass("d-none");
    });

    $("#creatAssoc").click(function() {
    });

    // $("#act-login").click(function() {
    //     $("#page-play").addClass("d-none");
    //     $("#assoc-page").removeClass("d-none");
    // });
    
    $("#signup").click(function() {
        $("#pop-login").addClass("d-none");
        $("#pop-signup").removeClass("d-none");
    });
    $("#creatAssoc").click(function(e) {
        var formData = new FormData($('#InscFormAsso')[0]);
        formData.append('action', 'newAsso');
       
        $.ajax({
            url: 'controllers/AjaxController.php',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                // Actions à effectuer avant l'envoi de la requête
            },
            success: function (response) {
                // Actions à effectuer en cas de succès
                console.log(response);
            },
            complete: function () {
                // Actions à effectuer après l'achèvement de la requête (succès ou échec)
            },
            error: function (xhr, status, error) {
                // Actions à effectuer en cas d'erreur
                console.log('Erreur de requête AJAX : ' + status + '\nMessage d\'erreur : ' + error);
            }
        });
        
    });
    $('#act-login').click(function () {
        var mailUser = $('#inputEmail').val()
        var password = $('#inputPassword').val()

        $.ajax({
            url: 'controllers/AjaxController.php',
            method: 'POST',
            data: {
                action: 'login',
                mailUser : mailUser,
                inputPass : password
            },
            beforeSend: function () {
            },
            success: function (response) {
                console.log("response")
                console.log(response)

                if(response){
                    Toast.fire({
                        icon: '',
                        title: 'Loading...'
                    })
                    setTimeout(function() 
                        $("#vert-tabs-home").html(response)
                        $("#page-play").addClass("d-none");
                        $("#assoc-page").removeClass("d-none");
                        $("#modal-login").modal('hide');
                        // $("#vert-tabs-tabContent").html(response)
                        // $("#page-play").addClass("d-none");
                        // $("#assoc-page").removeClass("d-none");
                        // $("#modal-login").modal('hide');
                        window.location.href = "association.php";
                    }, 3000);
                }else{
                    console.log("response")

                }
            },
            complete: function () {
            },
            error: function (xhr, status, error) {
                console.log('Erreur de requ te AJAX : ' + status + '\nMessage d\'erreur : ' + error);
            }
        });
    });

    
    ///////////////////////////////////////cote User/////////////////////////////////////////////////////////////
    $(".playBingo").click(function() {
        $("#assoc-page").addClass("d-none");
        $("#play3").addClass("d-none");

        bingoId2Play = $(this).closest("tr").find(".idBingo").attr("idBingo");
        bingoName2Play = $(this).closest("tr").find(".idBingo").attr("bingoName");
        bingoTicketPrice2Play = $(this).closest("tr").find(".idBingo").attr("ticketPrice");
        bingoticketNumber = $(this).closest("tr").find(".idBingo").attr("bingoticketNumber");
        console.log("ID du bingo sélectionné : " + bingoName2Play);
        $("#bingoNameMod").text(bingoName2Play);
       

    });

    $("#valide_payement").click(function() {
        nameUser2P = $('#nameUser').val()
        mailUser2P = $('#mailUser').val()
        commentUser2P = $('#commentUser').val()
        nbrTicket2P = $('#nbrTicket').val()

        $.ajax({
            url: 'controllers/AjaxController.php',
            method: 'POST',
            data: {
                action: 'generate_ticket',
                bingoTicket : bingoId2Play,
                ticketName : nameUser2P,
                ticketFirstName : '',
                ticketMail : mailUser2P,
                ticketNumber : nbrTicket2P,
                ticketPrice : bingoTicketPrice2Play,
                bingoticketNumber : bingoticketNumber,
                
            },
            beforeSend: function () {
            },
            success: function (response) {

                console.log("infoContent");
                console.log(response);
                Toast.fire({
                    icon: 'success',
                    title: 'Reussie check your mail'
                })
                // location.reload();
            },
            complete: function () {
            },
            error: function (xhr, status, error) {
                console.log('Erreur de requ te AJAX : ' + status + '\nMessage d\'erreur : ' + error);
            }
        });
    });

});