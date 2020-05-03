Bonjour cher client, <br>
<br>
Votre hébergement <b>{{ $package_name }}</b> sur {{ config('app.name') }} change d’adresse. <br>
L’adresse {{ $origin_server_name }} devient {{ $recipient_server_name }} Cela intervient dans le cadre de l'améliorer de la qualité de nos services.
<br>
@include('mail._footer-html')
