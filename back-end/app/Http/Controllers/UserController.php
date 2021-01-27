<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Redirect, Response, Validator;

use Session;

class UserController extends Controller
{
    public function getRegister(){
        return view('User.register');
    }
    public function getLogin(){
        return view('User.login');
    }
    public function postRegistration(Request $request)
    {  
        $rules = [
        'firstName' => 'required|min:3',
        'lastName' => 'required|min:3',
        'password' => 'required|min:6',
        'confirmPassword' => 'required|same:password',
        'email' => 'required|email|unique:users'
        ];
        $messages = [
        'firstName.required' => 'Vui lòng nhập tên.',
        'firstName.min' => 'Tên phải có ít nhất 3 ký tự.',
        'lastName.required' => 'Vui lòng nhập tên.',
        'lastName.min' => 'Tên phải có ít nhất 3 ký tự.',
        'password.required' => 'Vui lòng nhập mật khẩu.',
        'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        'confirmPassword.required' => 'Vui lòng nhập lại mật khẩu.',
        'confirmPassword.same' => 'Mật khẩu xác nhận không đúng.',
        'email.email' => 'Email phải đúng định dạng.',
        'email.required' => 'Vui lòng nhập email.',
        'email.unique' => 'Email đã tồn tại.'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('/register')->withErrors($validator)->withInput();
        }else{
            $data = $request->all();
            $check = $this->create($data);
            return Redirect::to("/")->withSuccess('Bạn đã đăng nhập thành công.');
        }
    }
    public function create(array $data)
    {
        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level' => '0'
        ]);
    }
    public function postLogin(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:2'
        ];
        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be email',
            'password.required' => 'Password is required',
            'password.min' => 'Password length must be than 2 characters',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('/login')->withErrors($validator)->withInput();
        }else{
            $email = $request->input('email');
            $password = $request->input('password');
            if(Auth::attempt(['email'=>$email,'password'=>$password])){   
               //dd(Auth::user()->id); 
                return redirect('/');
            }else{
                Session::flash('error','Email or password iscorrect !');
                return redirect('/login');
            }
        }
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
