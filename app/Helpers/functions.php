<?php 

use App\Enums\SuporteStatus;

if(!function_exists('getStatusSuporte')){
    function getStatusSuporte(string $status): string 
    {
        return SuporteStatus::fromValue($status);
    }
}