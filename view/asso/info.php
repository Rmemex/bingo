<h3>Info</h3>
<div class="form-group row mt-4">
    <label for="assoc-name" class="col-sm-3 col-form-label">Association name</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="assoc-name" value="<?php if(isset($_SESSION['user_name'])) echo $_SESSION['user_name'] ?>">
    </div>
</div>
<div class="form-group row">
    <label for="assoc-mail" class="col-sm-3 col-form-label">Association mail</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="assoc-mail" value="<?php if(isset($_SESSION['user_mail'])) echo $_SESSION['user_mail'] ?>" >
    </div>
</div>
<div class="form-group row">
    <label for="assoc-document" class="col-sm-3 col-form-label">Document</label>
    <div class="col-sm-7">
        <input type="file" id="assoc-document">
    </div>
</div>
<div class="form-group row">
    <label for="assoc-status" class="col-sm-3 col-form-label">Status</label>
    <div class="col-sm-7">
        <input type="text" readonly class="form-control-plaintext" id="assoc-status" value="Validé">
    </div>
</div>
<div class="text-center mt-5 mb-4 mr-4">
    <button type="button" class="btn btn-success" style="width: 20%; font-weight: bold; color: black" id="assoc_save">SAVE</button>
</div>