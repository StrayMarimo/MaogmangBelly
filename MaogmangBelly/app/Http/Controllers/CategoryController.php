<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        return response()->json(Category::all());
    }

    function store(Request $req)
    {
        $name = strtolower($req->category_name);
        $category = Category::ofName($name);
    
        if ($category) 
            return redirect()->route('products')
                ->with($this->retSession("Failed adding " . $name . ". Category already exists", false));
        
        $category = Category::create(['name' => $name]);
        if ($category)
            return redirect()->route('products')
                ->with($this->retSession("Successfully  added " . $name, true));
    
        return redirect()->route('products')
            ->with($this->retSession("Failed adding " . $name, false));
    }

    function update(Request $req)
    {
        $category = Category::find((int) $req->category);
        $oldName = $category->name; 
        $name = strtolower($req->category_name); 
        $rowAffected = $category->update(['name' => $name]);

        if ($rowAffected == 1) 
            return redirect()->route('products')
                ->with($this->retSession("Successfully updated " . $oldName . " to " .$name, true)); 

        return redirect()->route('products')
            ->with($this->retSession("Failed updating " . $oldName, false));
    }


    function destroy(Request $req)
    {
        $id = (int) $req->category;
        $name = Category::find($id)['name'];

        $rowDeleted = Category::destroy($id);
        if ($rowDeleted == 1)
            return redirect()->route('products')
                ->with($this->retSession("Successfully deleted " . $name, true)); 

        return redirect()->route('products')
            ->with($this->retSession("Failed deleting " . $name, false));
    }

    private function retSession(String $msg, bool $success)
    {  
        return [
            'message' => $msg . "!",
            'success' => $success
        ];
    }
}