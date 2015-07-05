<?php
namespace cloud2006;

class Urlgrabber
{
    public $str_content,
           $url,
           $link_array,
           $ext_link_cnt = 0,
           $int_link_cnt = 0,
           $host;
    /**
     * copy adress to variable
     * @param string $url
     */
    function __construct ($url)
    {
        $this->url = $url;
        $this->host_getter($url);
    }

    public function host_getter($url)
    {
        $pattern ="#(?!w)[A-Za-z0-9-]{1,63}\.[A-Za-z]{2,6}#";
        preg_match($pattern, $url, $arr_host);
        $this->host = $arr_host[0];
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
      if(substr_count($test_url, $this->host) > 0) {
        return false; 
      }
      else {
        return true;
      }
    }

    public function url_array_builder()
    {
      $pattern ="#https?:\/\/([\w\.]+)\.([a-z]{2,6}\.?)(\/[\w\.]*)*\/?#";
        preg_match_all($pattern, $this->str_content, $links, PREG_SET_ORDER);
        return $links;
    }

    public function disp($mode = 'ext')
    {
      $links = $this->link_array;
        /**
         * building table with links from site;
        */
        if($mode == 'ext'){
            foreach ($links as $value) {
              if($this->url_is_external($value[0])){
                echo '<tr><td>' . $value[0] . '</td></tr>';
                $this->ext_link_cnt++;
              }
            }
        }elseif($mode == 'int'){
            foreach ($links as $value) {
                if(!$this->url_is_external($value[0])){
                    echo '<tr class="info"><td>' . $value[0] . '</td></tr>';
                    $this->int_link_cnt++;
                }
            }
        }
    }

    public function init()
    {
      $this->curl_worker();
      $this->link_array = $this->url_array_builder();
      return $this->str_content;

    }

}