<h3>Tickets vendu</h3>
<div class="ml-5 mr-5">
    <div class="p-4 mt-4 table-responsive" style="background-color: white;">
        <table class="table">
            <thead>
                <tr>
                    <th>Number Ticket</th>
                    <th>Name</th>
                    <th>Mail</th>
                    <th>Amount</th>
                    <th>Date d'achat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tickeLiqr">
            <?php
                $database = Database::getInstance();

                require_once 'controllers/TransactionController.php';
                require_once 'models/BingoModel.php';
                $transCont = new TransactionController($database);
                $bingoMad = new BingoModel($database);
                $bingoLasIns = $bingoMad->getLastInsertedBingo($_SESSION['association_info']['asso_id']);
                if($bingoLasIns){
                    $listTransactions = $transCont->getListTransTicketSales($bingoLasIns['bingo_id']); 
                    
                    foreach ($listTransactions as $transaction) {
                        echo "<tr>";
                        echo "<td class='transId' transId=".$transaction['trans_id'].">" . $transaction['trans_nb'] . "</td>";
                        echo "<td> " . $transaction['user_name'] . "</td>";
                        echo "<td>" . $transaction['user_mail'] . "</td>";
                        echo "<td>" . $transaction['trans_amount'] . "</td>";
                        echo "<td>" . $transaction['trans_date'] . "</td>";
                        echo "</tr>";
                    }
                }

            ?>
                </tbody>
        </table>
    </div>
</div>