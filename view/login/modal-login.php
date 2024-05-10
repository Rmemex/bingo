<div class="modal fade" id="modal-login" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="background-color: #E0E0E0">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="p-5" id="pop-login">
                    <h3 class="text-center">LOGIN</h3>
                    <div class="form-group mt-4">
                        <label>Mail:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-user"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" id="inputEmail" class="form-control" autocomplete="email" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required>
                        </div>
                    </div>
                    <div class="text-center mt-4" class="text-center mt-4">
                        <button class="btn" style="background-color: #212121; color:white; width: 65%;" type="submit" id="act-login">LOGIN</button>
                    </div>
                    <div class="text-center mt-3">
                        <a id="signup" type="button"  style="color: #65A2FF; font-size: 20px">Sign up</a>
                    </div>
                </div>
                <form method="POST" enctype="multipart/form-data" id="InscFormAsso">
                    <div class="p-5" id="pop-signup">
                        <h3 class="text-center">SIGN UP</h3>
                        <div class="form-group mt-4">
                            <label>Association Name:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="assocName" id="assoName" class="form-control" autocomplete="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label>Mail:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                </div>
                                <input type="email" class="form-control" name="assoEmail" id="assoEmail" class="form-control" autocomplete="email" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" name="assoPassword" id="assoPassword" class="form-control" autocomplete="current-password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Document:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file"></i></span>
                                </div>
                                <input type="file" class="form-control" name="assocDoc" id="assocDoc" class="form-control" autocomplete="current-password" required>
                            </div>
                        </div>
                        <div class="text-center mt-4" class="text-center mt-4">
                            <button class="btn" style="background-color: #212121; color:white; width: 65%;" type="button" id="creatAssoc">CREATE</button>
                        </div>
                        <div class="text-center mt-3">
                            <a id="go-login" style="color: #65A2FF; font-size: 20px">Go to login</a>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>