<?php

namespace App\myClass;

use App\User;

class WebServiceApi
{

    public  $version;
    public  $version_list = [1];

    public  $api_key;
    public  $email;

    public  $user;

    public $errorsTiers = null;

    function __construct(string $version, string $api_key, string $email)
    {
        $this->version = $version;
        $this->api_key = $api_key;
        $this->email = $email;
    }

    public function auth(): array
    {
        if ($this->checkVersion() == false) {

            return [
                'statu' => false,
                'code' => 100,
            ];
        } elseif (empty($this->api_key)) {

            return [
                'statu' => false,
                'code' => 101,
            ];
        } elseif (empty($this->email)) {

            return [
                'statu' => false,
                'code' => 102,
            ];
        }

        $this->user = User::where('uuid', $this->api_key)->where('email', $this->email)->first();

        if (empty($this->user)) {

            return [
                'statu' => false,
                'code' => 103,
            ];
        } else {

            return [
                'statu' => true,
                'code' => null,
            ];
        }
    }

    public function checkVersion(): bool
    {
        if ($this->version == null or !in_array($this->version, $this->version_list)) {
            return false;
        } else {
            return true;
        }
    }


    public function SubdomainList(string $user)
    {

        if ($this->version == 1) {

            // Verification de $user
            if (empty($user)) {
                return $this->response(110);
            }

            //  Verification de l'existance de l'hebergement
            $hebergement = $this->user->getHebergement->where('user', $user)->first();
            if (empty($hebergement)) {
                return $this->response(111);
            }

            //  Verification de l'existance du serveur
            $serveur = $hebergement->getServeur;
            if (empty($serveur)) {
                return $this->response(112);
            }

            $CwpApi = new CwpApi($serveur->cwp_api_url, $serveur->cwp_api_key);
            $result = $CwpApi->SousDomaineList($user);

            // Affichage des reponses
            if (isset($result->status) && $result->status == 'OK') {

                $data = is_array($result->msj) ? $result->msj : [];
                return $this->response(800, $data);
            } elseif (isset($result->status) && $result->status == 'Error') {

                $this->errorsTiers = 'Cwp : ' . $result->msj;
                return $this->response(900);
            }
        }
    }

    public function SubdomainCreate(string $user, string $name, string $path)
    {
        if ($this->version == 1) {

            // Verification de $user
            if (empty($user)) {
                return $this->response(110);
            }

            // Verification $name
            if (empty($name)) {
                return $this->response(113);
            }

            // Verification $path
            if (empty($path)) {
                return $this->response(114);
            }

            // Verification de l'existance de l'hebergement
            $hebergement = $this->user->getHebergement->where('user', $user)->first();
            if (empty($hebergement)) {
                return $this->response(111);
            }

            // Verification de l'existance du serveur
            $serveur = $hebergement->getServeur;
            if (empty($serveur)) {
                return $this->response(112);
            }

            $CwpApi = new CwpApi($serveur->cwp_api_url, $serveur->cwp_api_key);
            $result = $CwpApi->SousDomaineCreate([
                'user' => $user,
                'name' => $name,
                'path' => $path,
            ]);

            // Affichage des reponses
            if (isset($result->status) && $result->status == 'OK') {

                $data = isset($result->msj) && is_array($result->msj) ? $result->msj : [];
                return $this->response(800, $data);
            } elseif (isset($result->status) && $result->status == 'Error') {

                $this->errorsTiers = 'Cwp : ' . $result->msj;
                return $this->response(900);
            }
        }
    }

    public function SubdomainDelete(string $user, string $name)
    {
        if ($this->version == 1) {

            // Verification de $user
            if (empty($user)) {
                return $this->response(110);
            }

            // Verification $name
            if (empty($name)) {
                return $this->response(113);
            }

            // Verification de l'existance de l'hebergement
            $hebergement = $this->user->getHebergement->where('user', $user)->first();
            if (empty($hebergement)) {
                return $this->response(111);
            }

            // Verification de l'existance du serveur
            $serveur = $hebergement->getServeur;
            if (empty($serveur)) {
                return $this->response(112);
            }

            $CwpApi = new CwpApi($serveur->cwp_api_url, $serveur->cwp_api_key);
            $result = $CwpApi->SousDomaineDelete([
                'user' => $user,
                'name' => $name,
            ]);

            // Affichage des reponses
            if (isset($result->status) && $result->status == 'OK') {

                $data = isset($result->msj) && is_array($result->msj) ? $result->msj : [];
                return $this->response(800, $data);
            } elseif (isset($result->status) && $result->status == 'Error') {

                $this->errorsTiers = 'Cwp : ' . $result->msj;
                return $this->response(900);
            }
        }
    }

    public function response($code, $result = [])
    {
        return response()->json([
            'result' => $result,
            'success' => is_int($code) ? false : true,
            'errors' => [
                'code' => $code,
                'message' => is_int($code) ? self::errors($code) : null,
            ],
            'messages' => [],
        ], 200);
    }

    public function errors($code): string
    {
        $errors = [
            // Version api
            100 => "Invalid API version",

            // Authentification : 101 - 109
            101 => "Api key missing",
            102 => "Missing email",
            103 => "API key or wrong email",

            // Check parametre : 110 - 129
            110 => "Invalid username",
            111 => "This username does not exist on your account",
            112 => "Could not find the server",
            113 => "Invalid name",
            114 => "Invalid path",

            // -------
            // 101 => "Missing email",


            // Error serveur tiers
            800 => "Successful operation",

            // Error serveur tiers
            900 => $this->errorsTiers,
        ];

        return $errors[$code] ?? die("Incorrect error code");
    }
}
