<?php
//public function getall(){
//    //return self::all()->//toArray();
//}
namespace App\Curd;

use Illuminate\Database\Eloquent\Model;

class Defaults extends Model
{
    //
    public $table = 'default';
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getall(){
        return self::all()->toArray();
    }
    public function adddata($data){
        return (new self())->insert($data);
    }
}
