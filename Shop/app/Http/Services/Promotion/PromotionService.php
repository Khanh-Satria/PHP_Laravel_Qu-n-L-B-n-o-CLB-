<?php

namespace App\Http\Services\Promotion;

use App\Models\Promotion;
use Exception;
use Illuminate\Support\Facades\Session;

class PromotionService
{
    public function get(){

        return Promotion::paginate(5);
    }

    public function create($request){
        
        try{
            Promotion::create([
                'name' => (string) $request->input('name'),
                'deduction' => $request->input('number'),
            ]);
            Session::flash('success', 'Tạo danh mục thành công');
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){
            $promotion = Promotion::where('IDpromotion' , $request->input('id'))->first();
            if($promotion){
                return Promotion::where('IDpromotion', $request->input('id'))->delete();
            }
            return true;
    }
}
