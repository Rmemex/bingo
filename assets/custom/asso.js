$(document).ready(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
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
                console.log("response")
                console.log(response)
                response = JSON.parse(response)
                if(response.etat){
                    $('#tickeLiqr').html(response.html)
                    Toast.fire({
                        icon: 'success',
                        title: 'Ticket generé '
                    })
                }else{
                        const tickRes = parseInt(response.nbTikRes)

                }else{
                        const tickRes = parseInt(response.nbTikRes)
             
                        Toast.fire({
                            icon: 'success',
                            title: 'Ticket Restant '+response.tickNbDispo
                        })
                }
                $('input').val("")
                
                
            },
            complete: function () {
            },
            error: function (xhr, status, error) {
                console.log('Erreur de requ te AJAX : ' + status + '\nMessage d\'erreur : ' + error);
            }
        });
    });


    // on click sur ongle ticket status
    -

    $('#lot-number').on('change', function(){
        var numberOfLots = parseInt($(this).val()); // Récupérer le nombre de lots à ajouter
        var formLots = $('#bingoLots'); // Sélectionner le formulaire où les lots seront ajoutés
        formLots.html('')
        // Boucler pour ajouter le nombre de lots spécifié
        for(var i = 0; i < numberOfLots; i++){
            // Créer le HTML du lot
            var lotHtml = '<div class="formLot ml-3">';
            lotHtml += '<h5>Lot n° ' + (i + 1) + '</h5>';
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
            },
            success: function (response) {
                console.log(response);
                $('#bingoLots').html("")
                $('#bingoListAsso').html(response)
                Toast.fire({
                    icon: 'success',
                    title: 'Bingo ajouté '
                })
            },
            complete: function () {
            },
            error: function (xhr, status, error) {
                console.log('Erreur de requête AJAX : ' + status + '\nMessage d\'erreur : ' + error);
            }
        });
    });

    $('#act-logout').click(function () {
        // alert("ici")
        alert("ici")
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
                    window.location.href = "index.php";

                }, 3000);
            },
        });
    });
});
