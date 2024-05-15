<div class="modal fade" id="modal-play" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #E0E0E0">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="play1" style="height: 85vh;">
                    <h3 class="text-center mt-4">Choose your BINGO and the Asso you want to help</h3>
                    <div class="container mt-5">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                    require_once 'Controllers/BingoController.php';
                                    $bingoController = new BingoController($database);
                                    $listBingo = $bingoController->bingoList();
                                    $first = true;
                                    foreach ($listBingo as $bingo) {
                                ?>
                                    <div class="carousel-item <?php if ($first) { echo 'active'; $first = false; } ?>">
                                        <div class="card col-lg-5 p-4 m-auto" style="background-color: #FFFFFF;" id="bingo-card">
                                            <h3 class="text-center bingo-name"><?php echo $bingo['bingo_name']; ?></h3>
                                            <div id="ticket-details">
                                                <p class="mt-4" style="font-weight: bold; line-height: 5px">ASSOCIATION: <?php echo $bingo['Association']; ?></p>
                                                <p style="font-weight: bold; line-height: 5px">NUMBER OF TICKETS: <?php echo $bingo['bingo_ticket_number']; ?></p>
                                                <p style="font-weight: bold; line-height: 5px">TICKET: <?php echo $bingo['Ticket price']; ?> $</p>
                                                <p class="mt-2" style="font-weight: bold;line-height: 5px">TOTAL PRIZES:</p>
                                                <p class="mt-5 mt-2" style="font-weight: bold;line-height: 5px">BIGGEST PRIZE:</p>
                                                <p class="mt-5 mb-5" style="font-weight: bold;line-height: 5px">LOREM IPSUM</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-custom-icon" aria-hidden="true">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-custom-icon" aria-hidden="true">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
<<<<<<< Updated upstream
                    <div class="text-center mb-4">
                        <button type="button" class="btn btn-success btn-lg" style="width: 40%; font-weight: bold; color: black" id="valide_play">PLAY</button>
=======

                    <div class="text-center mt-4 mb-4">
                        <button type="button" class="btn btn-success btn-lg" style="width: 40%; font-weight: bold; color: black" id="valide_play_home">PLAY</button>
>>>>>>> Stashed changes
                    </div>
                </div>
                <div id="play2">
                    <h3 class="text-center mt-4">You are going to help the Asso 1, <br> choose the number of ticket you want</h3>
                    <div class="row align-items-center justify-content-center">
                        <div class="card col-lg-6 p-4 m-4" style="background-color: #FFFFFF;">
                            <h3 class="text-center" id="name-bingo"></h3>
                            <div id="ticket-details">
                                <div class="form-group row">
                                    <label for="nameUser" class="col-sm-4 col-form-label">NAME:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="nameUser_home" placeholder="_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mailUser" class="col-sm-4 col-form-label">MAIL:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="mailUser_home" placeholder="_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="commentUser" class="col-sm-4 col-form-label">COMMENT (OPT):</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control-plaintext" rows="3" id="commentUser_home" placeholder="_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _" style="background-color: transparent;"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nbrTicket" class="col-sm-4 col-form-label">NUMBER OF TICKETS:</label>
                                    <div class="col-sm-8">
                                        <select class="form-control-plaintext" id="nbrTicket_home" style="background-color: transparent;">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-4">
                        <button type="button" class="btn btn-success btn-lg" style="width: 40%; font-weight: bold; color: black" id="valide_payement">PAYEMENT</button>
                    </div>
                </div>
                <div id="play3" style="height: 85vh;">
                    <h3 class="text-center mt-4">Payement by CB</h3>
                    <div class="row align-items-center justify-content-center">
                        <div class="card col-lg-6 p-4 m-4" style="background-color: #FFFFFF;">
                            <h3 class="mt-2">Total: x x $</h3>
                            <h3>Number of tickets:</h3>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="mt-4 mb-5">Thanks, and good LUCK!</h3>
                    </div>
                    <div class="text-center mt-5">
                        <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" style="width: 40%; font-weight: bold; color: black" id="valide_ok">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>