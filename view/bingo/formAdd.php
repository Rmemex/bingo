<h3>Bingo</h3>
<div class="form-group row mt-4">
    <label for="bingo-name" class="col-sm-3 col-form-label">Bingo name</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="bingo-name">
    </div>
</div>
<div class="form-group row mt-4">
    <label for="ingo-dotation" class="col-sm-3 col-form-label">Bingo dotation</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="bingo-dotation" placeholder="">
    </div>
</div>
<div class="form-group row mt-4">
    <label for="ticket-number" class="col-sm-3 col-form-label">Ticket Number</label>
    <div class="col-sm-5">
        <input type="number" class="form-control" id="ticket-number" placeholder="">
    </div>
</div>
<div class="form-group row mt-4">
    <label for="bingo-price" class="col-sm-3 col-form-label">Ticket Price</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="bingo-price" placeholder="">
    </div>
</div>
<div class="form-group row">
    <label for="bingo-start" class="col-sm-3 col-form-label">Start date</label>
    <div class="col-sm-5">
        <input type="datetime-local" class="form-control" id="bingo-start" placeholder="YYYY/MM/DD HH:MM:SS">
    </div>
</div>
<div class="form-group row mt-4">
    <label for="bingo-end" class="col-sm-3 col-form-label">End date</label>
    <div class="col-sm-5">
        <input type="datetime-local" class="form-control" id="bingo-end" placeholder="YYYY/MM/DD HH:MM:SS">
    </div>
</div>
<div class="form-group row mt-4">
    <label for="bingo-end" class="col-sm-3 col-form-label">Lot Number</label>
    <div class="col-sm-5">
        <input type="number" class="form-control" id="lot-number" placeholder="">
    </div>
</div>
<form id="bingoLots" enctype="multipart/form-data" id="lotForm" style="background-color: white;">
    
</form>

<div class="align-items-center justify-content-center mt-3 mb-4 mr-4 row">
    <button type="button" class="btn btn-success" style="width: 20%; font-weight: bold; color: black" id="add_bingo_btn">Add bingo</button>
    <p class="text-right text-muted ml-auto">Bingo: 0 / 6</p>
</div>