<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Lga;
/**
 * Created by PhpStorm.
 * User: OluwadamilolaAdebayo
 * Date: 10/30/15
 * Time: 10:58 AM
 */
class State extends Model
{
    protected $table = 'states';

    public function lga(){
        return $this->hasMany('App\Lga');
    }

}