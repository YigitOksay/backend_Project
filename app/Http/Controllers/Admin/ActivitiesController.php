<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\Admin;
use App\Models\Images;
use Illuminate\Http\Request;
use Auth;

class ActivitiesController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id=null)
    {
        $userId = Auth::guard('admin')->user()->id;
        $admin = Admin::find($userId);
        $activities = Activities::find(1);
        $imageGallery = Images::get()->toArray();
        $selectedImage = Images::where('room_id', $id)->get()->pluck('image_path')->toArray();

        if($request->isMethod('post')){
            $formData = $request->only([
                'title', 'subTitle', 'leftTitle', 'leftContent', 'rightTitle', 'rightContent','url','meta_title','meta_description','meta_keywords'
            ]);



            if (!$activities) {
                $activities = new Activities();
                $activities->id = 1;
            }
            $activities->fill($formData);
            $activities->save();
// Görselleri işleyin
                for ($i = 1; $i <= 12; $i++) {
                    if (!empty($request["image{$i}"])) {
                        $urlParts = parse_url($request["image{$i}"]);
                        $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
                        // Resim varsa ve yolu geçerliyse
                        if ($onlyPath) {
                            // Resmi kaydedin
                            $imagePath = $onlyPath;
                            //dd($imagePath);

                            // Veritabanına kaydedin
                            DB::table('images')->insert([
                                'room_id' => 1,
                                'image_id' => $i,
                                'image_path' => $imagePath,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }
                    }
                }


            return redirect()->back()->with('success', 'Sayfa içeriği başarıyla güncellendi.');
        }
        return view('admin.activities.index',compact('admin','activities','imageGallery'));
    }


    public function imagesDestroy($id)
    {
        Images::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Resim Silindi.');
    }


}
