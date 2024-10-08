<?php
session_start();

class AjaxController
{
    public function handleAjaxRequest()
    {
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'login':
                    require_once 'LoginController.php';
                    require_once '../Database.php';
                    $database = Database::getInstance();
                    $controller = new LoginController($database);
                    $result = $controller->login($_POST['mailUser'], $_POST['inputPass']);
                    if ($result) { 
                        $infoContent = file_get_contents('../view/asso/info.php');
                        $infoContent = str_replace('<?php if(isset($assoName)) echo $assoName ?>', $_SESSION['user_name'], $infoContent);
                        $infoContent = str_replace('<?php if(isset($assoMail)) echo $assoMail ?>', $_SESSION['user_mail'], $infoContent);
                        header('Content-Type: text/html; charset=utf-8');
                        echo $infoContent;
                    } else {
                        echo null;
                    }
                    break;
                case 'login':
                    require_once 'LoginController.php';
                    require_once '../Database.php';
                    $database = Database::getInstance();
                    $controller = new LoginController($database);
                    $controller->logout();
                    
                    break;
                case 'logout':
                    session_start();
                    session_unset();
                    session_destroy();
                    exit;
                    
                    break;
                case 'newAsso':
                    require_once 'AssociationController.php';
                    require_once '../Database.php';
                    $database = Database::getInstance();

                    $target_dir = "../assets/uploads/";

                    $assoName = $_POST['assocName'];
                    $assoEmail = $_POST['assoEmail'];
                    $assoPassword = $_POST['assoPassword'];

                    $target_file = $target_dir . basename($_FILES["assocDoc"]["name"]);
                    $docName = 'doc_' . uniqid() . '_' . basename($_FILES["assocDoc"]["name"]);
                    $target_file = $target_dir . $docName; 
                    if (move_uploaded_file($_FILES["assocDoc"]["tmp_name"], $target_file)) {
                        $assoCont = new AssociationController($database);
                        
                        $assoCont->addNewAssociation($assoName, $assoEmail, $docName, $assoPassword);
                        
                    } else {
                        echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                    }
                    
                    break;
                case 'newBingo':
                    require_once 'BingoController.php';
                    require_once '../models/LotsModel.php';
                    require_once '../Database.php';
                    
                    $database = Database::getInstance();

                    $bingoController = new BingoController($database);
                    $bingoId = $bingoController->addNewBingo($_POST['bingoName'], $_POST['bingoStart'], $_POST['bingoEnd'], $_POST['bingoPrice'], $_SESSION['association_info']['asso_id'], $_POST['bingoDotation'], $_POST['bingoNumber'], $_POST['lotNumber']);
                    $lotsModel = new LotsModel($database);
                    
                    $numberOfLots = count($_POST['lotTitle']);

                    
                    for($i = 0; $i < $numberOfLots; $i++) {
                        $target_dir = "../assets/uploads/";
                        $target_file = $target_dir . basename($_FILES["lotPicture"]["name"][$i]);
                        $locName = 'Lo_' . uniqid() . '_' . basename($_FILES["lotPicture"]["name"][$i]);
                        $target_file = $target_dir . $locName; 

                        if(isset($_FILES['lotPicture']['tmp_name'][$i])) {
                            move_uploaded_file($_FILES["lotPicture"]["tmp_name"][$i], $target_file);
                        }
                        
                        $lotsModel->addLots(
                            $_POST['lotTitle'][$i],
                            $_POST['lotPrice'][$i],
                            $locName, // Utilisez le nom de l'image
                            $_POST['lotDescriptionLink'][$i],
                            $_POST['lotDescription'][$i],
                            $bingoId
                        );
                    }
                    $listBingo = $bingoController->bingoListAsso();
                    $html = '';
                    foreach ($listBingo as $bingo) { 
                        $html.=  "<tr>";
                        $html.= "<td class='bingoId' bingoId=".$bingo['bingo_id'].">" . $bingo['bingo_name'] . "</td>";
                        $html.= "<td>" . $bingo['bingo_start'] . "</td>";
                        $html.= "<td>" . $bingo['bingo_stop'] . "</td>";
                        $html.= "<td>" . $bingo['bingo_ticket_number_dispo'] . "</td>";
                        if ($bingo['bingo_statut'] == 1) { 
                            $html.= '<td> <button class="btn btn-warning w-100 playBingo" data-toggle="modal" data-target="#modal-play">Start</button></td>';
                        } elseif ($bingo['bingo_statut'] == 2) { 
                            $html.= '<td> <button class="btn btn-danger w-100 playBingo" data-toggle="modal" data-target="#modal-play">finished</button></td>';

                        }
                        $html.= "</tr>";
                    }   
                    echo $html;
                    break;
                
                case 'addPayement':
                    require_once 'PayementController.php';
                    require_once '../models/LotsModel.php';
                    require_once '../Database.php';
                    
                    $database = Database::getInstance();

                    $payController = new PayementController($database);
                    $bingoId = $payController->addNewMethodPayement($_POST['methodPayement'], $_POST['stripeId'], $_SESSION['association_info']['asso_id']);
                    $payML = $payController->getAssoPayementM($_SESSION['association_info']['asso_id']);
                    $html = '';
                    foreach ($payML as $payment) {
                        $html .= "<tr>";
                        $html .= "<td>" . $payment['paymentMethod_label'] . "</td>";
                        $html .= "<td>" . $payment['payment_idStripe'] . "</td>";
                        $html .= "</tr>";
                    }
                    
                    echo $html;
                    break;
                case 'generate_ticket':
                    require_once 'TicketController.php';
                    require_once '../models/UserModel.php';
                    require_once '../models/BingoModel.php';
                    require_once '../models/BingoModel.php';
                    require_once '../models/TransactionModel.php';
                    
                    require_once '../Database.php';
                    $database = Database::getInstance();

                    $userMod = new UserModel($database);

                    $tickCont = new TicketController($database);
                    $bingoMod = new BingoModel($database);

                    $bingoTicket = $_POST['bingoTicket'];
                    $ticketName = $_POST['ticketName'];
                    $ticketMail = $_POST['ticketMail'];
                    $ticketNumber = intval($_POST['ticketNumber']);
                    // $bingoticketNumber = intval($_POST['bingoticketNumber']);
                    // $ticketPrice = floatval($_POST['ticketPrice']);getBingoTicketPrice
                    $ticketPrice = $bingoMod->getBingoTicketPrice($bingoTicket);
                    
                    $userId = $userMod->addUser($ticketName, $ticketMail);
                    
                    $nbTikDisp = $bingoMod->getTicketNumberDispo($bingoTicket);
                    $getBingo_ticket_number = $bingoMod->getBingo_ticket_number($bingoTicket);
                    $tickG = null;
                    $nbTikRes = $nbTikDisp['bingo_ticket_number_dispo'] - $ticketNumber; 
                    if($nbTikRes>0){
                        $transMod = new TransactionModel($database);
                        
                        $dateAchatTicket = new DateTime();
                        $trans_date = $dateAchatTicket->format('Y-m-d H:i:s');
                        $trans_amount = $ticketPrice['bingo_price'] * $ticketNumber;

                        $transId = $transMod->addTrans($userId, $trans_amount, $trans_date, $ticketNumber, $bingoTicket);
                      
                        $numTicket = $getBingo_ticket_number['bingo_ticket_number']-$nbTikRes;
                        $tickG = $tickCont->saveGenerateTicket($bingoTicket, $ticketNumber, $userId,$numTicket, $transId); 
                        $bingoMod->updateBingoTicketNumberDispo($bingoTicket, $nbTikRes);
                       
                        $html = '';

                        if(isset($_SESSION['association_info']['asso_id'])){
                            $bingoList = $bingoMod->getBingoDispo($_SESSION['association_info']['asso_id']);
                            foreach ($bingoList as $bingo) {
                                $html .= '<option value="' . $bingo['bingo_id'] . '">' . $bingo['bingo_name'] . '</option>';
                            }
                        }
                        
                        $ticketMod = new TicketModel($database);
                        $tickets = $ticketMod->ticketListSales($_POST['ticketNumber']);
                        
                        $bingoLasIns = $bingoMod->getLastInsertedBingo($_SESSION['association_info']['asso_id']);
                            $html = '';
                        $tickets = $tickCont->tickekListSales($bingoLasIns['bingo_id']);

                        foreach ($tickets as $ticket) {
                            $html .=  '<tr>';
                            $html .=  '<td>' . $ticket['ticket_id'] . '</td>';
                            $html .=  '<td>' . $ticket['user_name'] . '</td>';
                            $html .=  '<td>' . $ticket['user_mail'] . '</td>';
                            $html .=  '<td>' . $ticket['ticket_dateAchat'] . '</td>';
                            $html .=  '</tr>';
                        }   
                        header('Content-Type: text/html; charset=utf-8');
                        // $responseData = array(
                        //     'tikL' => $tikL,
                        //     'html' => $html
                        // );  
                        // $transMod = new TransactionModel($database);

                        // $listTransactions = $transMod->getListTransByAsso($bingoTicket); 
                        // $html = '';
                        // foreach ($listTransactions as $transaction) {
                        //     $html .= "<tr>";
                        //     $html .= "<td class='transId' transId=".$transaction['trans_id'].">" . $transaction['trans_nb'] . "</td>";
                        //     $html .= "<td> " . $transaction['user_name'] . "</td>";
                        //     $html .= "<td>" . $transaction['user_mail'] . "</td>";
                        //     $html .= "<td>" . $transaction['trans_amount'] . "</td>";
                        //     $html .= "<td>" . $transaction['trans_date'] . "</td>";
                        //     $html .= "</tr>";
                        // }
                        $responseData = array(
                            'etat' => 1,
                            'tickG' => $tickG,
                            'html' => $html
                        );                    
                        $jsonData = json_encode($responseData);
                        echo $jsonData;
                    }else{
                        $responseData = array(
                            'etat' => null,
                            'tickNbDispo' => $nbTikDisp['bingo_ticket_number_dispo'],
                            'tickG' => $tickG,
                            'nbTikRes' => $html
                        );                    
                        $jsonData = json_encode($responseData);
                        echo $jsonData;
                    }
                    break;
                default:
                    $this->respondWithError('Action non reconnue');
                    break;
            }
        }else if(isset($_GET['action'])){
            switch ($_GET['action']) {
                case 'getListBingo':
                    require_once '../models/BingoModel.php';
                    require_once '../models/TicketModel.php';
                    require_once '../Database.php';
                    
                    $database = Database::getInstance();

                    $bingoMad = new BingoModel($database);
                    $bingoList = $bingoMad->getBingoDispo($_SESSION['association_info']['asso_id']);
                    $html = '';
                    foreach ($bingoList as $bingo) {
                        $html .= '<option value="' . $bingo['bingo_id'] . '">' . $bingo['bingo_name'] . '</option>';
                    }
                    
                    $bingoLasIns = $bingoMad->getLastInsertedBingo($_SESSION['association_info']['asso_id']);
                    
                    $ticketMad = new TicketModel($database);
                    $tickets = $ticketMad->ticketListSales($bingoLasIns['bingo_id']);

                    $tikL = '';
                    foreach ($tickets as $ticket) {
                        $tikL .=  '<tr>';
                        $tikL .=  '<td>' . $ticket['ticket_id'] . '</td>';
                        $tikL .=  '<td>' . $ticket['user_name'] . '</td>';
                        $tikL .=  '<td>' . $ticket['user_mail'] . '</td>';
                        $tikL .=  '<td>' . $ticket['ticket_dateAchat'] . '</td>';
                        $tikL .=  '</tr>';
                    }
                    
                    header('Content-Type: text/html; charset=utf-8');
                    $responseData = array(
                        'tikL' => $tikL,
                        'html' => $html
                    );                    
                    $jsonData = json_encode($responseData);
                    echo $jsonData;

            break;
            case 'getMPayement':
                require_once 'PayementController.php';
                require_once '../models/LotsModel.php';
                require_once '../Database.php';
                
                $database = Database::getInstance();

                $payController = new PayementController($database);
                $payML = $payController->getAssoPayementM($_SESSION['association_info']['asso_id']);
                $html = '';
                foreach ($payML as $payment) {
                    $html .= "<tr>";
                    $html .= "<td>" . $payment['paymentMethod_label'] . "</td>";
                    $html .= "<td>" . $payment['payment_idStripe'] . "</td>";
                    $html .= "</tr>";
                }
                echo $html;
                break;
                
            default:
                    $this->respondWithError('Action non reconnue');
                    break;
            }
        }else{
            $this->respondWithError('Action manquante');

        }
    }


    // M thode utilitaire pour envoyer une r ponse d'erreur
    private function respondWithError($message)
    {
        $result = array('status' => 'error', 'message' => $message);
        $this->respond($result);
    }

    // M thode utilitaire pour envoyer la r ponse JSON
    private function respond($result)
    {
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}

// Instanciez le contr leur et appelez la m thode principale
$controller = new AjaxController();
$controller->handleAjaxRequest();
