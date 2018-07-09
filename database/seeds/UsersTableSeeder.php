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
        factory(sice\User::class,10)->create()->each(function($u){
            $rol=\sice\Models\Role::where('name',$u->type)->get();
            $u->attachRole($rol[0]);
        });


    }
}
