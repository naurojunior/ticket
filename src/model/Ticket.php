<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {
    protected $fillable = ['id_user','id_emitter','code'];
    
    public static function generateCode(){
         $letter = range('a','z');
         $letter = $letter[rand(0, 25)].$letter[rand(0, 25)].$letter[rand(0, 25)].$letter[rand(0, 25)];
         $number = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
         return strtoupper($letter).'-'.$number;
    }
    
}
