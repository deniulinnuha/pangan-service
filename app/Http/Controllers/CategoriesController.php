<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use DB;
class CategoriesController extends Controller
{
    /**
     * Register new user
     *
     * @param $request Request
     */
    public function index(){
        $cate = DB::table('categories')->get();

        return $cate;
    }

    public function getCategories($id){
        $cate = DB::table('categories')->where('id', $id)->get();

        return $cate;
    }

    public function createCategories(Request $request){
        $input = $request->except('api_token');
        // print_r($token);exit;
        $cate = DB::table('categories')->insert($input);
        if ($cate) {
            $res['success'] = true;
            $res['message'] = 'Data saved';
      
            return response($res);
        }else{
            $res['success'] = false;
            $res['message'] = 'Data cannot be saved!';
        
            return response($res);
        }
    }

    public function deleteCategories(Request $request, $id){
        $users = DB::table('categories')->where('id', $id)->delete();  
        if ($users) {
            $res['success'] = true;
            $res['message'] = 'ID '.$id.' deleted';
      
            return response($res);
        }else{
            $res['success'] = false;
            $res['message'] = 'failed!';
        
            return response($res);
        }
    }

    public function updateCategories(Request $request, $id){
        $input = $request->except('api_token');
        $update = DB::table('categories')
            ->where('id', $id)
            ->update($input);
        $res = DB::table('categories')->where('id', '=', $id)->get();
      
        return response($res);
    }
}