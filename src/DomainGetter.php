<?php
/**
 * Created by PhpStorm.
 * User: paul
 * Date: 14.04.15
 * Time: 9:38
 */

namespace cloud2006;


class DomainGetter
{
    public $domain;
    function __construct()
    {
        $this->acceptor();
    }
    public function checker()
    {
        if(!empty($_GET)){
            return true;
        }else return false;
    }

    public function acceptor()
    {
        if($this->checker()){
            return $this->domain = $_GET['domain'];
        }

    }
}