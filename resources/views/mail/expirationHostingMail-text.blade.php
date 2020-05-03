Bonjour {{ $first_name.' '.$last_name }}

Votre hébergement [ {{ $hebergement }} ] ({{ $package_name }}) expire prochainement.
La date d’expiration prévue est le {{ date('d/m/Y', strtotime($host_expiration_date)) }}

Nous vous conseillons de le renouveler avant la date sus mentionnée afin d’éviter certains désagréments.

@include('mail._footer-text')
