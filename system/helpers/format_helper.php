<?php

    //Format Date
    function formatDate($date) {

        return date("F j, Y, g:i a", strtotime($date));
    }

    //URL Format
    function urlFormat($str) {

        //Strip out all whitespace
        $str = preg_replace('/\s*/', '', $str);
        //Convert string to lowercase
        $str = strtolower($str);
        //Url encode
        $str = urlencode($str);
        
        return $str;
    }