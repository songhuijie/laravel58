<html>
<head>
    <style>
        body{
            background-color: #999;
        }
        .chat{
            width: 60%;
            height: 400px;
            background-color: #fff;
            margin-left: 20%;
        }
        .send_box{
            text-align: center;
        }
    </style>
</head>
    <body>
        <h1 style="text-align: center">
            测试
        </h1>

        <div class="chat" >

        </div>
        <p class="send_box">
            <input type="text">
            <button class="send">发送</button>
        </p>
    </body>

<script src="https://www.jq22.com/jquery/jquery-2.1.1.js"></script>
<script>

    var wsUri ="ws://www.laravel58.com:9501?sessionid={{ $sessionid }}";
    var output;


    function init() {
        output = document.getElementById("output");
        testWebSocket();
    }

    function testWebSocket() {
        websocket = new WebSocket(wsUri);
        websocket.onopen = function(evt) {
            // onOpen(evt)
            // doSend("{\"code\":1000,\"data\":{\"address\":\"TCFx5ktTZdMADvmtxPEb1QAY8Qau4zABSS\",\"sign\":\"0x2302c77852846c06e176583c4c0bd205427285b70c0d48a54833aacc0607a7272f819127b77033defa7172289815c23079dcca04e14f8f2eeabecb06ab2a93181b\",\"sign_data\":\"TCFx5ktTZdMADvmtxPEb1QAY8Qau4zABTW|1560220548211\",\"tx_id\":\"2C75CD45D41875D222FC77BB356A40AE8D59D7268C3C3FBE92ABAD872D3631CB\"}}");
            doSend("P");
        };

        websocket.onmessage = function(evt) {


            setTimeout(function(){
                checkTime(evt)
            }, 2000);

            onMessage(evt);
        };


        websocket.addEventListener('message', function(event) {
            console.log( event.data);
        });


        // websocket.onerror = function(evt) {
        //     onError(evt)
        // };
        // websocket.onclose = function(evt) {
        //     onClose(evt)
        // };
    }

    function checkTime(evt){
        if(evt.data == "Q"){
            doSend("P");
        }
    }
    function SendP() {

        doSend("P");
    }
    function onOpen(evt) {
        writeToScreen("CONNECTED");
        doSend("WebSocket rocks");
    }

    function onClose(evt) {
        writeToScreen("DISCONNECTED");
    }

    function onMessage(evt) {
        writeToScreen('<span style="color: blue;">RESPONSE: '+ evt.data+'</span>');

    }

    function onError(evt) {
        writeToScreen('<span style="color: red;">ERROR:</span> '+ evt.data);
    }

    function doSend(message) {
        writeToScreen("SEND: " + message);
        websocket.send(message);
    }

    function writeToScreen(message) {
        var pre = document.createElement("p");
        pre.style.wordWrap = "break-word";
        pre.innerHTML = message;
        output.appendChild(pre);
    }


    window.addEventListener("load", init, false);
</script>
<script>
    $('#send').click(function(){
        var code = 1000;
        var data = [];
        data.address = 'TCFx5ktTZdMADvmtxPEb1QAY8Qau4zABTW';
        var message = JSON.stringify(data);
        websocket.send(message);
    });
</script>
</html>
