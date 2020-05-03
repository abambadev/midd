Bonjour {{ $_nom }} {{ $_prenom }} <br>
<br>
Nous avons reçu une demande de réinitialisation de mot de passe. <br>
Pour réinitialiser votre mot de passe veillez cliquer sur ce bouton <br>
<a style="background-color: #178f8f; border-radius: 4px; color: #ffffff; display: inline-block; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; line-height: 50px; text-align: center; text-decoration: none; width: 200px; -webkit-text-size-adjust: none;" title="Réinitialiser maintenant" href="{{ $_reset_url }}" target="_blank" rel="noopener">Réinitialiser maintenant</a> <br>
lien : {{ $_reset_url }}
<br>
@include('mail._footer-html')
