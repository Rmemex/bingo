<h3>Liste des tickets</h3>
<div class="ml-5 mr-5">
    <div class="p-4 mt-4 table-responsive" style="">
        <table class="table">
            <thead>
                <tr>
                    <th>N° Ticket</th>
                    <th>Nom</th>
                    <th>Mail</th>
                    <th>Date d'achat</th>
                </tr>
            </thead>
            <tbody id="tickeLiqr">
                <?php
                $database = Database::getInstance();
                                        
                require_once 'controllers/TicketController.php';
                require_once 'models/BingoModel.php';

                $ticketCon = new TicketController($database);
                $bingoMad = new BingoModel($database);
                $bingoLasIns = $bingoMad->getLastInsertedBingo($_SESSION['association_info']['asso_id']);
                // var_dump($bingoLasIns) ;
                $tickets = $ticketCon->tickekListSales($bingoLasIns['bingo_id']);
                //   var_dump($tickets);
                foreach ($tickets as $ticket) {
                    echo "<tr>";
                    echo "<td class='transId' transId=" . $ticket['ticket_id'] . ">" . $ticket['ticket_numero'] . "</td>";
                    echo "<td> " . $ticket['user_name'] . "</td>";
                    echo "<td>" . $ticket['user_mail'] . "</td>";
                    echo "<td>" . $ticket['ticket_dateAchat'] . "</td>";
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
</div>