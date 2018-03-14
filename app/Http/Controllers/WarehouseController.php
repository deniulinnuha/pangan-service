<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use DB;
class WarehouseController extends Controller
{
    /**
     * Register new user
     *
     * @param $request Request
     */
    public function index(){
        $cate = DB::table('warehouse')->get();

        return $cate;
    }

    public function createWarehouse(Request $request){
        $input = $request->except('api_token');
        // print_r($token);exit;
        $cate = DB::table('warehouse')->insert($input);
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

    public function deleteWarehouse(Request $request, $id){
        $users = DB::table('warehouse')->where('id', $id)->delete();  
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

    public function updateWarehouse(Request $request, $id){
        $input = $request->except('api_token');
        $update = DB::table('warehouse')
            ->where('id', $id)
            ->update($input);
        $res = DB::table('warehouse')->where('id', '=', $id)->get();
      
        return response($res);
    }
}