<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class ProductTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

    public function test_can_get_product(): void
    {
        // Create some categories and products in the database
        $categories = Category::factory()->count(2)->create();
        $products = Product::factory()->count(3)->create([
            'category_id' => $categories->random()->id,
        ]);

        // Retrieve the products directly from the database
        $retrievedProducts = DB::table('products')->get();

        // Assert that the number of retrieved products matches the number of created products
        $this->assertCount(3, $retrievedProducts);

        // Assert that each retrieved product has the expected properties
        foreach ($retrievedProducts as $retrievedProduct) {
            $product = $products->where('id', $retrievedProduct->id)->first();

            $this->assertEquals($product->name, $retrievedProduct->name);
            $this->assertEquals($product->description, $retrievedProduct->description);
            $this->assertEquals(round($product->price, 2), round($retrievedProduct->price, 2));
            $this->assertEquals(round($product->price_10pax, 2), round($retrievedProduct->price_10pax, 2));
            $this->assertEquals(round($product->price_20pax, 2), round($retrievedProduct->price_20pax, 2));
            $this->assertEquals($product->stock, $retrievedProduct->stock);
            $this->assertEquals($product->total_sold, $retrievedProduct->total_sold);
            $this->assertEquals($product->gallery, $retrievedProduct->gallery);
            $this->assertEquals($product->is_trending, $retrievedProduct->is_trending);
            $this->assertEquals($product->is_featured, $retrievedProduct->is_featured);
            $this->assertEquals($product->category_id, $retrievedProduct->category_id);
        }
    
    }



    public function test_can_write_product()
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

        Product::factory()->create($productData);
    
        // Assert that category was written to database
        $this->assertDatabaseHas('products', $productData);
    }

    public function test_can_update_product()
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
    

        $updatedData = [
            'name' => $this->faker->unique()->word(),
        ];

        $product->update($updatedData);

        $this->assertDatabaseHas('products', $updatedData);
    }


    public function test_can_delete_product()
    {
        // Create some categories and products in the database
        $categories = Category::factory()->create();
        $product = Product::factory()->create([
            'category_id' => $categories->id,
        ]);

        $product->delete($product->id);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
