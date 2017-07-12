<?php
/**
 * Created by PhpStorm.
 * User: Nauro
 * Date: 11/07/2017
 * Time: 01:58
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $guarded = ['id'];

    public function tokens(){
        return $this->hasMany('App\Token');
    }


}