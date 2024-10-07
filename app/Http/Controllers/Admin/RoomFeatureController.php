<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomFeature;
use Auth;
use App\Models\Admin;
class RoomFeatureController extends Controller
{
    public function index() {
        $features = RoomFeature::get()->toArray();

        return view('admin.features.index', compact('features'));
        return view('admin.features.index', compact('features'));
    }


    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id=null)
    {
        $userId = Auth::guard('admin')->user()->id;
        if($id==""){
            $pageTitle="Oda Özellik Ekleme";
            $message = "Bilgiler Kayıt Edildi.";
            $feature = new RoomFeature;
            $feature->created_at = now();
        }else{
            $pageTitle="Oda Özellik Düzeleme";
            $feature = RoomFeature::find($id);
            $message = "Bilgiler Güncellendi.";
            $feature->updated_at = now();

        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $rules=[
                'feature'=>'required',
            ];
            $customMessages=[
                'title.require' => 'Başlık giriniz.',
            ];

            $feature->feature = $data['feature'];
            $feature->save();


            return redirect('/NPanel/features')->with('success_message',$message);
        }
        return view('admin.features.crud')->with(compact('pageTitle','feature'));
    }

    public function destroy($id)
    {
        // Delete
        RoomFeature::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Özellik Silindi.');
    }

}
