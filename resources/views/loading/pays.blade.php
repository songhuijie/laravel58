<h1>
    支付
</h1>
<div id="wepay_checkout"></div>

<script type="text/javascript" src="https://www.wepay.com/min/js/iframe.wepay.js"></script>

<script type="text/javascript">
    WePay.iframe_checkout("wepay_checkout", "{{$checkout_uri}}");
</script>


<script type="text/javascript" src="https://static.wepay.com/min/js/risk.1.latest.js"></script>
<script type="text/javascript">

    WePay.risk.generate_risk_token();
    console.log(WePay.risk.get_risk_token())
</script>
