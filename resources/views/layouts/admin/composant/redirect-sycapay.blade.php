<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form method="POST">
        
    </form>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        let _form = $('<form></form>');
        _form.attr('id', 'submit-payment').attr('action', "{{ $redirect }}").attr('method', 'POST');
        _form.append('<input name="token" type="hidden" value= "{{ $token }}" />');
        _form.append('<input name="amount" type="hidden" value= "{{ $amount }}" />');
        _form.append('<input name="currency" type="hidden" value= "{{ $currency }}" />');
        _form.append('<input name="urls" type="hidden" value= "{{ $urls }}" />');
        _form.append('<input name="urlc" type="hidden" value= "{{ $urlc }}" />');
        _form.append('<input name="commande" type="hidden" value= "{{ $commande }}" />');
        _form.append('<input name="merchandid" type="hidden" value= "{{ $merchandid }}" />');
        _form.append('<input name="typpaie" type="hidden" value= "{{ $typpaie }}" />');
       $('body').append(_form);
        
    // Validation du formulaire
    //$('#submit-payment').submit();
    $('#submit-payment').submit();
});
</script>