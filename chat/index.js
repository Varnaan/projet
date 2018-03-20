import express from 'express';
import http from 'http';

let app = express();
let server = require ('http').Server(app);
let io = require('socket.io')(server);

app.use(express.static(__dirname));

app.get('/', function(request, response){
    response.sendFile(__dirname + '/index.html');
});

// app.get('/appVue.js', function(request, response){
//     response.sendFile(__dirname + '/appVue.js');
// });

// app.get('/main.css', function(request, response){
//     response.sendFile(__dirname + '/main.css');
// });

app.listen(3000, function(){
    console.log('Welcome, server connected on port 3000')
});

io.on('connection', function (socket) {
    console.log('User connected:' + socket.id);
});