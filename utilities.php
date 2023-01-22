<?php

if (!function_exists('dd')){
    function dd($data, $die = true){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        
        if ($die){
            die();
        }
    }
}

if (!function_exists('ajax_response')){
    function ajax_json($data){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        exit();
    }
}
