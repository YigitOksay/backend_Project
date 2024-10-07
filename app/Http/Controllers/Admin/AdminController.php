<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Validator;
use Hash;
use Image;
use Session;


class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;

            $rules = [
                'email' => 'required|email|max:255',
                'password'=> 'required|max:30'
            ];
            $customMessages = [
                'email.required' => "Lütfen E-Posta adresinizi giriniz.",
                'email.email' => 'E-posta adresiniz hatalıdır.',
                'password.required' => "Lütfen parolanızı giriniz."
            ];

            $this->validate($request,$rules,$customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('/NPanel/dashboard');
            }else{
                return redirect()->back()->with("error_message","E-posta ya da şifreniz hatalı.");
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/NPanel/login');
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Hash::check($data['password'], Auth::guard('admin')->user()->password)){
                if($data['newPassword']==$data['confirmPassword']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['newPassword'])]);
                    return redirect()->back()->with("success_message", "Parolanız başarıyla güncellendi.");
                }else{
                    return redirect()->back()->with("error_message", "Şifreniz eşleşmiyor.");
                }
            }else{
                return redirect()->back()->with("error_message", "Geçerli bir şifre girmelisiniz.");
            }
        }
        return view('admin.update_password');
    }

    public function checkPassword(Request $request){
        $data = $request->all();
        if(Hash::check($data['password'], Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }
    public function updateAdmin(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'fullName' => 'required|max:255',
                'mobile'=> 'required|numeric|digits:11',
                'profileImage' => 'nullable|string|max:2000',
            ];

            $customMessages = [
                'fullName.required' => "Lütfen adınızı giriniz.",
                'fullName.max' => "Lütfen 255 karakterden fazla içerik girmeyin.",
                'mobile.required' => "Lütfen telefon numaranızı giriniz.",
                'mobile.numeric' => "Lütfen telefon numaranızı doğru bir şekilde giriniz.",
                'mobile.digits' => "Lütfen telefon numaranızı 11 haneli olacak şekilde giriniz.",
            ];

            $this->validate($request, $rules, $customMessages);

            if ($request->hasFile('profileImage')) {
                $image_tmp = $request->file('profileImage');
            } else if (!empty($data['profileImage'])) {
                $imageName = $data['profileImage'];
                $imageNameParts = explode(env('APP_URL'), $imageName);
                $imageNameToSave = end($imageNameParts);
            } else {
                $imageName = '';
            }

            Admin::where('email', Auth::guard('admin')->user()->email)
                ->update(['name' => $data['fullName'], 'mobile' => $data['mobile'], 'image' => $imageNameToSave]);

            return redirect()->back()->with("success_message", "Bilgileriniz başarıyla güncellendi.");
        }

        return view('admin.update_admin');
    }
}

