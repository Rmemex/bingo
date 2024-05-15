<?php
require __DIR__ . '/vendor/autoload.php';
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

class BingoServer implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "Nouvelle connexion: {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Déconnexion du client: {$conn->resourceId}\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        // Gérer les erreurs de connexion
        echo "Erreur: {$e->getMessage()}\n";
        $conn->close();
    }

    public function tirerNumero() {
        // Tirer un numéro aléatoire (1 à 90)
        $numeroTire = mt_rand(1, 90);
        // Envoyer le numéro tiré à tous les clients connectés
        foreach ($this->clients as $client) {
            $client->send($numeroTire);
        }
        echo "Numéro tiré: {$numeroTire}\n";
    }
}

// Créer un serveur WebSocket
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new BingoServer()
        )
    ),
    8080 // Port sur lequel le serveur écoutera
);

// Démarrer le serveur
$server->run();
