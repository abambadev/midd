Bonjour {{ $_nom }} {{ $_prenom }} <br>
<br>
Toute l'équipe de MIDD vous souhaite la bienvenue ! <br>
<br>
Pour activer votre compte, veillez cliquer sur le bouton ci-dessous : <br>
<a style="background-color: #178f8f; border-radius: 4px; color: #ffffff; display: inline-block; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; line-height: 50px; text-align: center; text-decoration: none; width: 200px; -webkit-text-size-adjust: none;" title="Activer maintenant" href="{{ $_activation_url }}" target="_blank" rel="noopener">Activer maintenant</a> <br>
<br>
URL : {{ $_activation_url }} <br>
<br>
@include('mail._footer-html')
