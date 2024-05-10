<div id="page-play">
    <div class="pt-3 pl-5">
        <p>Lorem ipsum</p>
    </div>
    <div class="row align-items-center justify-content-center pt-5">
        <div class="text-center p-2" style="border: 3px solid; margin-left: 10%">
            <p class="text-center" style="font-weight: bold; font-size: 20px">Biggest Price</p>
            <img src="assets/image/prix.jpg" alt="" style="width: 150px;">
        </div>
        <div class="text-center p-2">
            <div class="p-4 ml-4" style="background-color: #38A07F; border-radius: 15px; border: 2px solid">
                <p style="font-weight: 600; line-height: 3px">Last Winner</p>
                <img src="assets/image/stars.png" alt="" style="width: 90px;">
                <p class="mt-4" style="font-weight: 600; line-height: 5px">James W.</p>
                <p style="font-weight: 600">"Thank you"</p>
            </div>
        </div>
    </div>

    <div class="ml-5 mr-5">
        <div class="p-4 mt-4 table-responsive" style="background-color: #E0E0E0; border: 1px solid">
            <table class="table">
            <thead>
            <tr>
                <th >Date</th>
                <th>Asso</th>
                <th>1st prize</th>
                <th>Dotation</th>
                <th>Ticket price</th>
                <th style="width: 40px">Status</th>
            </tr>
            </thead>
            <tbody>
                <?php
                require_once 'Controllers/BingoController.php';
                $bingoController = new BingoController($database);
                $listBingo = $bingoController->bingoList();
                foreach ($listBingo as $bingo) { ?>
                    <tr>
                        <td class="idBingo" bingoName = "<?php echo $bingo['bingo_name']; ?>" idBingo ="<?php echo $bingo['Bingo_id']; ?>"><?php echo $bingo['DateBingo']; ?></td>
                        <td ><?php echo $bingo['Association']; ?></td>
                        <td><?php echo $bingo['1st prize']; ?></td>
                        <td><?php echo $bingo['Dotation']; ?></td>
                        <td><?php echo $bingo['Ticket price']; ?></td>
                        <td><?php echo $bingo['Status']; ?></td>
                        <td>
                            <button class="btn btn-warning w-100 playBingo" data-toggle="modal" data-target="#modal-play">Play</button>
                            
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

            </table>
        </div>
    </div>
</div>