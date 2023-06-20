<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    /**
     * gets all categories
     * @return JSON response containing all the categories in the database is
     */
    public function index()
    {
        return response()->json(Category::all());
    }

    /**
     * creates a new category record
     * @param Request req  [category_name]
     * @return RedirectResponse to products tab with a session message
     * indicating whether the category was successfully added or not
     */
    function store(Request $req)
    {
        // transforms name to all lower case
        $name = strtolower($req->category_name);

        // checks if category name is taken
        if(Category::ofName($name)) 
            return redirect()->route('product.index')
                ->with($this->retSession(
                    "adding " . $name . ". Category already exists", 
                    false));

        // creates a new category record in db
        $category = Category::create(['name' => $name]);

        /* returns a redirect route with a session message that is 
        obtained using the retSession function  */
        return redirect()->route('product.index')
            ->with($this->retSession(
                ($category ? "added " : "adding ") . $name, 
                $category != null));      
    }

    /**
     * updates name of a category
     * 
     * @param Request req contains the category_name
     * @param int id of category to be updated
     * @return RedirectResponse to products tab with a session message
     * indicating whether the category was successfully updated or not 
     */
    function update(Request $req, int $id)
    {
        // gets needed data
        $category = Category::find($id);
        $oldName = $category->name; 
        $newName = $req->category_name;
        
        // updates category in database
        $rowAffected = $category->update(['name' => strtolower($newName)]);

        /* returns a redirect route with a session message that is 
        obtained using the retSession function  */
        return redirect()->route('product.index')
                ->with($this->retSession(
                    ($rowAffected ? "updated " : "updating ") 
                        . $oldName . " to " . $newName, 
                    $rowAffected)); 
    }

    /**
     * @param int id of category to be deleted
     * @return RedirectResponse to products tab with a session message
     * indicating whether the category was successfully deleted or not 
     */
    public function destroy(int $id)
    {
        // gets name of category
        $name = Category::find($id)['name'];

        // deletes a category
        $rowDeleted = Category::destroy($id);

        /* returns a redirect route with a session message that is 
        obtained using the retSession function  */
        return redirect()->route('product.index')
            ->with($this->retSession(
                ($rowDeleted? "deleted " : "deleting ") . $name, 
                $rowDeleted)); 
    }

/**
 * returns session data for the redirect response
 * 
 * @param String msg is a string indicating the action performed
 * @param bool success A boolean value indicating whether the operation was
 * successful or not
 * 
 * @return array<associative> with two keys -- 'message' and 'success' --
 * for the session message and session status respectively
 */
    private function retSession(String $msg, bool $success)
    {  
        return [
            'message' => ($success? "Successfully " : "Failed ") . $msg . "!",
            'success' => $success
        ];
    }
}