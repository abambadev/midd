Bonjour {{ $first_name.' '.$last_name }}<br>
<br>
Votre hébergement <b>[ {{ $hebergement }} ]</b> ({{ $package_name }}) expire prochainement. <br>
La date d’expiration prévue est le <b style='color: red'>{{ date('d/m/Y', strtotime($host_expiration_date)) }}</b><br>
<br>
Nous vous conseillons de le renouveler avant la date sus mentionnée afin d’éviter certains désagréments.
<br>
@include('mail._footer-html')
