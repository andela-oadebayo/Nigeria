<?php
/**
 * Created by PhpStorm.
 * User: OluwadamilolaAdebayo
 * Date: 10/30/15
 * Time: 11:05 AM
 */


namespace App;
use Illuminate\Database\Eloquent\Model;


class Lga extends Model
{
    protected $table = 'lgas';

    public function state(){
        return $this->belongsTo('App\State');
    }

}