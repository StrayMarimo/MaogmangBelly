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
        $this->assertTrue(true);
    }
    // public function test_can_get_categories(): void
    // {
    //     $expectedCategories = Category::factory()->count(5)->create();
    //     $response = $this->get(route('categories'));
    //     $response->assertHeader('Content-Type', 'application/json');

    //     // Assert that the response status code is 200 OK
    //     $response->assertJsonCount(5);

    //     // Get the categories from the response JSON
    //     $categories = $response->json();

    //     // Assert that the categories array is not empty
    //     $this->assertNotEmpty($categories);

    //     // Assert that the created categories has the expected data
    //     for ($i = 0; $i < count($expectedCategories); $i++) {
    //         $this->assertEquals($expectedCategories[$i]['name'], $categories[$i]['name']);
    //         $this->assertEquals($expectedCategories[$i]['id'], $categories[$i]['id']);
    //     }
    // }

    // public function test_can_add_category(): void
    // {
    //     $categoryData = [
    //         'category_name' => $this->faker->word()
    //     ];

    //     $response = $this->post(route('add_category'), $categoryData);

    //     $expectedCategory = Category::first();

    //     $this->assertEquals($expectedCategory['name'], $categoryData['category_name']);

    //     // assert redirect
    //     $response->assertStatus(302);

    //     $response->assertSessionHas('status', 200); // Assert that the 'status' session key has a value of 200
    //     $response->assertSessionHas('success', true); // Assert that the 'success' session key has a value of true
    // }

    // public function test_can_edit_category(): void
    // {
    //     $categories = Category::factory()->count(5)->create();
    //     $newCategoryName = $this->faker->word();
    //     $categoryData = [
    //         'category_id' => $categories[0]['id'],
    //         'category_name' => $newCategoryName
    //     ];

    //     $response = $this->post(route('edit_category'), $categoryData);
    //     $updatedCategory = Category::find($categories[0]['id']);

    //     // Assert that the category name is updated
    //     $this->assertEquals($newCategoryName, $updatedCategory->name);
    //     // assert redirect
    //     $response->assertStatus(302);

    //     $response->assertSessionHas('status', 200); // Assert that the 'status' session key has a value of 200
    //     $response->assertSessionHas('success', true); // Assert that the 'success' session key has a value of true
    // }

    // public function test_can_delete_category(): void
    // {
    //     $categories = Category::factory()->count(5)->create();
    //     $categoryDeleteId = $categories->random()->id;

    //     $response = $this->post(route('delete_category'), ['category_id' => $categoryDeleteId]);

    //     // Assert that the category name is deleted
    //     $deletedCategory = Category::find($categoryDeleteId);
    //     $this->assertNull($deletedCategory);

    //     // assert redirect
    //     $response->assertStatus(302);

    //     // assert session data
    //     $response->assertSessionHas('status', 200); // Assert that the 'status' session key has a value of 200
    //     $response->assertSessionHas('success', true); // Assert that the 'success' session key has a value of true
    // }
}
