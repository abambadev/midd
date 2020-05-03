Bonjour {{ $first_name.' '.$last_name }},

Votre hébergement {{ config('app.name') }} a été créé avec succès.
Veuillez trouver ci-dessous les paramètres de connexion :

# Parametres Panel
Lien : {{$panel_link}}
User : {{$panel_username}}
Password :{{$panel_password}}

# Parametres FTP
HOST : {{$params_host["ftp"]["host"]}}
PORT : {{$params_host["ftp"]["port"]}}
USER : {{$panel_username}}
PASSWORD : {{$panel_password}}

# Parametres Base de donnee MySql
HOST : localhost
PORT : {{$params_host["database"]["port"]}}
PHP MY ADMIN : {{$params_host["database"]["phpmyadmin"]}}

# Parametres SMTP
HOST : {{$params_host["smtp"]["host"]}}
PORT : {{$params_host["smtp"]["port"]}}

# Parametres POP3
HOST : {{$params_host["pop3"]["host"]}}
PORT : {{$params_host["pop3"]["port"]}}

{{ ($host_expiration_date === NULL) ? 'Date d\'expiration illimitee': 'Votre hébergement expire le '. date('d/m/Y', strtotime($host_expiration_date)) }}

@include('mail._footer-text')
