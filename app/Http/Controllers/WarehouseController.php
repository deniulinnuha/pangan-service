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
        $cate = DB::table('warehouse')
                ->join('comodities', 'comodities.id', '=', 'warehouse.id_comodities')
                ->join('users', 'users.id', '=', 'warehouse.id_user')
                ->select('warehouse.*','users.username','comodities.name')
                ->get();

        return $cate;
    }

    public function getWarehouse($id){
        $cate = DB::table('warehouse')
                ->where('id', $id)
                ->get();

        return $cate;
    }

    public function getWarehousebyUser($id){
        $cate = DB::table('warehouse')
                ->join('comodities', 'comodities.id', '=', 'warehouse.id_comodities')
                ->select('warehouse.*','comodities.name')
                ->where('id_user', $id)
                ->get();

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
        $input = $request->all();
        // dd($request->all());
        $update = DB::table('warehouse')
                ->where('id', $id)
                ->update([
                    'stock' => $input['stock'],
                    'id_user' => $input['id_user'],
                    'id_comodities' => $input['id_comodities']
                    ]);
        $res = DB::table('warehouse')->where('id', '=', $id)->get();
      
        return response($res);
    }
}