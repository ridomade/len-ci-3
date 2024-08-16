<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

    private $api_url = 'http://localhost:8080/lokasi';

    public function get_all() {
        $response = @file_get_contents($this->api_url);
        if ($response === FALSE) {
            return null;
        }
        return json_decode($response, true);
    }

    public function get_by_id($id) {
        $url = $this->api_url . '/' . $id;
        $response = @file_get_contents($url);
        if ($response === FALSE) {
            return null;
        }
        return json_decode($response, true);
    }
    

    public function add($data) {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ),
        );
        $context  = stream_context_create($options);
        $response = @file_get_contents($this->api_url, false, $context);
        if ($response === FALSE) {
            return null;
        }
        return json_decode($response, true);
    }

    public function update($id, $data) {
        $url = $this->api_url . '/' . $id;
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'PUT',
                'content' => json_encode($data),
            ),
        );
        $context  = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);
        if ($response === FALSE) {
            return null;
        }
        return json_decode($response, true);
    }

    public function delete($id) {
        $url = $this->api_url . '/' . $id;
        $options = array(
            'http' => array(
                'method'  => 'DELETE',
            ),
        );
        $context  = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);
        if ($response === FALSE) {
            return null;
        }
        return $response;
    }
}
