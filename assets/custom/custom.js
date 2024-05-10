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
    $("#play-home2").addClass("d-none");
    $("#play-home3").addClass("d-none");
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

    $("#valide_play_home").click(function() {
        $("#play-home1").addClass("d-none");
        $("#play-home2").removeClass("d-none");
    });

    $("#valide_payement_home").click(function() {
        $("#play-home1").addClass("d-none");
        $("#play-home2").addClass("d-none");
        $("#play-home3").removeClass("d-none");
    });
    // on click sur ongle info
    $("#vert-tabs-home").click(function() {

    });
    // on click sur ongle payemen
    $("#vert-tabs-payement-tab").click(function() {
        $.ajax({
            url: 'controllers/AjaxController.php',
            method: 'GET',
            data: {
                action: 'getMPayement',
                tikNumber: $('#tikNumber').val(),
                
            },
            beforeSend: function () {

            },
            success: function (response) {
                console.log("response")
                console.log(response)
                
                $('#payMethod').html(response)
                
            },
            complete: function () {
            },
            error: function (xhr, status, error) {
                console.log('Erreur de requ te AJAX : ' + status + '\nMessage d\'erreur : ' + error);
            }
        });
    });

    // on click sur ongle bingo
    $("#vert-tabs-messages").click(function() {
        
    });
    
    // generation
    $("#generate_ticket").click(function() {
        alert( $('#tikNumber').val())
        var bingoTicket = $('#bingoTicket').val()
        var ticketName = $('#ticket-name').val()
        var ticketFirstName = $('#ticket-firstName').val()
        var ticketMail = $('#ticket-mail').val()
        var ticketNumber = $('#tikNumber').val()
        $.ajax({
            url: 'controllers/AjaxController.php',
            method: 'POST',
            data: {
                action: 'generate_ticket',
                bingoTicket : bingoTicket,
                ticketName : ticketName,
                ticketFirstName : ticketFirstName,
                ticketMail : ticketMail,
                ticketNumber : ticketNumber,
                
            },
            beforeSend: function () {
            },
            success: function (response) {

                console.log("infoContent");
                console.log(response);

            },
            complete: function () {
            },
            error: function (xhr, status, error) {
                console.log('Erreur de requ te AJAX : ' + status + '\nMessage d\'erreur : ' + error);
            }
        });
    });


    // on click sur ongle ticket status
    $("#vert-tabs-ticket-tab").click(function() {
        $.ajax({
            url: 'controllers/AjaxController.php',
            method: 'GET',
            data: {
                action: 'getListBingo',
                tikNumber: $('#tikNumber').val(),
                
                
            },
            beforeSend: function () {

            },
            success: function (response) {
                console.log("response")
                console.log(response)
                response = JSON.parse(response)

                var tikHtml = response.tikL;
                var bingoSelL = response.html;
                var tickeLiqr = $('#tickeLiqr');
                tickeLiqr.html(tikHtml)
                tickeLiqr.html(tikHtml)
                selectBingo = $('#bingoTicket');
                selectBingo.html(bingoSelL)
                console.log("bingoSelL")
                console.log(bingoSelL)
            },
            complete: function () {
            },
            error: function (xhr, status, error) {
                console.log('Erreur de requ te AJAX : ' + status + '\nMessage d\'erreur : ' + error);
            }
        });

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
    $('#lot-number').on('change', function(){
        var numberOfLots = parseInt($(this).val()); // Récupérer le nombre de lots à ajouter
        var formLots = $('#bingoLots'); // Sélectionner le formulaire où les lots seront ajoutés
        formLots.html('')
        // Boucler pour ajouter le nombre de lots spécifié
        for(var i = 0; i < numberOfLots; i++){
            // Créer le HTML du lot
            var lotHtml = '<div class="formLot">';
            lotHtml += '<h4>Lots Numéro ' + (i + 1) + '</h4>';
            lotHtml += '<div class="form-group row">';
            lotHtml += '<label for="lot-title" class="col-sm-3 col-form-label">Lot title</label>';
            lotHtml += '<div class="col-sm-5">';
            lotHtml += '<input type="text" class="form-control" id="lot-title" name="lotTitle[]">';
            lotHtml += '</div>';
            lotHtml += '</div>';
            lotHtml += '<div class="form-group row">';
            lotHtml += '<label for="lot-price" class="col-sm-3 col-form-label">Lot price</label>';
            lotHtml += '<div class="col-sm-5">';
            lotHtml += '<input type="text" class="form-control" id="lot-price" name="lotPrice[]">';
            lotHtml += '</div>';
            lotHtml += '</div>';
            lotHtml += '<div class="form-group row">';
            lotHtml += '<label for="lot-picture" class="col-sm-3 col-form-label">Lot Picture</label>';
            lotHtml += '<div class="col-sm-5">';
            lotHtml += '<input type="file" id="lot-picture" name="lotPicture[]">';
            lotHtml += '</div>';
            lotHtml += '</div>';
            lotHtml += '<div class="form-group row">';
            lotHtml += '<label for="lot-description-link" class="col-sm-3 col-form-label">Description link</label>';
            lotHtml += '<div class="col-sm-5">';
            lotHtml += '<input class="form-control" rows="3" id="lot-description-link" name="lotDescriptionLink[]">';
            lotHtml += '</div>';
            lotHtml += '</div>';
            lotHtml += '<div class="form-group row">';
            lotHtml += '<label for="lot-description" class="col-sm-3 col-form-label">Description</label>';
            lotHtml += '<div class="col-sm-5">';
            lotHtml += '<textarea class="form-control" rows="3" id="lot-description" name="lotDescription"></textarea>';
            lotHtml += '</div>';
            lotHtml += '</div>';
            lotHtml += '</div>';
            
            // Ajouter le lot à la forme
            formLots.append(lotHtml);
        }
    });
    $("#add_payement").click(function() {
        
        
        $.ajax({
            url: 'controllers/AjaxController.php',
            method: 'POST',
            data: {
                action: 'addPayement',
                methodPayement : $('#methodPayement').val(),
                stripeId : $('#stripeId').val(),
                
            },
            beforeSend: function () {
            },
            success: function (response) {
                console.log("response")
                console.log(response)
                $('#payMethod').html(response)

            },
            complete: function () {
            },
            error: function (xhr, status, error) {
                console.log('Erreur de requ te AJAX : ' + status + '\nMessage d\'erreur : ' + error);
            }
        });
    });
    $("#add_bingo_btn").click(function() {
        var bingoName = $('#bingo-name').val()
        var bingoPrice = $('#bingo-price').val()
        var bingoNumber = $('#ticket-number').val()
        var bingoStart = $('#bingo-start').val()
        var bingoEnd = $('#bingo-end').val()
        var lotNumber= $('#lot-number').val()
        var bingoDotation= $('#bingo-dotation').val()
        var formData = new FormData($('#bingoLots')[0]);
        alert($('#bingo-price').val())
        alert($('#bingo-dotation').val())
        formData.append('action', 'newBingo');
        formData.append('bingoName', bingoName);
        formData.append('bingoPrice', bingoPrice);
        formData.append('bingoNumber', bingoNumber);
        formData.append('bingoStart', bingoStart);
        formData.append('bingoEnd', bingoEnd);
        formData.append('lotNumber', lotNumber);
        formData.append('bingoDotation', bingoDotation);
        

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
                    setTimeout(function() {
                        $("#vert-tabs-tabContent").html(response)
                        $("#page-play").addClass("d-none");
                        $("#assoc-page").removeClass("d-none");
                        $("#modal-login").modal('hide');
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

    $('#act-logout').click(function () {
        $.ajax({
            url: 'controllers/AjaxController.php',
            method: 'POST',
            data: {
                action: 'logout',
            },
            success: function(response) {
                Toast.fire({
                    icon: 'success',
                    title: 'Logout'
                })
                setTimeout(function() {
                    location.reload();
                }, 3000);
            },
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
                ticketPrice : bingoticketNumber,
                
            },
            beforeSend: function () {
            },
            success: function (response) {

                console.log("infoContent");
                console.log(response);
                alert('Reussie check your mail')
            },
            complete: function () {
            },
            error: function (xhr, status, error) {
                console.log('Erreur de requ te AJAX : ' + status + '\nMessage d\'erreur : ' + error);
            }
        });
    });

});
