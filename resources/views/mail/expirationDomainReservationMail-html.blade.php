{{ $first_name.' '.$last_name }}<br>
<p></p>
Votre nom de domaine [<b> {{ $domain_name }} </b>] expire prochainement. <br>
La date d’expiration prévue est le <b style="color: red">{{ date('d/m/Y', strtotime($domain_expiration_date)) }}</b>
<p></p>
Nous vous conseillons de le renouveler avant la date sus mentionnée afin d’éviter certains désagréments.
<p></p>
@include('mail._footer-html')
