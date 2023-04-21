<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;
   
    public function test_can_get_category(): void
    {
        // Create some category data in the database
        Category::factory()->create(['name' => 'Category 1']);
        Category::factory()->create(['name' => 'Category 2']);

        // Retrieve the categories from the database
        $categories = Category::all();

        // Assert that the number of categories retrieved from the database matches the number of categories created
        $this->assertCount(2, $categories);

        // Assert that the category names retrieved from the database match the category names created
        $this->assertEquals('Category 1', $categories[0]->name);
        $this->assertEquals('Category 2', $categories[1]->name);
    }

    public function test_can_write_category()
    {
        // Generate category data
        $categoryData = [
            'name' => $this->faker->unique()->word(),
        ];

        // Write category to database
        $category = Category::create($categoryData);

        // Assert that category was written to database
        $this->assertDatabaseHas('categories', $categoryData);
    }

    public function test_can_update_category() 
    {
        $category = Category::factory()->create();

        $updatedData = [
            'name' => $this->faker->unique()->word(),
        ];

        $category->update($updatedData);

        $this->assertDatabaseHas('categories', $updatedData);
    }


    public function test_can_delete_category()
    {
        $category = Category::factory()->create();

        $category->delete($category->id);

        $this->assertDatabaseMissing('categories', ['id'=>$category->id]);
    }
}
