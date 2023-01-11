<?php

namespace App\Http\Services\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;


class CategoryService
{
   
    public function get(){
       return Category::paginate(3);
    }

    public function create($request){
        try{
            Category::create([
                'name' =>(string) $request->input('name'),
                $slug = Str::slug('name', '-'),
 
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }   


    public function destroy($request){
        $category = Category::where('IDcategory', $request->input('id'))->first();
        if($category){
            return Category::where('IDcategory', $request->input('id'))->delete();
        }
        return false;
    }
}
    
