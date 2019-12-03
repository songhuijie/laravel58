<h1>选择付款人信息</h1>

@foreach($we_info as $k=>$v)
<form action="/weinfo" method="POST">
    <input type="hidden" name="account_id" value="{{$v->account_id}}">
    <input type="hidden" name="risk_token" id="risk_token">
    <input type="hidden" name="access_token" value="{{$access_token}}" readonly>
    <input type="text" value="{{$v->name}}" />
    <input type="submit" value="确认">
</form>

@endforeach
<script src='https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.3.1.min.js'></script>
<script type="text/javascript" src="https://static.wepay.com/min/js/risk.1.latest.js"></script>
<script type="text/javascript">

    WePay.risk.generate_risk_token();
    var token = WePay.risk.get_risk_token();
    $('#risk_token').val(token);

</script>
