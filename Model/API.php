<?php

/**
 * Created by IntelliJ IDEA.
 * User: TD1510ZA
 * Date: 01/03/2017
 * Time: 14:56
 */
class API
{
    private $_url;
    private $curl;
    public function setUrl ($pUrl)
    {
        $this->_url = $pUrl;
        return $this;
    }
    public function __construct()
    {
        $this->_url = 'http://api.dila.fr/opendata/api-boamp/annonces/';
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_COOKIESESSION, true);
    }

    public function closeCurl()
    {
        curl_close($this->curl);
    }

    public function get ($query)
    {
        return $this->_launch($this->_makeUrl($query));
    }

    protected function _makeUrl($queryString)
    {
        return $this->_url
        .trim($queryString);
    }

    protected function _launch ($pUrl)
    {
        try
        {
            curl_setopt($this->curl,CURLOPT_URL,$pUrl);
            $result = curl_exec($this->curl);
            $info = curl_getinfo($this->curl);
            return array('content'=>json_decode($result, true), 'header'=>$info);
        } catch (Exception $e)
        {
            var_dump($e);
            return false;
        }
    }

    public function getAnnonce($idweb, $stock)
    {
        $criterion = $stock."/".trim($idweb);
        return $this->get($criterion);
    }

    public function getAnnonces($params = [])
    {
        $return = array();
        foreach ($params as $item)
        {
            array_push($return, array($item['value'] => $this->getAnnonce($item['value']), $this->getStock($item['schema'])));
        }

        return $return;
        $criterion = $stock."/".trim($idweb);
        return $this->get($criterion);
    }

    public function getAll($query)
    {
        $criterion = "search?criterion=".trim($query);
        return $this->get($criterion);

    }

    public function getStock($schema)
    {
        $pos = strpos($schema, '.xsd');
        $stock = '';
        if ($pos)
        {
            $stock = substr($schema,$pos-4,4);
        }
        return $stock;
    }
}