<?php 

namespace App\Enums;

enum SuporteStatus: string
{
    case A = "Open";
    case P = "Pending";
    case C = "Closed";

    public static function fromValue(string $name): string 
    {
        foreach(self::cases() as $status){
            if($name === $status->name){
                return $status->value;
            }
        }

        throw new \ValueError("$name is not a valid");
    }
}