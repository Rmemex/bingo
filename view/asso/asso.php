<div class="row mt-4" id="assoc-page" style="height: 95vh;">
    <div class="col-5 col-sm-3">
        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active text-dark text-lg" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Info</a>
            <a class="nav-link text-dark text-lg" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Bingo</a>
            <a class="nav-link text-dark text-lg" id="vert-tabs-ticket-tab" data-toggle="pill" href="#vert-tabs-ticket" role="tab" aria-controls="vert-tabs-ticket" aria-selected="false">Ticket</a>
            <a class="nav-link text-dark text-lg" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Stats</a>
            <a class="nav-link text-dark text-lg" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Payement</a>

        </div>
    </div>
    <div class="col-7 col-sm-9">
        <div class="tab-content" id="vert-tabs-tabContent">
            <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                <?php
                    include_once 'info.php';

                ?> 
            </div>
            <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                <?php    
                    include_once 'view/bingo/formAdd.php';

                ?> 
            </div>
            
            <div class="tab-pane fade" id="vert-tabs-ticket" role="tabpanel" aria-labelledby="vert-tabs-ticket-tab">
                <?php    
                    include_once 'view/ticket/formAdd.php';
                    include_once 'view/ticket/listTicket.php';

                ?> 
            </div>
            <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                <?php    
                    include_once 'view/bingo/stats.php';
                    
                ?>
            </div>
            <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                <?php    
                    include_once 'view/asso/payment.php';

                ?> 
            </div>
        </div>
    </div>
</div>