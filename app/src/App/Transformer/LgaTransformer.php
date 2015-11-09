<?php
/**
 * Created by PhpStorm.
 * User: OluwadamilolaAdebayo
 * Date: 11/5/15
 * Time: 2:58 PM
 */

namespace Transformer\Nigeria;

use App\Lga;
use League\Fractal\TransformerAbstract;

class LgaTransformer extends TransformerAbstract
{
    public function transformer(Lga $lga){
        return [
            'id'            => $lga->id,
            'lg_name'       => $lga->lg_name
        ];
    }
}