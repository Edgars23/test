<?php
class ModelCheckoutNovap{

    private $API_KEY = '7b47b63324d1e614ff251e4214638a69';

    private function sendRequest($xml) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://orders.novaposhta.ua/xml.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function getOfficess() {
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                <file>
                <auth>{$this->API_KEY}</auth>
                <citywarehouses/>
                </file>";


        if (!empty($offices)) {
            return $offices;
        } else {
            $offices = $this->sendRequest($xml);

            return $offices;
        }//if
    }

    public function getOfficesByCity($city) {
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                <file>
                <auth>{$this->API_KEY}</auth>
                <warenhouse/>
                <filter>$city</filter>
                </file>";

        if (!empty($cities)) {
            return $cities;
        } else {
            $cities = $this->sendRequest($xml);

            return $cities;
        }//if
    }

}

