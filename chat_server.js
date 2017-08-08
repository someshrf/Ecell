var http = require('http').createServer() ;
var io = require('socket.io')(http);

io.on('connection', function(socket){
  console.log('a user connected');
  socket.on('registered', function(data){
  	io.emit('registered_fs',data) ;
  	console.log(data) ;
  })
});

http.listen(3000, function(){
  console.log('listening on *:80');
});