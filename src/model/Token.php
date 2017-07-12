<?php
/**
 * Created by PhpStorm.
 * User: Nauro
 * Date: 12/07/2017
 * Time: 01:04
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Token extends Model
{

    protected $fillable = ['user_id','token','expires'];

    public static function generate(){
        return uniqid(rand(), true);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}