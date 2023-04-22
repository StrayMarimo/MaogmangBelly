<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_products(): void
    {
        $user = User::factory()->create();

        $expectedProducts = Product::factory()->count(10)->create();
       

        $expectedTrendingProducts = $expectedProducts->filter(function ($product) {
            return $product->is_trending;
        });

        $expectedFeaturedProducts = $expectedProducts->filter(function ($product) {
            return $product->is_featured;
        });

        $response = $this->actingAs($user)
            ->get(route('products'));
    

        $response->assertViewIs('layouts.products.products')
            ->assertViewHas('products', $expectedProducts)
            ->assertViewHas('isAdmin', $user['is_admin']);
        
        foreach ($expectedProducts as $product) {
            $response->assertSee($product['name']);
            $response->assertSee($product['description']);
        }
    }

    public function test_get_product_details(): void
    {
        $category = Category::factory()->create();
        $productData = [
            'name' => 'Test Product',
            'description' => 'This is a test product',
            'price' => 19.99,
            'price_10pax' => 179.99,
            'price_20pax' => 349.99,
            'stock' => 100,
            'total_sold' => 0,
            'gallery' => 'test.jpg',
            'is_trending' => true,
            'is_featured' => false,
            'category_id' => $category->id,
        ];

        $product = Product::factory()->create($productData);
        $response = $this->get(route('product', ['id' => $product->id]));

        $response->assertStatus(200);
    }

    public function test_searching_for_products(): void
    {
        // Create some categories and products in the database
        $categories = Category::factory()->count(2)->create();
        $products = Product::factory()->count(10)->create([
            'category_id' => $categories->random()->id,
        ]);

        $searchString = $products[0]->name . substr(0, 2);
        $expectedProducts = Product::where('name', 'like', '%' . $searchString . '%')
            ->get();

        $response = $this->get(route('search', ['query' => $searchString]));

        $response->assertViewIs('layouts.search.search')
            ->assertViewHas('products', $expectedProducts); // Pass array to assertViewHas()

        foreach ($expectedProducts as $product) {
            $response->assertSee($product['name']);
            $response->assertSee($product['description']);
        }
    }
}
