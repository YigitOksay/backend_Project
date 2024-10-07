<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menus;
use App\Models\MenuPosition;
use App\Models\Pages;
use Illuminate\Http\Request;
use Auth;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menuses = Menus::orderBy('order_id')->get()->toArray();
        $pages=Pages::get()->toArray();
        //dd($menus);
        return view('admin.menu.index',compact('menuses','pages'));
    }

 public function add(Request $request)
{
    // Formdan gelen verileri alınması
    $menu_position_id = $request->input('menu_position_id');
    $selected_pages = $request->input('selected_pages');

    // Her bir sayfa için menüye ekleme işlemi
    foreach ($selected_pages as $key => $page_id) {
        $page = Pages::find($page_id);
        if ($page) {
            $menu = new Menus();
            $menu->title = $page->title;
            $menu->url = $page->url;
            $menu->status = 1;
            $menu->page_id = $page_id;
            $menu->submenu_id = $page->parent_id;
            $menu->menu_position_id = $menu_position_id;
            $menu->order_id = 1;
            $menu->created_User_Id = 1;
            $menu->updated_User_Id = 1;
            $menu->save();
        }
    }
    return redirect()->back()->with('success', 'Menüler başarıyla eklendi.');
}

    public function updateOrder(Request $request)
    {
        $menuOrder = $request->input('menuOrder');

        foreach ($menuOrder as $index => $menuId) {
            Menus::where('id', $menuId)->update(['order_id' => $index + 1]);
        }

        return response()->json(['success' => true]);
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pages $pages)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }

    public function type()
    {
        $types=MenuPosition::get()->toArray();
        //dd($menus);
        return view('admin.menu.types.index',compact('types'));
    }

    public function crudType(Request $request, $id = null)
    {
    if ($id == "") {
        $pageTitle = "Menü Tipi Ekleme";
        $type = new MenuPosition;
        $message = "Bilgiler Kayıt Edildi.";
        $type->created_at = now();
        $type->created_User_Id = Auth::guard('admin')->user()->id;
    } else {
        $pageTitle = "Sayfa Düzenleme";
        $type = MenuPosition::find($id);
        $message = "Bilgiler Güncellendi.";
        $type->updated_at = now();
        $type->updated_User_Id = Auth::guard('admin')->user()->id;
    }

    if ($request->isMethod('post')) {
        $data = $request->all();
        //dd($request->all());
        if ($data['positionId'] == 1) {
            $image = "admin/images/pageContent/header.png";
        } elseif ($data['positionId'] == 2) {
            $image = "admin/images/pageContent/footer.png";
        } elseif ($data['positionId'] == 3) {
            $image = "admin/images/pageContent/left.png";
        } elseif ($data['positionId'] == 4) {
            $image = "admin/images/pageContent/content.png";
        } else {
            $image = "admin/images/pageContent/right.png";
        }
        $rules = [
            'title' => 'required',
            'positionId' => 'required',
        ];
        $customMessages = [
            'title.required' => 'Başlık giriniz.',
            'positionId.required' => 'Pozisyon Seçiniz.',
        ];
        $this->validate($request, $rules, $customMessages);

        // Güncelleme işlemi için veri nesnesinin alanlarını güncelle
        $type->title = $data['title'];
        $type->position_id = $data['positionId'];
        $type->image = $image;
        $type->save(); // Değişiklikleri kaydet

        return redirect('/NPanel/menus/types')->with('success_message', $message);
    }
    return view('admin.menu.types.crud')->with(compact('pageTitle', 'type'));
}

    public function typeDestroy($id)
    {
        MenuPosition::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Kayıt Silindi.');
    }
}
