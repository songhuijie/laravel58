<!DOCTYPE html>
<meta charset="utf-8" />
<title>WebSocket Test</title>
<script src="https://www.jq22.com/jquery/jquery-2.1.1.js"></script>
{{--<script src="{{asset('/js/jquery.js')}}"></script>--}}
<select id="follow_color">
    <option value="1">♥</option>
    <option value="2">♠</option>
    <option value="3">♣</option>
    <option value="4">♦</option>
</select>

<select id="symbol_type">
    <option value="1">></option>
    <option value="2"><</option>
    <option value="3">=</option>
</select>

<select id="value">
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">J</option>
    <option value="12">Q</option>
    <option value="13">K</option>
    <option value="14">A</option>
</select>
<button id="choose">选牌完毕 下注</button>

<br/>
<button id="send">socket 发送消息</button>

<h2>WebSocket Test</h2>
<button id="register">点击注册</button>
<button id="log">日志</button>
<button id="other_one">大筹码</button>
<button id="other_two">低概率</button>
<div id="output"></div>


<script language="javascript" type="text/javascript">
    // var wsUri ="wss://tron-server.high-low.online:7272/";
    // var wsUri ="ws://test-eos-server.baccaratdapp.net:7373/";
    // var wsUri ="wss://eos-server.baccaratdapp.net:7373/";
    var wsUri ="ws://test-tron-server.baccaratdapp.net:11500";
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
    $('#register').click(function(){
        console.log(1);
        var url = 'http://192.168.1.11:8888/makeUserInfo';
        var data = {'user_address':'TCFx5ktTZdMADvmtxPEb1QAY8Qau4zABTW'};
        $.post(url,data,function(response){

            console.log(response);
        },JSON)
    });


    $('#log').click(function(){
        var url = 'https://tron-server.high-low.online/game-coin/userBetHistory';
        var data = JSON.stringify({addr:'TCFx5ktTZdMADvmtxPEb1QAY8Qau4zABTW',lastid:'0',limit:'100'});
        $.post(url,{data:data},function(response){

            console.log(response);
        },JSON)
    });

    $('#other_one').click(function(){
        var url = 'http://test-tron-server.high-low.online/game-coin/OtherHistory';
        var data = JSON.stringify({type:1,lastid:'0',limit:'100'});
        $.post(url,{data:data},function(response){

            console.log(response);
        },JSON)
    });

    $('#other_two').click(function(){
        var url = 'http://test-tron-server.high-low.online/game-coin/OtherHistory';
        var data = JSON.stringify({type:2,lastid:'0',limit:'100'});
        $.post(url,{data:data},function(response){

            console.log(response);
        },JSON)
    });

    $('#choose').click(function(){
        var flower_color = $("#follow_color option:selected").val();
        var symbol_type  = $("#symbol_type option:selected").val();
        var value        = $("#value option:selected").val();

        var own_data = {
            flower_color:flower_color,symbol_type:symbol_type,value:value,coin_type:'trx',now_invest_coins:1000000
        };
        var addr = 'TCFx5ktTZdMADvmtxPEb1QAY8Qau4zABTW';
        var user_id = 42;
        var txID = 'ssfdasfzvsdfss';


        var data = JSON.stringify({data:own_data,addr:addr,user_id:user_id,txID:txID,signature:"0xee16107ef2d4306b7e2a274a85be0f26499b3c51df067e212cada6ba670756315f1606211a5b98f361d09293b9fcff9a52f31b5d1cc8b45b5bd31e825777588e1b",
            signData:"TCFx5ktTZdMADvmtxPEb1QAY8Qau4zABTW|1559285886635"});


        var url = 'http://test-tron-server.high-low.online/makeLotteryInfo';
        $.post(url,{data:data},function(response){

            console.log(response);
        },JSON)
    });

    $('#send').click(function(){

        var message = "{\"code\":1000,\"data\":{\"address\":\"TCFx5ktTZdMADvmtxPEb1QAY8Qau4zABTW\"}}";
        websocket.send(message);
    });
</script>

</html>
