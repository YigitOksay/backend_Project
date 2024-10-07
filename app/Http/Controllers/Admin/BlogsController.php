<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategories;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Auth;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=Blogs::get()->toArray();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function categoryIndex()
    {
        $blogCategories=BlogCategories::get()->toArray();
        return view('admin.blog.categories.index',compact('blogCategories'));
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
    public function categoryCrud(Request $request,$id=null)
    {
        $allCategories=BlogCategories::get()->toArray();
        $userId = Auth::guard('admin')->user()->id;
        if($id==""){
            $pageTitle="Blog Ekleme";
            $categories = new BlogCategories;
            $message = "Bilgiler Kayıt Edildi.";
            $categories->created_at = now();
            $categories->createUserId = $userId;
        }else{
            $pageTitle="Blog Düzeleme";
            $categories = BlogCategories::find($id);
            $message = "Bilgiler Güncellendi.";
            $categories->updated_at = now();
            $categories->updateUserId = $userId;
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
                $categories->status = 1;
            } else {
                $categories->status = 0;
            }
            if(isset($data['home_page']) && $data['home_page'] == 'on'){
                $categories->home_page = 1;
            } else {
                $categories->home_page = 0;
            }

            $urlParts = parse_url($data['image']);
            $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
            $categories->image = $onlyPath;

            $categories->title = $data['title'];
            $categories->content = $data['content'];
            $categories->url = $data['metaUrl'];
            $categories->meta_title = $data['metaTitle'];
            $categories->meta_description = $data['metaContent'];
            $categories->meta_keywords = $data['metaKey'];
            $categories->parent_id = $data['subPage'];
            $categories->orderNo = $data['orderNo'];
            $categories->save();
            return redirect('/NPanel/blogs/categories')->with('success_message',$message);
        }
        return view('admin.blog.categories.crud')->with(compact('pageTitle','categories','allCategories'));
    }


    public function categoryDestroy($id)
    {
        // Delete
        BlogCategories::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Kategori Silindi.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id=null)
    {
        $allCategories=BlogCategories::get()->toArray();
        $userId = Auth::guard('admin')->user()->id;
        if($id==""){
            $pageTitle="Blog Ekleme";
            $blogs = new Blogs;
            $message = "Bilgiler Kayıt Edildi.";
            $blogs->created_at = now();
            $blogs->createUserId = $userId;

        }else{
            $pageTitle="Blog Düzeleme";
            $blogs = Blogs::find($id);
            $message = "Bilgiler Güncellendi.";
            $blogs->updated_at = now();
            $blogs->updateUserId = $userId;
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
                $blogs->status = 1;
            } else {
                $blogs->status = 0;
            }


            $urlParts = parse_url($data['image']);
            $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
            $blogs->image = $onlyPath;

            $blogs->title = $data['title'];
            $blogs->shortDescription = $data['shortDescription'];
            $blogs->description = $data['content'];
            $blogs->categoryId = $data['subPage'];
            $blogs->orderNo = $data['orderNo'];
            $blogs->url = $data['metaUrl'];
            $blogs->meta_title = $data['metaTitle'];
            $blogs->meta_description = $data['metaContent'];
            $blogs->meta_keywords = $data['metaKey'];
            $blogs->save();
            return redirect('/NPanel/blogs')->with('success_message',$message);
        }
        return view('admin.blog.crud')->with(compact('pageTitle','blogs','allCategories'));
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
