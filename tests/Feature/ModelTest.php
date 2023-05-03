<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



class ModelTest extends TestCase
{

    public function testValideRegistre()
    {
        $faker = Factory::create();
        $email = $faker->unique()->email;
        $ehsb = User::count();
       $resp=$this->post('/register',[
            'email'=> $email,
            'name'=>'test',
            'password'=>'password',
            'password_confirmation'=>'password'

        ]);

        $newcount=User::count();
       //dd($ehsb ,$newcount);
       $this->assertNotEquals($ehsb,$newcount);
    }
    public function testinvalideRegistre()
    {
        $resp = $this->post('/register',[
            'email'=> '',
            'name'=>'test',
            'password'=>'password',
            'password_confirmation'=>'password'
        ]);
        //dd($resp->getStatusCode());  302
        $resp->assertSessionHasErrors();//lorsque il y a des erreurs de validation,msg d erruer stocker dans la seesion
        //est ce qu il ya des erreurs au niveau de session

        //dd(session('errors'));
    }

}
