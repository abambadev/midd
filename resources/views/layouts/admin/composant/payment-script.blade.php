<script src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">

    Stripe.setPublishableKey('{{ config('perso.STRIPE_PUBLIC_KEY') }}');

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('#PaymentBtnStripe').html('<i class="mdi mdi-cart"></i> Payer maintenant').removeClass('btn-secondary').addClass('btn-primary');
            var MsgError = response.error.message;
            if (MsgError == 'Your card number is incorrect.') {
                var MsgError = 'Votre numéro de carte est incorrect.';
            }
            if (MsgError == 'The card number is not a valid credit card number.') {
                var MsgError = "Le numéro de carte n'est pas valide.";
            }
            if (MsgError == "Your card's expiration month is invalid.") {
                var MsgError = "Le mois d'expiration est invalide.";
            }
            if (MsgError == "Your card's security code is invalid.") {
                var MsgError = "Le code CVC est invalide.";
            }
            if (MsgError == "Could not find payment information") {
                var MsgError = "Veuillez renseigner les références de votre carte de crédit";
            }
            $("#PaymentMsgStripe").show().removeClass('bg-custom').addClass('bg-danger').html(MsgError);
        } else {
            var form$ = $("#PaymentForm");
            var token = response['id'];
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            form$.append("<input type='hidden' name='action' value='stripe' />");
            form$.append('@csrf');
            form$.get(0).submit();
        }
    }

    $("#PaymentBtnStripe").click(function(e) {
        e.preventDefault()
        $('#PaymentBtnStripe').html('<i class="mdi mdi-spin mdi-loading"></i> En cours de traitement').removeClass('btn-primary').addClass('btn-secondary');
        var MsgDefault = 'Veuillez renseigner les références de votre carte de crédit'
        $("#PaymentMsgStripe").removeClass('bg-danger').addClass('bg-custom').html(MsgDefault);
        Stripe.createToken({
            number: $('#StripeDataNumber').val(),
            cvc: $('#StripeDatCvc').val(),
            exp_month: $('#StripeDataMonth').val(),
            exp_year: $('#StripeDataYear').val()
        }, stripeResponseHandler);
        return false; 
    });

    $("#PaymentBtnSycapay").click(function(e) {
        e.preventDefault()
        var form$ = $("#PaymentForm");
        form$.append("<input type='hidden' name='action' value='mobile' />");
        form$.append('@csrf');
        form$.get(0).submit();
    });

</script>