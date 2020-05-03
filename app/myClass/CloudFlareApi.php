<?php

namespace App\myClass;

/**
 *
 */

class CloudFlareApi
{

    private $url;
    private $email;
    private $key;

    function __construct($url, $email, $key)
    {
        $this->url = $url;
        $this->email = $email;
        $this->key = $key;
    }

    
    public function curl($action, $type, $param = null, $data = null, $headers = [])
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url . $type . '/' . $param);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $action);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        if ($action == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
        }

        $headers = [
            'X-Auth-Email: ' . $this->email,
            'X-Auth-Key: ' . $this->key,
            'Content-Type: application/json',
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $RespCurl = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);

        return json_decode($RespCurl);
    }

    public function UserListe()
    {
        return $this->curl('GET', 'user');
    }

    public function AccountsListe($page = 1)
    {
        $page = '&page=' . $page;
        return $this->curl('GET', 'accounts', $page);
    }

    public function ZoneListe($page = 1, $name = null, $status = null)
    {
        $url = null;
        is_int($page) && $page <> 0 ? $url = $url . '&page=' . $page : null;
        $name <> null && is_string($name) ? $url = $url . '&name=' . $name : null;
        $status <> null && is_string($status) ? $url = $url . '&status=' . $status : null;
        $url = $url . '&per_page=50';
        return $this->curl('GET', 'zones', $url);
    }

    public function ZoneDetail($zone_id)
    {
    }

    public function ZoneCreate($domaine)
    {
        $account = $this->AccountsListe();

        $data = json_encode(
            [
                'name' => $domaine,
                'account' => [
                    'id' => $account->result[0]->id,
                    'name' => $account->result[0]->name,
                ],
                'jump_start' => false
            ]
        );

        return $this->curl('POST', 'zones', null, $data, []);
    }

    public function ZoneDelete($zone_id)
    {
        return $this->curl('DELETE', 'zones', $zone_id);
    }

    public function ZoneRecordsListe($zone_id, $type = null, $name = null, $content = null)
    {
        $url = null;

        $type <> null && is_string($type) ? $url = $url . '&type=' . $type : null;
        $name <> null && is_string($name) ? $url = $url . '&name=' . $name : null;
        $content <> null && is_string($content) ? $url = $url . '&content=' . $content : null;

        return $this->curl('GET', 'zones', $zone_id . '/dns_records' . $url);
    }

    public function ZoneRecordsCreate(string $zone_id, string $type, string $name, string $content, int $priority, bool $proxied = false)
    {
        $data = json_encode(
            [
                'type' => $type,
                'name' => $name,
                'content' => $content,
                'priority' => (int) $priority,
                'proxied' => $proxied,
            ]
        );

        return $this->curl('POST', 'zones', $zone_id . '/dns_records', $data, []);
    }

    public function ZoneRecordsEdite(string $zone_id, string $record_id, string $type, string $name, string $content, int $priority, bool $proxied = false)
    {
        $data = json_encode(
            [
                'type' => $type,
                'name' => $name,
                'content' => $content,
                'priority' => (int) $priority,
                'ttl' => 120,
                'proxied' => $proxied,
            ]
        );

        return $this->curl('PUT', 'zones', $zone_id . '/dns_records/' . $record_id, $data, []);
    }

    public function ZoneRecordsDelete($zone_id, $record_id)
    {
        return $this->curl('DELETE', 'zones', $zone_id . '/dns_records/' . $record_id, null, []);
    }

    public function CachePurge($zone_id)
    {
        $data = json_encode(
            [
                'purge_everything' => true,
            ]
        );
        return $this->curl('POST', 'zones', $zone_id . '/purge_cache', $data, []);
    }
}
