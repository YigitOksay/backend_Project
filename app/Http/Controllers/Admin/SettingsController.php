<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the
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
    public function edit(Request $request)
    {
        $userId = Auth::guard('admin')->user()->id;
        $admin = Admin::find($userId);
        $settings = Settings::find(1);

        if($request->isMethod('post')){
            $formData = $request->only([
                'logo', 'mobileLogo', 'favicon', 'companyName', 'gsm', 'phone', 'fax', 'email', 'address',
                'title', 'author', 'description', 'keywords', 'robots', 'publisher', 'language', 'generator',
                'googlebot', 'bingbot', 'alexa', 'headerCode', 'footerCode', 'copyright','location'
            ]);
            foreach (['logo', 'mobileLogo', 'favicon'] as $field) {
                if (isset($formData[$field])) {
                    $formData[$field] = str_replace('http://127.0.0.1:8000/', '', $formData[$field]);
                }
            }
            if (!$settings) {
                $settings = new Settings();
                $settings->id = 1; // Yeni bir ayar oluşturulurken id değeri belirtilmeli
            }
            $settings->fill($formData);
            $settings->save();
            return redirect()->back()->with('success', 'Ayarlar başarıyla güncellendi.');
        }
        return view('admin.settings',compact('admin','settings'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
//
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }
}
