<div class="modal fade" id="modal-play" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #E0E0E0">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="play1" >
                <h3 class="text-center mt-4">You are going to help the Asso 1, <br> choose the number of ticket you want</h3>
                    <div class="row align-items-center justify-content-center">
                        <div class="card col-lg-6 p-4 m-4" style="background-color: #F7DC6F;">
                            <h3 class="text-center" id="bingoNameMod">BINGO 1</h3>
                            <div id="ticket-details">
                                <div class="form-group row">
                                    <label for="nameUser" class="col-sm-4 col-form-label">NAME:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="nameUser" placeholder="_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mailUser" class="col-sm-4 col-form-label">MAIL:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="mailUser" placeholder="_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="commentUser" class="col-sm-4 col-form-label">COMMENT (OPT):</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control-plaintext" rows="3" id="commentUser" placeholder="_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _" style="background-color: transparent;"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nbrTicket" class="col-sm-4 col-form-label">NUMBER OF TICKETS:</label>
                                    <div class="col-sm-8">
                                        <input  class="form-control-plaintext"  id="nbrTicket" style="background-color: transparent;" type="number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-4">
                        <button type="button" class="btn btn-success btn-lg" style="width: 40%; font-weight: bold; color: black" id="valide_payement">PAYEMENT</button>
                    </div>
                </div>
                
                <div id="play3">
                    <h3 class="text-center mt-4">Payement by CB</h3>
                    <div class="row align-items-center justify-content-center">
                        <div class="card col-lg-6 p-4 m-4" style="background-color: #F7DC6F;">
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