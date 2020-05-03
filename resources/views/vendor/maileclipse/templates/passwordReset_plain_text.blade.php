{{ config('app.name') }} :: Mot de passe <br>
Bonjour {{ $_prenom.' '.$_nom }}, <br><br>
Ce mail fait suite à une demande de réinitialisation de mot de passe sur {{ config('app.name') }}. <br>
<a href="{{ $_reset_url }}">Réinitialiser maintenant</a><br>
URL : {{ $_reset_url }} <br>