<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo Interface</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
        .rotate-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }
    </style>
</head>

<body>
    <?php
        require_once '../../controllers/TicketController.php';
        require_once '../../controllers/AssociationController.php';

        require_once '../../Database.php';
        $database = Database::getInstance();
        $ticketId = $_GET['ticketId'];
        // $ticketId = 25370;
        $tickCont = new TicketController($database);
        $listTick = $tickCont->showTicket($ticketId);

        $assoCont = new AssociationController($database);

        if (!empty($listTick)) {
            $user_name = $listTick[0]['user_name'];
            $user_mail = $listTick[0]['user_mail'];
            $bingo_name = $listTick[0]['bingo_name'];
            $ticket_numero = $listTick[0]['ticket_numero'];
            $bingoId = $listTick[0]['bingo_id'];
            $bingo_ticket_number = $listTick[0]['bingo_ticket_number'];
            $assoName = $assoCont->getAssoName($bingoId);
        } else {
            $user_name = 'Nom d\'utilisateur inconnu';
            $bingo_ticket_number = 'Nombre de tickets inconnu';
        }
    ?>
    <div class="container mt-5" id="ticketIdDiv">
        <!-- Header -->
        <div class="row">
            <div class="col">
                <h3><?php echo $user_name; ?></h3>
            </div>
            <div class="col">
                <p>n°<?php echo $ticket_numero; ?> of <?php echo $bingo_ticket_number; ?> </p>
            </div>
        </div>

        <!-- Bingo Board -->
        <div class="row">
            <div class="col-1">
                <h2 class="rotate-text">
                    BINGO
                </h2>
            </div>
            <div class="col-1">
                <h2 class="rotate-text">
                    <?php echo $assoName; ?>
                </h2>
            </div>
            <div class="col">
                <table class="table table-bordered">
                    <tbody id="ticketGrille">
                        <?php
                        // Parcourir les grilles de tickets et les afficher dans le tableau
                        foreach ($listTick as $ticket) {

                            $grille = json_decode($ticket['ticket_grille'], true);

                            foreach ($grille as $ligne) {
                                echo '<tr>';

                                foreach ($ligne as $numero) {
                                    if($numero=='0')
                                        echo '<td></td>';
                                    else echo '<td>' . $numero . '</td>';
                                }
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <div class="row">
            <div class="col">
                <h4><?php echo $bingo_name; ?></h4>
            </div>
            <div class="col">
                <p><?php echo $user_mail; ?></p>
            </div>
        </div>

        
    </div>
    <div class="container mt-5" id="ticketIdDiv">
        <div class="row mt-3">
            <div class="col">
                <button id="downloadButton" class="btn btn-primary">Download Ticket</button>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#downloadButton').click(function() {
                var newWindow = window.open('', '_blank');
                var contenuImprimer = $('#ticketIdDiv').html();
                var stylesCSS = '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
                newWindow.document.write('<html><head><title>Impression</title>' + stylesCSS + '</head><body>' + contenuImprimer + '</body></html>');
                newWindow.print();
            });
        });
    </script>


</body>

</html>
