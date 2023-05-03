<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;
use App\Models\User;



class NavBarPagesTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;
   
    public function test_home_tab(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function test_catering_tab(): void
    // {
    //     $response = $this->get('/catering');

    //     $response->assertStatus(200);
    // }

    // public function test_reservations_tab(): void
    // {
    //     $response = $this->get('/reservations');

    //     $response->assertStatus(200);
    // }

    public function test_about_tab(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function test_order_tab_if_has_user(): void
    {   
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/order');

        $response->assertStatus(200);
      
    }

    public function test_order_tab_if_no_user(): void
    {
        $response = $this->get('/order');

        $response->assertStatus(302); // checks if redirect occured
        $response->assertRedirect('/login');

    }

    public function test_contact_tab(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    public function test_products_tab(): void
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
    } 

    public function test_login_tab_if_no_user(): void
    {

        $this->assertTrue(Route::has('login'));
    }

    public function test_login_tab_if_has_user(): void
    {
        $user = User::factory()->create();
      
        $response = $this->actingAs($user)
            ->get('/login');

        $response->assertRedirect('/');
    }


}
