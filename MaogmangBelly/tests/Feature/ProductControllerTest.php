<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_can_get_products(): void
    {
        $user = User::factory()->create();
        $categories = Category::factory()->count(5)->create();
        $expectedProducts = Product::factory()->count(10)->create([
            'category_id' => $categories->random()->id,
        ]);


        $response = $this->actingAs($user)
            ->get(route('products'));
        $response->assertStatus(200);

        $response->assertViewIs('layouts.products.products')
            ->assertViewHasAll([
                'products' => $expectedProducts,
                'isAdmin' => $user['is_admin'],
                'categories' => $categories,
                'trending_products',
                'featured_products'
            ]);
    }

    public function test_get_product_details(): void
    {
        $categories = Category::factory()->count(5)->create();
        $product = Product::factory()->create([
            'category_id' => $categories->random()->id,
        ]);

        $response = $this->get(route('product_details', ['id' => $product->id]));
        $response->assertStatus(200);

        $expectedProduct = Product::find($product['id']);
        $expectedCategory = Category::find($product['category_id']);

        $response->assertViewIs('layouts.products.details')
            ->assertViewHasAll([
                'product' => $expectedProduct,
                'category' => $expectedCategory
            ]);
    }


    public function test_searching_for_products(): void
    {
        // Create some categories and products in the database
        $categories = Category::factory()->count(5)->create();
        $products = Product::factory()->count(10)->create([
            'category_id' => $categories->random()->id,
        ]);

        // Assert that there are 10 products and 5 cateories in the database
        $this->assertCount(10, Product::all());
        $this->assertCount(5, Category::all());
        $searchString = $products[0]->name . substr(0, 2);
        $expectedProducts = Product::where('name', 'like', '%' . $searchString . '%')
            ->get();


        $response = $this->get(route('search', ['query' => $searchString]));
        $response->assertStatus(200);

        $response->assertViewIs('layouts.search.search')
            ->assertViewHas('products', $expectedProducts);
    }

    public function test_can_add_product(): void
    {
        $price = $this->faker->randomFloat(2, 10, 1000);
        $category = Category::factory()->create();
        $productData = [
            'product_name' => $this->faker->word(),
            'product_desc' => $this->faker->sentence(),
            'product_price' => $price,
            'product_price_10' => $price * 10,
            'product_price_20' => $price * 20,
            'product_stock' => $this->faker->numberBetween(0, 100),
            'total_sold' => $this->faker->numberBetween(0, 100),
            'is_trending' => $this->faker->boolean(),
            'category_id' => $category->id
        ];

        $response = $this->post(route('add_product'), $productData);

        $expectedProduct = Product::first();

        // Assert that product was written to database
        $this->assertEquals($expectedProduct['name'], $productData['product_name']);
        $this->assertEquals($expectedProduct['description'], $productData['product_desc']);
        $this->assertEquals($expectedProduct['category_id'], $productData['category_id']);
        $response->assertStatus(302);

        // assert session data
        $response->assertSessionHas('status', 200); // Assert that the 'status' session key has a value of 200
        $response->assertSessionHas('success', true); // Assert that the 'success' session key has a value of true
    }

    public function test_can_edit_product(): void
    {
        $categories = Category::factory()->count(5)->create();
        $product = Product::factory()->create([
            'category_id' => $categories->random()->id,
        ]);

        $price = $this->faker->randomFloat(2, 10, 1000);
        $product_data = [
            'product_id' => $product['id'],
            'product_name' => $this->faker->word(),
            'product_desc' => $this->faker->sentence(),
            'product_price' => $price,
            'product_price_10' => $price * 10,
            'product_price_20' => $price * 20,
            'product_stock' => $this->faker->numberBetween(0, 100),
            'total_sold' => $this->faker->numberBetween(0, 100),
            'is_trending' => $this->faker->boolean(),
            'category_id' => $product['category_id'],
            'gallery' => $this->faker->word(),
        ];

        $response = $this->post(route('edit_product'), $product_data);
        $expectedProduct = Product::first();

        // Assert that the category name is updated
        $this->assertEquals($expectedProduct['name'], $product_data['product_name']);
        // $this->assertEquals($expectedProduct['description'], $product_data['product_desc']);

        // assert redirect
        $response->assertStatus(302);

        $response->assertSessionHas('status', 200); // Assert that the 'status' session key has a value of 200
        $response->assertSessionHas('success', true); // Assert that the 'success' session key has a value of true

    }

    public function test_can_delete_product(): void
    {
        $categories = Category::factory()->count(5)->create();
        $product = Product::factory()->create([
            'category_id' => $categories->random()->id,
        ]);

        $response = $this->post(route('delete_product'), ['product_id' => $product->id]);


        // Assert that the product is deleted
        $deletedProduct = Product::find($product->id);
        $this->assertNull($deletedProduct);

        // assert redirect
        $response->assertStatus(302);

        // assert session data
        $response->assertSessionHas('status', 200); // Assert that the 'status' session key has a value of 200
        $response->assertSessionHas('success', true); // Assert that the 'success' session key has a value of true
    }
}
