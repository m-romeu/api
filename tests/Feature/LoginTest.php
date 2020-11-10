<?php

namespace Tests\Feature;

use Tests\TestCase;
use Laravel\Passport\Passport;
use App\Models\User;
use App\Models\Office;

class LoginTest extends TestCase
{
    
    /**
     * @test
     */
    public function test_list() {

        $this->signIn();       
        $response = $this->json('GET', '/api/offices');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_list_one() {

        $this->signIn();       
        $response = $this->json('GET', '/api/offices',["id" => "1"]);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_creation() {

        $this->signIn();   
        
        $params = [            
            "name" => 'Example title',
            "address" => 'Example address',
        ];     
        
        $response = $this->json('POST', '/api/offices', $params);        
        $response->assertStatus(201);
      
    }
     /**
     * @test
     */
    public function test_update() {
       
        $this->signIn();         
        $params = [       
            "name" => 'Title updated',
            "address" => 'Address updated'          
        ];        
           
        $response = $this->json('PUT', '/api/offices/1',$params);      
        $response->assertStatus(200);
      
    }
     /**
     * @test
     */
    public function test_delete() {

        $this->signIn();       
        $response = $this->json('delete', '/api/offices/1');   
        
        $response->assertStatus(200);
    }

    public function signIn(){            
       
        $this->user = Passport::actingAs(
            User::factory()->create()
        );     
    }   
   
}
