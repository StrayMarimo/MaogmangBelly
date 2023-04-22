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

        // Redirect back to the products page
        return redirect("/products");
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
            DB::table("categories")
            ->where('id', (int) $req->category_id)
                ->update(['name' => $req->category_name]);


        // Redirect back to the products page
        return redirect("/products");
    }

      
    function deleteCategory(Request $req)
    {
        DB::table("categories")
            ->where('id', (int) $req->category_id)
                ->delete();

        // Redirect back to the products page
        return redirect("/products");
    }

}
