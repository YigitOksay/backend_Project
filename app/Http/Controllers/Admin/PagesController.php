<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages=Pages::get()->toArray();
        //dd($pages);
        return view('admin.pages.index',compact('pages'));
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
        $allPages=Pages::get()->toArray();
        if($id==""){
            $pageTitle="Sayfa Ekleme";
            $pages = new Pages;
            $message = "Bilgiler Kayıt Edildi.";
            $pages->created_at = now();

        }else{
            $pageTitle="Sayfa Düzeleme";
            $pages = Pages::find($id);
            $message = "Bilgiler Güncellendi.";
            $pages->updated_at = now();

        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $rules=[
                'title'=>'required',
                'content'=>'required',
                'metaTitle'=>'required',
                'metaUrl'=>'required'
            ];
            $customMessages=[
                'title.require' => 'Başlık giriniz.',
                'content.require' => 'Açıklama giriniz.',
                'metaTitle.require' => 'Meta Başlık giriniz.',
                'metaUrl.require' => 'Meta Url giriniz.',

            ];
            $this->validate($request, $rules, $customMessages);

            if(isset($data['status']) && $data['status'] == 'on'){
                $pages->status = 1;
            } else {
                $pages->status = 0;
            }
            if(isset($data['home_page']) && $data['home_page'] == 'on'){
                $pages->home_page = 1;
            } else {
                $pages->home_page = 0;
            }

            if(isset($data['menu_status']) && $data['menu_status'] == 'on'){
                $pages->menu_status = 1;
            } else {
                $pages->menu_status = 0;
            }

            if(isset($data['footer_status']) && $data['footer_status'] == 'on'){
                $pages->footer_status = 1;
            } else {
                $pages->footer_status = 0;
            }

            $urlParts = parse_url($data['image']);
            $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
            $pages->image = $onlyPath;

            $pages->title = $data['title'];
            $pages->content = $data['content'];
            $pages->url = $data['metaUrl'];
            $pages->meta_title = $data['metaTitle'];
            $pages->meta_description = $data['metaContent'];
            $pages->meta_keywords = $data['metaKey'];
            $pages->parent_id = $data['subPage'];
            $pages->save();
            return redirect('/NPanel/pages')->with('success_message',$message);
        }
        return view('admin.pages.addEditPage')->with(compact('pageTitle','pages','allPages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pages $pages)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status'] == "Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Pages::where('id',$data['page_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'page_id'=>$data['page_id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete
        Pages::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Sayfa Silindi.');
    }
}
