<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\HomePage;
use Auth;
use Validator;
use Hash;
use Image;
use Session;


class HomepageController extends Controller
{
    public function index(){
        $users = Admin::get()->toArray();
        $homepage = HomePage::orderBy('order')->get()->toArray();
        return view('admin.homePage.index', compact('users','homepage'));
    }

    public function edit(Request $request,$id=null)
    {
        $userId = Auth::guard('admin')->user()->id;
        if($id==""){
            $pageTitle="Anasayfa Modül Ekleme";
            $homepage = new HomePage;
            $message = "Bilgiler Kayıt Edildi.";
            $homepage->created_at = now();
            $homepage->createUserId = $userId;
        }else{
            $pageTitle="Anasayfa Modülü Düzenleme";
            $homepage = HomePage::find($id);
            $message = "Bilgiler Güncellendi.";
            $homepage->updated_at = now();
            $homepage->updateUserId = $userId;
        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $rules=[
                'title'=>'required',
            ];
            $customMessages=[
                'title.require' => 'Modül adını lütfen boş bırakmayın.',
            ];

            $this->validate($request, $rules, $customMessages);

            if(isset($data['status']) && $data['status'] == 'on'){
                $homepage->status = 1;
            } else {
                $homepage->status = 0;
            }

            $homepage->title     =  $data['title'];
            $homepage->moduleId  =  $data['moduleId'];
            $homepage->content   =  $data['content'];
            $homepage->order     =  $data['order'];
            $homepage->save();

            return redirect('/NPanel/homepage')->with('success_message',$message);
        }
        return view('admin.homePage.crud')->with(compact('pageTitle','homepage'));
    }

    public function destroy($id)
    {
        // Delete
        HomePage::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Modül Silindi.');
    }
}
?>
