<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\State as State;
use App\Lga as Lga;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $filename = base_path('public/nigeria.json');
        $data = json_decode(file_get_contents($filename), TRUE);
        foreach($data as $key => $value){
            $state = State::create(
                array(
                    'capital'           => $value['capital'],
                    'population'        => $value['population'],
                    'area'              => $value['land_area'],
                    'nickname'          => $value['nick_name'],
                    'date_created'      => $value['date_created'],
                    'preceding_entity'  => $value['preceding_entity'],
                    'lg_count'          => $value['lg_count']
                )
            );

            for ($i=1; $i < count($value['lga']) ; $i++) {
                $lga = Lga::create(
                    array(
                        'state_id' => $state->id,
                        'lg_name'  => $value['lga'][$i]
                    )
                );
            }

        }

        // $this->call('UserTableSeeder');

        Model::reguard();
    }
}
