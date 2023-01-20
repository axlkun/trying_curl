<?php

// namespace App\Classes;

// class Curl{
//     private $url;
//     private $option;
//     private $handler;
//     private $response;

//     public function __construct($url, $option = null)
//     {
//         $this->url = $url;
//         $this->option = is_null($option) ? CURLOPT_URL : $option;
//     }

//     public function init(){
//         $this->handler = curl_init();
//         return $this;
//     }

//     public function setOption($option = null,$value = null){
//         curl_setopt($this->handler,is_null($option) ? $this->option : $option,is_null($value) ? $this->url : $value);
//         return $this;
//     }

//     public function execute(){
//         return curl_exec($this->handler);
//     }

//     public function buildQuery(array $array){
//         curl_setopt($this->handler,CURLOPT_POSTFIELDS,http_build_query($array));
//         return $this;
//     }

//     public function decode(){
//         $this->response = json_decode($this->execute(),true);
//         return $this;
//     }

//     public function fetch(){
//         return json_decode(json_encode($this->response));
//     }

//     public function close(){
//         curl_close($this->handler);
//         return $this;
//     }
// }

namespace App\Classes;

class Curl
{
    private $url;
    private $handler;
    private $response;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function init()
    {
        $this->handler = curl_init();
        return $this;
    }

    public function setOption($option, $value = null)
    {
        curl_setopt($this->handler, $option, $value);
        return $this;
    }

    public function execute()
    {
        $this->response = curl_exec($this->handler);

        if (curl_error($this->handler)) {
            echo curl_error($this->handler);
        }
        return $this;
    }

    public function buildQuery(array $array)
    {
        curl_setopt($this->handler, CURLOPT_POSTFIELDS, http_build_query($array));
        return $this;
    }

    public function decode()
    {
        $this->response = json_decode($this->response, true);
        echo "<br>";
        var_dump($this->response);
        echo "</br>";
        return $this;
    }

    public function fetch()
    {
        echo "<br>";
        var_dump($this->response);
        echo "</br>";
        return $this->response;
    }

    public function close()
    {
        curl_close($this->handler);
        return $this;
    }
}
