var  io = require("socket.io")(6001);
// var io = require('socket.io')
console.log('Connected to port 6001');
io.on('error',function (socket) {
    console.log('error')
});
io.on('connection',function (socket) {
    console.log('Co người vừa kết nối'+socket.id)
});
var Redis= require('ioredis');
var redis = new Redis(6379);
redis.psubscribe('*',function (error,count) {

});
redis.on('pmessage',function (parntner,channel,message) {
        console.log(channel)
        console.log(message)
        console.log(parntner)
        message=JSON.parse(message)
        io.emit(channel + ":" +message.event,message.data.chats)
        console.log('Sent')
})
