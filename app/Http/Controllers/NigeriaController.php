<?php
/**
 * Created by PhpStorm.
 * User: OluwadamilolaAdebayo
 * Date: 11/9/15
 * Time: 11:46 AM
 */

namespace App\Http\Controllers;

use App\Lga;
use App\State;
use App\Transformers\StateTransformer;
use App\Transformers\LgaTransformer;
use League\Fractal\Manager;


class NigeriaController extends  ApiController{
    protected $state;
    protected $lga;
    protected $fractal;

    function __construct(State $state, Lga $lga, Manager $fractal){
        $this->state = $state;
        $this->lga = $lga;
        $this->fractal = $fractal;
    }

    public function index(StateTransformer $stateTransformer){
        $response = ["Service" => "Nigeria States, Capital and LGAs"];
        $data =  $this->paginate($this->state);
        $current = $data['current'];
        $per_page = $data['per_page'];
        $states = $this->state
            ->limit($per_page)
            ->skip($current)
            ->get();
        $prev = ['prevPage' => $this->getUri().'?cursor='.$data['prev'].'&number='.$per_page ];
        $next = ['nextPage' => $this->getUri().'?cursor='.$data['next'].'&number='.$per_page];
        $merged = array_merge($response, $prev, $next);
        return $this->respondWithCollection($states, $stateTransformer,$merged);
    }

    public function getUri(){
        $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
        return 'http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];
    }
}