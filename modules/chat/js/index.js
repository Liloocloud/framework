/* websocket functions */

var mySocket;
const socketMessageListener = (event) => { var data = JSON.parse(event.data);
    if(data.nick!=""){
        $(".nick").html(data.nick);
    }
    setTimeout(function() {
        fakeMessage(data.from,data.msg);
    }, 100);
};

const socketOpenListener = (event) => { // Open
   console.log('Connected');
};

const socketCloseListener = (event) => { // Closed
   if (mySocket) {
      console.error('Disconnected.');
   }
   mySocket = new WebSocket('ws://51.79.72.47:8081');
   mySocket.addEventListener('open', socketOpenListener);
   mySocket.addEventListener('message', socketMessageListener);
   mySocket.addEventListener('close', socketCloseListener);
}; socketCloseListener();

/* chat functions */

var $messages = $('.messages-content'),
    d, h, m,
    i = 0;

$(window).load(function(){
    $messages.mCustomScrollbar();
});

function updateScrollbar(){
    $messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
        scrollInertia: 10,
        timeout: 0
    });
}

function setDate(){
    d = new Date()
    if(m != d.getMinutes()){
        m = d.getMinutes();
        $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.message:last'));
    }
}

function insertMessage(){
    msg = $('.message-input').val();
    if($.trim(msg) == ''){
        return false;
    } sendMessage(msg);
    $('<div class="message message-personal">' + msg + '</div>').appendTo($('.mCSB_container')).addClass('new');
    setDate();
    $('.message-input').val(null);
    updateScrollbar();
    setTimeout(function(){
        fakeMessage();
    }, 1000 + (Math.random() * 20) * 100);
}

$('.message-submit').click(function(){
    insertMessage();
});

$(window).on('keydown', function(e){
    if (e.which == 13) {
        insertMessage(); return false;
    }
})

var Fake = [
    'Bem vindo!<br>Você está conectado!'
]

function fakeMessage(from='',msg=''){
    if(i==0||msg!=''){
        $('<div class="message loading new"><figure class="avatar"><img src="https://w7.pngwing.com/pngs/419/473/png-transparent-computer-icons-user-profile-login-user-heroes-sphere-black-thumbnail.png" /></figure><span></span></div>').appendTo($('.mCSB_container'));
        updateScrollbar();
        setTimeout(function(){
            $('.message.loading').remove();
            $('<div class="message new" title="'+from+'"><figure class="avatar"><img src="https://w7.pngwing.com/pngs/419/473/png-transparent-computer-icons-user-profile-login-user-heroes-sphere-black-thumbnail.png" /></figure>' +(from!=""?from+': ':'Servidor: ')+ (msg!=''?msg:Fake[i]) + '</div>').appendTo($('.mCSB_container')).addClass('new');
            setDate();
            updateScrollbar();
            i++;
        }, 1000 + (Math.random() * 20) * 100);
    }
}

function sendMessage(msg){
    mySocket.send(msg);
}