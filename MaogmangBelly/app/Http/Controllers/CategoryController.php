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
        $category = Category::where('name', $name)->first();
    
        if ($category) 
            return redirect()->route('products')
                ->with($this->retSession("adding " . $name . ". Category already exists", false));
        
        $category = Category::create(['name' => $name]);
        if ($category)
            return redirect()->route('products')
                ->with($this->retSession("added " . $name, true));
    
        return redirect()->route('products')
            ->with($this->retSession("adding " . $name, false));
    }

    function update(Request $req)
    {
        $category = Category::find((int) $req->category_id);
        $oldName = $category->name; 
        $name = strtolower($req->category_name); 
        $rowAffected = $category->update(['name' => $name]);

        if ($rowAffected == 1) 
            return redirect()->route('products')
                ->with($this->retSession("updated " . $oldName . " to " .$name, true)); 

        return redirect()->route('products')
            ->with($this->retSession("updating " . $oldName, false));
    }


    function destroy(Request $req)
    {
        $id = (int) $req->category_id;
        $name = Category::find($id)['name'];

        $rowDeleted = Category::destroy($id);
        if ($rowDeleted == 1)
            return redirect()->route('products')
                ->with($this->retSession("deleted " . $name, true)); 

        return redirect()->route('products')
            ->with($this->retSession("deleting " . $name, false));
    }

    private function retSession(String $msg, bool $success)
    {  
        if ($success)
            return [
                'status' => 200,
                'message' => "Successfully " . $msg . "!",
                'success' => true
            ];
        else
           return [
                'status' => 404,
                'message' => "Failed " . $msg . ".",
                'success' => false
            ]; 
    }
}