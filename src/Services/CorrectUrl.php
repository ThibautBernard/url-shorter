<?php

namespace App\Services;

class CorrectUrl
{
    private $url;
    
    public function __construct($url)
    {
        $this->url = $url;
    }
    public function isUrl()
    {
        if(preg_match('/^https?:\/\//', $this->url))
        {
            return true;
        }
        else{return 'Not an Url';}
    }

}