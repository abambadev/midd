Bonjour {{ $first_name.' '.$last_name }}, <br>
<br>
Votre hébergement {{ config('app.name') }} a été créé avec succès. <br>
Veuillez trouver ci-dessous les paramètres de connexion : <br>
<br>
<b># Parametres Panel</b><br>
Lien : {{$panel_link}} <br>
User : {{$panel_username}} <br>
Password : {{$panel_password}} <br>
<br>
<br>
<b># Parametres FTP</b> <br>
HOST : {{$params_host["ftp"]["host"]}} <br>
PORT : {{$params_host["ftp"]["port"]}} <br>
USER : {{$panel_username}} <br>
PASSWORD : {{$panel_password}} <br>
<br>
<b># Parametres Base de donnee MySql</b> <br>
HOST : localhost <br>
PORT : {{$params_host["database"]["port"]}} <br>
PHP MY ADMIN : {{$params_host["database"]["phpmyadmin"]}} <br>

<br>
<b># Parametres SMTP</b> <br>
HOST : {{$params_host["smtp"]["host"]}} <br>
PORT : {{$params_host["smtp"]["port"]}} <br>
<br>
<b># Parametres POP3</b> <br>
HOST : {{$params_host["pop3"]["host"]}} <br>
PORT : {{$params_host["pop3"]["port"]}} <br>
<br>
{!! ($host_expiration_date === NULL) ? 'Date d\'expiration illimitee': 'Votre hébergement expire le <b style="color: red">'. date('d/m/Y', strtotime($host_expiration_date)) .'</b>' !!}
<br>
<br>

@include('mail._footer-html')
