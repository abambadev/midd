Activation de compte <br>
Bonjour {{ $_prenom.' '.$_nom }}, <br>
Ce mail fait suite à votre inscription sur {{ config('app.name') }}. <br>
<a href="{{ $_activation_url }}">Activer Mon Compte</a><br>
URL : {{ $_activation_url }}