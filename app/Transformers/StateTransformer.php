<?php
/**
 * Created by PhpStorm.
 * User: OluwadamilolaAdebayo
 * Date: 11/5/15
 * Time: 2:32 PM
 */

namespace App\Transformers;

use App\State;
use League\Fractal\TransformerAbstract;

class StateTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['lgas'];

    public function transform(State $state){
        return [
            "id"                => $state->id,
            "state_name"        => $state->state,
            "capital"           => $state->capital,
            "population"        => $state->population,
            "land_area"         => $state->area,
            "nickname"          => $state->nickname,
            "date_created"      => $state->date_created,
            "preceding_entity"  => $state->preceding_entity,
            "lg_count"          => $state->lg_count
        ];
    }

    public function includeLgas(State $state){
        $lga = $state->lga;
        return $this->collection($lga, new LgaTransformer);
    }
}