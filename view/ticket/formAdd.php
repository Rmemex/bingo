<div class="form-group row mt-4">
    <label for="bingoTicket" class="col-sm-3 col-form-label">Bingo</label>
    <select class="form-control col-sm-5" id="bingoTicket">
        <?php
            $database = Database::getInstance();
            require_once 'models/BingoModel.php';
            $bingoMod = new BingoModel($database);
            $bingoSelectList = $bingoMod->getBingoListByAsso($_SESSION['association_info']['asso_id']);
            var_dump($bingoSelectList);
            foreach ($bingoSelectList as $bingo) {
                echo '<option value="' . $bingo['bingo_id'] . '">' . $bingo['bingo_name'] . '</option>';
            }
            ?>
    </select>
</div>
<div class="form-group row mt-4">
    <label for="ticket-name" class="col-sm-3 col-form-label">name</label>
    <div class="col-sm-5">
    
        <input type="text" class="form-control" id="ticket-name" value="<?php echo $_SESSION['association_info']['asso_id']; ?>">
    </div>
</div>
<div class="form-group row mt-4">
    <label for="ticket-prenom" class="col-sm-3 col-form-label">firstName</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="ticket-firstName" placeholder="">
    </div>
</div>
<div class="form-group row mt-4">
    <label for="ticket-mail" class="col-sm-3 col-form-label">Mail </label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="ticket-mail" placeholder="">
    </div>
</div>
<div class="form-group row mt-4">
    <label for="tikNumber" class="col-sm-3 col-form-label">Ticket number</label>
    <div class="col-sm-5">
        <input type="number" class="form-control" id="tikNumber">
    </div>
</div>
<div class="align-items-center justify-content-center mt-3 mb-4 mr-4 row">
    <button type="button" class="btn btn-success" style="width: 20%; font-weight: bold; color: black" id="generate_ticket">Generate Ticket</button>
</div>
