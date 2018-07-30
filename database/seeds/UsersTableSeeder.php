<?php



use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(sice\User::class,80)->create()->each(function($u){
            $rol=\sice\Models\Role::where('name',$u->type)->get();
            $faker=Faker\Factory::create('es_ES');
            $u->attachRole($rol[0]);
            $u->docente()->create([
                'centrotrabajo_id'=>$faker->randomElement($array=array(1,2,3,4,5,6,7,8,9,10)),
                'rfc'=>$faker->unique()->isbn13,
                'curp'=>$faker->unique()->isbn13.'1a2s3',
                'nombre'=>$faker->firstName,
                'appaterno'=>$faker->lastName,
                'apmaterno'=>$faker->lastName,
                'domicilio'=>$faker->address,
                'localidad'=>$faker->city,
                'municipio'=>$faker->citySuffix,
                'telefono'=>$faker->phoneNumber,
                'celular'=>$faker->phoneNumber,
                'actualizado'=>'1'
            ]);
        });


    }
}
