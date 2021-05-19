<?php

namespace App\Core;

class Request
{
    public function getPath()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri1= explode('/', $uri);
        if(count($uri1) > 2 && !empty($uri1[2])) {
            return [
                'uri' => $uri1[1],
                'id'  => $uri1[2]
            ];
        } else if(empty($uri1[2])) {
            return '/'.$uri1[1];
        }
        return $uri;
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    
    public function getData()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri1= explode('/', $uri);
        if(count($uri1) > 2) {
            return $uri1[2];
        
        }
        return NULL;
    }
}