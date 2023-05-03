<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
 public function testAccesAdminwithGuestRole()
 {
   //simuler / faire une requete vers admin
   $response = $this->get('/admin/article');
   $response->assertRedirect('/login');
 }
public function testAccesAdminwithAdminRole()
{

    $admin=Auth::loginUsingId(1);//recuperer admin avec id = 1
    //dd($admin);
    $this->actingAs($admin);// bien préciser que l'admin fait la requete $this->get('/admin/article')
    
    $response = $this->get('/admin/article');
    $response->assertStatus(200);
    //dd($response);
    //dd($response->getStatusCode()); status de reponse est 200
}

}
