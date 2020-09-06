<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Session;


class UserController extends Controller
{
    //
    public function index()
    {
        
        $admin = DB::table('users')->orderBy('id','DESC')->paginate(8);
        return view('admin.users.all_users')->with(compact('admin'));
    }
    public function add_users(){
        return view('admin.users.add_users');
    }
    
    
    public function store_users(Request $request){
        $data = $request->all();
        $admin = new Admin();
        $admin-> name = $data['name'];
        $admin-> phone = $data['phone'];
        $admin-> email = $data['email'];
        $admin-> password = md5($data['password']);
        $admin-> roles = $data['admin_roles'];
        $admin->save();
        
        Session::put('message','Thêm users thành công');
        return Redirect('users');
    }
}
