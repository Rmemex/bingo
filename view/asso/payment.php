<h3>Payement</h3>
<div class="form-group row mt-4">
    <label for="methodPayement" class="col-sm-4 col-form-label">Method of payement:</label>
    <div class="col-sm-4">
        <select class="form-control" id="methodPayement">
            <option value="1">Credit Card</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="stripe-id" class="col-sm-4 col-form-label">ID Strip</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="stripeId">
    </div>
</div>
<div class="text-center mt-5 mb-4 mr-4">
    <button type="button" class="btn btn-success" style="width: 20%; font-weight: bold; color: black" id="add_payement">SAVE</button>
</div>

<h3>Payement Method</h3>
<div class="ml-5 mr-5">
    <div class="p-4 mt-4 table-responsive" style="">
        <table class="table">
            <thead>
                <tr>
                    <th>Method of payement</th>
                    <th>ID Strip</th>
                   
                </tr>
            </thead>
            <tbody id="payMethod">
             </tbody>
        </table>
    </div>
</div>