<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use App\Models\Pages;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders=Sliders::get()->toArray();
        $users=Admin::get()->toArray();
        return view('admin.sliders.index',compact('sliders','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id=null)
    {
        $userId = Auth::guard('admin')->user()->id;
        if($id==""){
            $pageTitle="Slider Ekleme";
            $sliders = new Sliders;
            $message = "Bilgiler Kayıt Edildi.";
            $sliders->created_at = now();
            $sliders->createUserId = $userId;

        }else{
            $pageTitle="Sayfa Düzeleme";
            $sliders = Sliders::find($id);
            $message = "Bilgiler Güncellendi.";
            $sliders->updated_at = now();
            $sliders->updateUserId = $userId;

        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $rules=[
                'title'=>'required',
                'image'=>'required'
            ];
            $customMessages=[
                'title.require' => 'Başlık giriniz.',
                'image.require' => 'Açıklama giriniz.',

            ];
            $this->validate($request, $rules, $customMessages);

            if(isset($data['status']) && $data['status'] == 'on'){
                $sliders->status = 1;
            } else {
                $sliders->status = 0;
            }

            $urlParts = parse_url($data['image']);
            $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
            $sliders->image = $onlyPath;

            $sliders->name = $data['title'];
            $sliders->description = $data['content'];
            $sliders->buttonLink = $data['metaUrl'];
            $sliders->buttonName = $data['metaTitle'];
            $sliders->orderNo = $data['orderNo'];
            $sliders->save();
            return redirect('/NPanel/sliders')->with('success_message',$message);
        }
        return view('admin.sliders.crud')->with(compact('pageTitle','sliders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sliders $sliders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete
        Sliders::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Slider Silindi.');
    }
}
