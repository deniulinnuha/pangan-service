<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use DB;
class UserController extends Controller
{
    /**
     * Register new user
     *
     * @param $request Request
     */
    public function register(Request $request)
    {
        $hasher = app()->make('hash');
        $username = $request->input('username');
        $email = $request->input('email');
        $id_role = $request->input('id_role');
        $password = $hasher->make($request->input('password'));
        $register = User::create([
            'username'=> $username,
            'email'=> $email,
            'password'=> $password,
            'id_role'=> $id_role,
        ]);
        if ($register) {
            $res['success'] = true;
            $res['message'] = 'Success register!';
            return response($res);
        }else{
            $res['success'] = false;
            $res['message'] = 'Failed to register!';
            return response($res);
        }
    }
    /**
     * Get user by id
     *
     * URL /user/{id}
     */
    public function getUser(Request $request, $id)
    {
        $token = $request->input('api_token');
        // print_r($token);exit;
        $user = User::where([
            ['id', '=',$id],
            ['api_token','=',$token]
            ])->get();
        if ($user) {
              $res['success'] = true;
              $res['message'] = $user;
        
              return response($res);
        }else{
          $res['success'] = false;
          $res['message'] = 'Cannot find user!';
        
          return response($res);
        }
    }

    public function getDetail(Request $request, $id){
        $users = DB::table('user_details')->where('id_user', '=', $id)->get();  
        if ($users) {
            $res['success'] = true;
            $res['message'] = $users;
      
            return response($res);
        }else{
            $res['success'] = false;
            $res['message'] = 'Please complete your data!';
        
            return response($res);
        }
    }

    public function updateDetail(Request $request, $id){
        $input = $request->all();
        $input = $request->except('api_token');
        $input['id_user'] = $id;
        $users = DB::table('user_details')->where('id_user', $id)->first();
        // dd($input);
        if ($users === NULL) {
            $create = DB::table('user_details')->insert($input);
            
            $res['success'] = true;
            $res['message'] = 'Data saved!';
            
            return response($res);
        }else{
            $update = DB::table('user_details')
            ->where('id_user', $id)
            ->update($input);
            $res = DB::table('user_details')->where('id_user', '=', $id)->get();
            
            return response($res);
        }
    }
}