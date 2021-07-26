<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<form>
    <input type="text" name="name" id="name" placeholder="Please Enter your name"/><br><br/>
    <input type="text" name="amt" id="amt" placeholder="Please Enter Amount"/><br/><br/>
    <input type="button" name="btn" id="btn" value="Pay Now" onclick="payNow()">
</form>

<script>
    function payNow(){
        var name = $('#name').val();
        var amt = $('#amt').val();
        var options = {
            "key": "rzp_test_rlDBSqjlD1ISdm", 
            "amount": amt*100,
            "currency": "INR",
            "name": "Testing", 
            "description": "Test Transaction",
            "image": "https://dynamic.brandcrowd.com/asset/logo/cbb0b2e5-dc04-4383-937d-8a48ef4d93fd/logo?v=636782307497330000",
            "handler": function (response){
                jquery.ajax({
                    type:'post',
                    url:'./../payment-success.php',
                    data:"&purchaseAmount="+amt+"&courseName="+name,
                    success:function (result){
                        window.location.href="complete.php";
                    }
                })
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }
</script>
