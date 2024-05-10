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
    require_once '../../Database.php';
    $database = Database::getInstance();
    $ticketId = $_GET['ticketId'];
    // $ticketId = 25370;
    $tickCont = new TicketController($database);
    $listTick = $tickCont->showTicket($ticketId);

    if (!empty($listTick)) {
        $user_name = $listTick[0]['user_name'];
        $user_mail = $listTick[0]['user_mail'];
        $bingo_name = $listTick[0]['bingo_name'];
        $bingo_ticket_number = $listTick[0]['bingo_ticket_number'];
    } else {
        $user_name = 'Nom d\'utilisateur inconnu';
        $bingo_ticket_number = 'Nombre de tickets inconnu';
    }
    ?>
    <div class="container mt-5">
        <!-- Header -->
        <div class="row">
            <div class="col">
                <h3><?php echo $user_name; ?></h3>
            </div>
            <div class="col">
                <p>n°<?php echo $bingo_ticket_number; ?> of bingo_ticket_number</p>
            </div>
        </div>

        <!-- Bingo Board -->
        <div class="row">
            <div class="col-1">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="rotate-text">O</td>
                        </tr>
                        <tr>
                            <td class="rotate-text">G</td>
                        </tr>
                        <tr>
                            <td class="rotate-text">N</td>
                        </tr>
                        <tr>
                            <td class="rotate-text">I</td>
                        </tr>
                        <tr>
                            <td class="rotate-text">B</td>
                        </tr>
                    </tbody>
                </table>
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
                                    echo '<td>' . $numero . '</td>';
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

        <div class="row mt-3">
            <div class="col">
                <button id="downloadButton" class="btn btn-primary">Télécharger le contenu en PDF</button>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script>
        document.getElementById('downloadButton').addEventListener('click', function() {
            var doc = new jsPDF();
            doc.fromHTML(document.documentElement.outerHTML, 15, 15);
            doc.save('bingo_interface.pdf');
        });
    </script>
</body>

</html>
