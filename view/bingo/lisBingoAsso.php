<h3>Vos bingo</h3>
<div class="ml-5 mr-5">
    <div class="p-4 mt-4 table-responsive" style="">
        <table class="table">
            <thead>
                <tr>
                    <th>Bingo title</th>
                    <th>Bingo start</th>
                    <th>Bingo stop</th>
                    <th>Ticktet Dispo</th>
                    <th></th>
                  
                </tr>
            </thead>
            <tbody id="bingoListAsso">
                <?php
                    $database = Database::getInstance();

                    require_once 'controllers/BingoController.php';
                    $bingoController = new BingoController($database);
                    $listBingo = $bingoController->bingoListAsso();
                    foreach ($listBingo as $bingo) { 
                        echo "<tr>";
                        echo "<td class='bingoId' bingoId=".$bingo['bingo_id'].">" . $bingo['bingo_name'] . "</td>";
                        echo "<td>" . $bingo['bingo_start'] . "</td>";
                        echo "<td>" . $bingo['bingo_stop'] . "</td>";
                        // echo "<td>" . $bingo['bingo_dotation'] . "</td>";
                        // echo "<td>" . $bingo['bingo_lots_number'] . "</td>";
                        echo "<td>" . $bingo['bingo_ticket_number_dispo'] . "</td>";
                        // echo "<td>" . $bingo['bingo_statut'] . "</td>";
                        if ($bingo['bingo_statut'] == 1) { 
                            echo '<td> <button class="btn btn-warning w-100 playBingo" data-toggle="modal" data-target="#modal-play" id="start-game">Start</button></td>';

                            echo '<td> <button class="btn btn-warning w-100 playBingo" data-toggle="modal" data-target="#modal-play">Start</button></td>';

                        } elseif ($bingo['bingo_statut'] == 2) { 
                            echo '<td> <button class="btn btn-danger w-100 playBingo" data-toggle="modal" data-target="#modal-play">finished</button></td>';

                        }
                        echo "</tr>";
                    }   
                    
                ?>
                
                
            </tbody>
        </table>
    </div>
</div>