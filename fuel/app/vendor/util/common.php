<?php
namespace Util;
class Common
{
       public static function GetCategoryName($categoryCD) {
        switch ($categoryCD) {
            case "1":
                $name = "医療分野";
                break;
            case "2":
                $name = "医療情報分野";
                break;
            case "3":
                $name = "情報分野";
                break;
            default:
                $name = "";
                break;
        }
        
        return $name;
    }
}

