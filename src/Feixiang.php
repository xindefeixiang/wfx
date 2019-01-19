<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2019/1/19
 * Time: 14:25
 */
namespace Xindefeixiang;
use Illuminate\Support\Manager;
use InvalidArgumentException;

class Feixiang{
    public function __construct()
    {
        echo 123;
    }
    public static function name(){
        return '吴飞翔';
    }
}