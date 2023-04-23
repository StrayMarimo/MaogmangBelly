<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function getCategories()
    {
        $categories = Category::all();

        return response()->json($categories);
    }

    /**
     * Add a new category to the database.
     *
     * @param  Request  $req  The HTTP request containing the new category's name.
     * @return RedirectResponse  A redirect back to the products page.
     */
    function addCategory(Request $req)
    {

        // Create a new Category object and set its name
        $category = new Category;
        $category->name = $req->category_name;

        // Save the new category to the database
        $category->save();

        if ($category)
            return response()->json(['success' => true]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Failed to add category',
                'status' => 'error'
            ], 400);
    }

    /**
     * Edit a category's name or delete a category entirely.
     *
     * @param  Request  $req  The HTTP request containing the category ID, name, and whether to delete the category.
     * @return RedirectResponse  A redirect back to the products page.
     */
    function editCategory(Request $req)
    {
        // Update the category's name in the database
        $affectedRows = DB::table("categories")
            ->where('id', (int) $req->category_id)
            ->update(['name' => $req->category_name]);

        if ($affectedRows > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category not found or update failed'
            ], 404);
        }
    }


    function deleteCategory(Request $req)
    {
        $rowsDeleted = DB::table("categories")
            ->where('id', (int) $req->category_id)
            ->delete();

        if ($rowsDeleted > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category not found or update failed'
            ], 404);
        }

    }
}
