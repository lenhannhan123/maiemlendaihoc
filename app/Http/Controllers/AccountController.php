<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AccountController extends Controller
{
    //tra ve view listing danh sach users
    public function accountlist(Request $request){
        $ds = User::paginate(10);
        $currentuser_id = $request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        return view("Admin-user.accountlist",compact('ds','currentuser_id'));
        
    }

    //tra ve view tao 1 tai khoan user moi
    public function create(){
        return view("Admin-user.createaccount");
    }

    //luu du lieu input tu form create-user vo database
    public function postCreate(Request $request){
        //Nhận tất cả tham số vào mảng user
        $user = $request->all();
        //Xử lý upload hình
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            if($extension!='jpg' && $extension != 'png' && $extension != 'jpeg'){
                return redirect('product/create')->with('Lỗi', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
        }
        else{
            $imageName = null;
        }

        DB::table('tb_user')->insert([
            'user_id'=>intval($user['user_id']),
            'name'=>$user['name'],
            'email'=>$user['email'],
            'password'=> Hash::make($user['password']),
            'is_admin'=>'1',
        ]);
        return redirect()->action([AccountController::class, 'accountlist']);
    }
}
