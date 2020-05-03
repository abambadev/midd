{{ $first_name.' '.$last_name }}

Votre nom de domaine [ {{ $domain_name }} ] expire prochainement.
La date d’expiration prévue est le {{ date('d/m/Y', strtotime($domain_expiration_date)) }}

Nous vous conseillons de le renouveler avant la date sus mentionnée afin d’éviter certains désagréments.

@include('mail._footer-text')
