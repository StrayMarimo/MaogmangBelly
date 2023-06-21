<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_can_get_categories(): void
    {
        $expectedCategories = Category::factory()->count(5)->create();
        $response = $this->get(route('category.index'));
        $response->assertHeader('Content-Type', 'application/json');

        // Assert that the response status code is 200 OK
        $response->assertJsonCount(5);

        // Get the categories from the response JSON
        $categories = $response->json();

        // Assert that the categories array is not empty
        $this->assertNotEmpty($categories);

        // Assert that the created categories has the expected data
        for ($i = 0; $i < count($expectedCategories); $i++) {
            $this->assertEquals($expectedCategories[$i]['name'], $categories[$i]['name']);
            $this->assertEquals($expectedCategories[$i]['id'], $categories[$i]['id']);
        }
    }

    public function test_can_add_category(): void
    {
        $categoryData = [
            'category_name' => $this->faker->word()
        ];

        $response = $this->post(route('category.store'), $categoryData);
        $expectedCategory = Category::first();

        $this->assertEquals($expectedCategory['name'], $categoryData['category_name']);

        // assert redirect with success session
        $response->assertStatus(302);
        $response->assertSessionHas('success', true); 
    }

    public function test_can_edit_category(): void
    {
        $categories = Category::factory()->count(5)->create();
        $newCategoryName = $this->faker->word();
        $categoryData = ['category_name' => $newCategoryName];

        $response = $this->put(route('category.update', 
            ['category' => $categories[0]['id']]), $categoryData);
        $updatedCategory = Category::find($categories[0]['id']);

        // Assert that the category name is updated
        $this->assertEquals($newCategoryName, $updatedCategory->name);

        // assert redirect with success session
        $response->assertStatus(302);
        $response->assertSessionHas('success', true); 
    }

    public function test_can_delete_category(): void
    {
        $categories = Category::factory()->count(5)->create();
        $categoryDeleteId = $categories->random()->id;

        $response = $this->delete(route('category.destroy', ['category' => $categoryDeleteId]));

        // Assert that the category name is deleted
        $deletedCategory = Category::find($categoryDeleteId);
        $this->assertNull($deletedCategory);

        // assert redirect with success session
        $response->assertStatus(302);
        $response->assertSessionHas('success', true); 
    }
}
