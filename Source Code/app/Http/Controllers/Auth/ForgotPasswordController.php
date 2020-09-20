<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Carbon\Carbon;  
use App\User;
use Mail;

class ForgotPasswordController extends Controller
{
    public function  getQuenmk(){
        return view('forgotpassword');
    }
    public function  postQuenmk(Request $request){
        $user=User::whereEmail($request->email)->first();
        $email=$request->email;
        if($user==null){
            return redirect('login')->with(['thongbao'=>'Không tìm thấy email, vui lòng nhập lại']);
        }
        $code=bcrypt(time().$email);
        $user->code=$code;
        $user->time_code=Carbon::now();
        $user->save();
        $url=route('cailaimatkhau',['code'=>$user->code,'email'=>$email]);
        $data=['route'=>$url];
        Mail::send('forgot',$data,function($message) use ($email){
            $message->to($email,'Cài lại mật khẩu')->subject('Lấy lại mật khẩu');
        });
        return redirect()->back()->with(['thongbao'=>'Đã gửi mật khẩu cài lại qua email của bạn.']);
    }
    public function getguimatkhau(Request $request){
       
        $code=$request->code;
        $email=$request->email;
        $user=User::where(['code'=>$code,'email'=>$email])->first();
        
        if($user==null){
            return redirect('login')->with(['loi'=>'LỖI']);
        }
        else
        return view('reset_password');
    }
    public function postguimatkhau(Request $request){
        
        $code=$request->code;
        $email=$request->email;
        $user=User::where(['code'=>$code,'email'=>$email])->first();
        $user->password=bcrypt($request->password);
        $user->save();
        
        return redirect('login')->with('thongbao','Chúc mừng, bạn đã cài lại mật khẩu thành công');
    }
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
