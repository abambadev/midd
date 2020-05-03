Bonjour cher client,

Votre hébergement <b>{{ $package_name }}</b> sur {{ config('app.name') }} change d’adresse.
L’adresse {{ $origin_server_name }} devient {{ $recipient_server_name }} Cela intervient dans le cadre de l'améliorer de la qualité de nos services.

@include('mail._footer-text')
