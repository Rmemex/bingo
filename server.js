const express = require('express');
const app = express()
const server = require('http').createServer(app);
const WebSocket = require('ws');

const wss = new WebSocket.Server({server:server});

// var http = require('http').Server(app);
// var io = require('socket.io')(http);

wss.on('connection', function connection(ws){
    console.log('a user is connected');
    ws.on('disconnect', function(){
        console.log('a user is disconnected')
    })
    ws.on('chat message', function(msg){
        console.log('message recu:')
    })
})
server.listen(3000, function(){
    console.log("Server run on server 3000")
})

app.get("/", function(req, res){
    // res.sendFile(__dirname + '/index.php');
    res.send('success')
})
// const express = require('express');
// const http = require('http');
// const WebSocket = require('ws');

// const PORT = 3000;

// const app = express();
// const server = http.createServer(app);
// const wss = new WebSocket.Server({ server });

// app.use(express.static('public'));

// let tempsRestant;
// let timer;
// let randomNumberTimer;
// let numerosTires = [];

// function initialiserCompteur() {
//     tempsRestant = 0.15 * 60;
//     demarrerCompteur();
// }

// function demarrerCompteur() {
//     timer = setInterval(function(){
//         tempsRestant--;
//         if (tempsRestant >= 0) {
//             sendToAllClients({ type: 'tempsRestant', value: tempsRestant });
//         } else {
//             clearInterval(timer);
//             randomNumberTimer = setInterval(updateNumber, 60);
//             setInterval(function() {
//                 clearInterval(randomNumberTimer);
//                 var numeroTire = generateRandomNumber();
//                 numerosTires.push(numeroTire); 
//                 sendToAllClients({ type: 'numerosTires', value: numerosTires });
//                 setTimeout(function() {
//                     randomNumberTimer = setInterval(updateNumber, 60);
//                 }, 1000);
//             }, 3000);
//         }
//     }, 1000);
// }

// function generateRandomNumber() {
//     var randomNumber;
//     var formattedNumber;
//     if (numerosTires.length === 90) {
//         sendToAllClients({ type: 'endGame' });
//     } else {
//         do {
//             randomNumber = Math.floor(Math.random() * 90) + 1;
//             formattedNumber = randomNumber;
//         } while (numerosTires.includes(formattedNumber)); 
    
//         sendToAllClients({ type: 'randomNumber', value: formattedNumber });
//         return formattedNumber; 
//     }
// }

// function updateNumber() {
//     var randomNumber = Math.floor(Math.random() * 90) + 1;
//     var formattedNumber = randomNumber;
//     sendToAllClients({ type: 'randomNumber', value: formattedNumber });
// }

// function sendToAllClients(message) {
//     wss.clients.forEach(client => {
//         if (client.readyState === WebSocket.OPEN) {
//             client.send(JSON.stringify(message));
//         }
//     });
// }

// wss.on('connection', function connection(ws) {
//     console.log('Client connected');
//     ws.send(JSON.stringify({ type: 'gameStart' }));
// });

// server.listen(PORT, () => {
//     console.log(`Server started on port ${PORT}`);
//     initialiserCompteur();
// });
