<?php
namespace cloud2006;

class Urlgrabber
{
    public $str_content,
              $url,
              $link_array;
    /**
     * copy adress to variable
     */
    function __construct ($url)
    {
        $this->url = $url;
    }

    /**
     * working with curl
     */
    public function curl_worker()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $this->str_content = $result; 
    }

    public function url_is_external($test_url)
    {
      if($test_url == $this->url) {
        return true; 
      }
      else {
        return false;
      }
    }

    public function url_array_builder()
    {
      $pattern ="#https?:\/\/([\w\.]+)\.([a-z]{2,6}\.?)(\/[\w\.]*)*\/?#";
        preg_match_all($pattern, $this->str_content, $links, PREG_SET_ORDER);
        return $links;
    }

    public function init()
    {
      $this->curl_worker();
      return $this->str_content;

    }

}