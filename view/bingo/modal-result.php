<div class="modal fade" id="modal-result" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background-color: #E0E0E0">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row col-lg-12 text-center">
                    <div class="col-lg-4">
                        <h3>ASSO NAME</h3>
                    </div>
                    <div class="col-lg-4" style="background-color: #FBBE07; border-radius: 10px">
                        <h3>Prize 4</h3>
                    </div>
                    <div class="col-lg-4">
                        <h3>Date</h3>
                    </div>
                </div>
                <div class="row col-lg-12 text-center mt-4">
                    <div class="col-lg-4">
                        <div class="p-4 m-4" style="background-color: #32D582; border-radius: 15px; border: 3px solid">
                            <img src="assets/image/bingo.jpg" alt="" style="width: 140px;">
                            <div class="row mt-4 text-bold" style="font-size: 18px">
                                <div class="col">
                                    <!-- Colonne 1: Chiffres de 1 à 18 -->
                                    <?php for ($i = 1; $i <= 18; $i++) { ?>
                                        <div id="num_res_<?php echo $i; ?>"><?php echo $i; ?></div>
                                    <?php } ?>
                                </div>
                                <div class="col">
                                    <!-- Colonne 2: Chiffres de 19 à 36 -->
                                    <?php for ($i = 19; $i <= 36; $i++) { ?>
                                        <div id="num_res_<?php echo $i; ?>"><?php echo $i; ?></div>
                                    <?php } ?>
                                </div>
                                <div class="col">
                                    <!-- Colonne 3: Chiffres de 37 à 54 -->
                                    <?php for ($i = 37; $i <= 54; $i++) { ?>
                                        <div id="num_res_<?php echo $i; ?>"><?php echo $i; ?></div>
                                    <?php } ?>
                                </div>
                                <div class="col">
                                    <!-- Colonne 4: Chiffres de 55 à 72 -->
                                    <?php for ($i = 55; $i <= 72; $i++) { ?>
                                        <div id="num_res_<?php echo $i; ?>"><?php echo $i; ?></div>
                                    <?php } ?>
                                </div>
                                <div class="col">
                                    <!-- Colonne 5: Chiffres de 73 à 90 -->
                                    <?php for ($i = 73; $i <= 90; $i++) { ?>
                                        <div id="num_res_<?php echo $i; ?>"><?php echo $i; ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-2">
                            <h3>RESULT NUMBER</h3>
                            <div class="rounded-circle mt-2" style="width: 40px; height: 40px; background-color: #B396FF;">
                                <p style="font-size: 22px;">00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="p-2 m-4" style="background-color: #32D582; border-radius: 15px; border: 3px solid">
                            <div class="mt-2 p-2 text-left" style="background-color: #8FB892; height: 400px; border: 1px solid">
                                <h3>Lot 1:</h3>
                                <h3>Lot 2:</h3>
                                <h3>Lot 3:</h3>
                            </div>
                        </div>
                        <div style="margin-top: -50px;">
                            <button type="button" class="btn btn-warning btn-lg text-bold">WINNERS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>