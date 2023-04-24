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
            return redirect()->route('products')->with([
                'status' => 200,
                'message' => 'Category Added Successfully',
                'success' => true
            ]);
        else
            return redirect()->route('products')->with([
                'status' => 404,
                'message' => 'Adding Category failed',
                'success' => false
            ]);
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
        $rowsAffected = DB::table("categories")
            ->where('id', (int) $req->category_id)
            ->update(['name' => $req->category_name]);

        if ($rowsAffected > 0) {
            return redirect()->route('products')->with([
                'status' => 200,
                'message' => 'Product Deleted Successfully',
                'success' => true
            ]);
        } else {
            return redirect()->route('products')->with([
                'status' => 404,
                'message' => 'Product Deletion failed',
                'success' => false
            ]);
        }
    }


    function deleteCategory(Request $req)
    {
        $rowsDeleted = DB::table("categories")
            ->where('id', (int) $req->category_id)
            ->delete();
       
        if ($rowsDeleted > 0) {
            return redirect()->route('products')->with([
                'status' => 200,
                'message' => 'Category Deleted Successfully',
                'success' => true
            ]);
        } else {
            return redirect()->route('products')->with([
                'status' => 404,
                'message' => 'Category Deletion failed',
                'success' => false
            ]);
        }
    }
}
