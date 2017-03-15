/**
 * Created by Son on 28/09/2016.
 */

var http = require('http');
var servidor = http.createServer();
var io = require('socket.io').listen(servidor);
var port = 5000;

io.sockets.on('connection', function(socket)
{
    socket.on("cake_event", function(data){
        console.log(data);
        io.sockets.emit("cake_response", data);
    });
});

servidor.listen(port, function(){
    console.log("http://localhost: " + port);
});
