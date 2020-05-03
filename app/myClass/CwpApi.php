<?php

namespace App\myClass;

/**
 *
 */

class CwpApi
{

    private $url;
    private $key;

    function __construct($url, $key)
    {
        $this->url = $url;
        $this->key = $key;
    }

    //add, udp, del, list, susp, unsp
    public function curl($type, $action, $data = [])
    {

        $data['key'] = $this->key;
        $data['action'] = $action;
        $url = $this->url . $type;

        // if (strpos($this->url, 'mac1')) {

        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, $url);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        //     $response = curl_exec($ch);

        //     if (curl_errno($ch)) {
        //         die('Error:' . curl_error($ch));
        //     }
        //     curl_close($ch);
        // } else {

        $response = file_get_contents(
            'http://test.citrade.net?' . http_build_query(
                [
                    'url' => $url,
                    'data' => http_build_query($data),
                ]
            )
        );
        // }

        $check_json = json_decode($response);

        if ($check_json <> null) {

            return $check_json;
        } else {

            $tmp1 = explode('{', (string) $response)[1];
            $tmp2 = explode('}', (string) $tmp1)[0];
            $check_json = json_decode('{' . $tmp2 . '}');

            if ($check_json <> null) {
                return $check_json;
            }
        }
    }

    //----------------------- Package -------------------------
    public function PackagesList()
    {
        return $this->curl('packages', 'list');
    }

    public function PackagesCreate(array $data)
    {
        return $this->curl('packages', 'add', $data);
    }

    public function PackagesUpdate(array $data)
    {
        return $this->curl('packages', 'udp', $data);
    }

    public function PackagesDelete(array $data)
    {
        return $this->curl('packages', 'del', $data);
    }

    //------------------------- Account ---------------------

    public function AccountList()
    {
        return $this->curl('account', 'list');
    }

    public function AccountCreate(array $data)
    {
        return $this->curl('account', 'add', $data);
    }

    public function AccountUpdate(array $data)
    {
        return $this->curl('account', 'udp', $data);
    }

    public function AccountPassword(array $data)
    {
        return $this->curl('changepass', 'udp', $data);
    }

    public function AccountActive(array $data)
    {
        return $this->curl('account', 'unsp', $data);
    }

    public function AccountInactive(array $data)
    {
        return $this->curl('account', 'susp', $data);
    }

    public function AccountDelete(array $data)
    {
        return $this->curl('account', 'del', $data);
    }

    //--------------------------- Domaine -----------------------

    public function DomaineList($user)
    {
        return $this->curl('admindomains', 'list', ['user' => $user, 'type' => 'domain']);
    }

    public function DomaineCreate(array $data)
    {
        return $this->curl(
            'admindomains',
            'add',
            [
                'user' => $data['user'],
                'type' => 'domain',
                'name' => $data['name'],
                'path' => '/public_html/' . $data['name'] . $data['path'],
                'autossl' => 1,
            ]
        );
    }

    public function DomaineDelete(array $data)
    {
        return $this->curl(
            'admindomains',
            'del',
            [
                'user' => $data['user'],
                'type' => 'domain',
                'name' => $data['name'],
            ]
        );
    }

    //--------------------------- Sous-Domaine -----------------------

    public function SousDomaineList($user)
    {
        return $this->curl('admindomains', 'list', ['user' => $user, 'type' => 'subdomain']);
    }

    public function SousDomaineCreate(array $data)
    {
        return $this->curl(
            'admindomains',
            'add',
            [
                'user' => $data['user'],
                'type' => 'subdomain',
                'name' => $data['name'],
                'path' => '/public_html/' . $data['name'] . $data['path'],
                'autossl' => 1,
            ]
        );
    }

    public function SousDomaineDelete(array $data)
    {
        return $this->curl(
            'admindomains',
            'del',
            [
                'user' => $data['user'],
                'type' => 'subdomain',
                'name' => $data['name'],
            ]
        );
    }
}
