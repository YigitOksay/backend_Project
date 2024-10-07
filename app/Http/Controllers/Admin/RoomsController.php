<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\RoomFeature;
use App\Models\RoomCategories;
use App\Models\RoomsAndFeatures;
use App\Models\Images;
use Auth;
use App\Models\Admin;
class RoomsController extends Controller
{

    public function index() {
        $rooms = Rooms::get()->toArray();
        $users = Admin::get()->toArray();
        return view('admin.rooms.index', compact('rooms','users'));
    }

    public function edit(Request $request, $id=null)
    {
        $userId = Auth::guard('admin')->user()->id;
        $allCategories = RoomCategories::get()->toArray();
        $allFeatures = RoomFeature::get()->toArray();
        $roomImages = Images::get()->toArray();
        $selectedFeature = RoomsAndFeatures::get()->toArray();
        $selectedImage = Images::get()->toArray();

        if($id === null){
            $pageTitle="Oda Ekleme";
            $message = "Bilgiler Kayıt Edildi.";
            $rooms = new Rooms;
            $rooms->created_at = now();
            $rooms->createUserId = $userId;

        } else {
            $pageTitle="Oda Düzeleme";
            $rooms = Rooms::find($id);
            $message = "Bilgiler Güncellendi.";
            $rooms->updated_at = now();
            $rooms->updateUserId = $userId;
            $selectedFeature = RoomsAndFeatures::where('room_id', $id)->get()->pluck('feature_id')->toArray();
            $selectedImage = Images::where('room_id', $id)->get()->pluck('image_path')->toArray();

        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules=[
                'title'=>'required',
            ];
            $customMessages=[
                'title.require' => 'Başlık giriniz.',
            ];

            if(isset($data['status']) && $data['status'] == 'on'){
                $rooms->status = 1;
            } else {
                $rooms->status = 0;
            }

            if(isset($data['homeStatus']) && $data['homeStatus'] == 'on'){
                $rooms->homeStatus = 1;
            } else {
                $rooms->homeStatus = 0;
            }

            $rooms->title = $data['title'];
            $rooms->content = $data['content'];
            $rooms->pets = $data['pets'];
            $rooms->category_id = $data['subPage'];
            $rooms->entrance = $data['entrance'];
            $rooms->exit = $data['exit'];
            $rooms->cancellation = $data['cancellation'];
            $rooms->extra = $data['extra'];
            $rooms->information = $data['information'];
            $rooms->url = $data['metaUrl'];
            $rooms->meta_title = $data['metaTitle'];
            $rooms->meta_description = $data['metaContent'];
            $rooms->meta_keywords = $data['metaKey'];
            $rooms->save();

            // Odanın özelliklerini güncellemeden önce mevcut olanları sil
            RoomsAndFeatures::where('room_id', $rooms->id)->delete();

            if ($request->filled('features', array())) {
                $selectedFeatures = explode(',', $request->features);

                foreach ($selectedFeatures as $featureId) {
                    RoomsAndFeatures::create([
                        'room_id' => $rooms->id,
                        'feature_id' => $featureId
                    ]);
                }
            }

                //echo "<pre>"; print_r($data); die;


                // Görselleri işleyin
                for ($i = 1; $i <= 12; $i++) {
                    if (!empty($data["image{$i}"])) {
                        $urlParts = parse_url($data["image{$i}"]);
                        $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
                        // Resim varsa ve yolu geçerliyse
                        if ($onlyPath) {
                            // Resmi kaydedin
                            $imagePath = $onlyPath;
                            //dd($imagePath);

                            // Veritabanına kaydedin
                            DB::table('images')->insert([
                                'room_id' => $rooms->id,
                                'image_id' => $i,
                                'image_path' => $imagePath,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }
                    }
                }


            return redirect('/NPanel/rooms')->with('success_message', $message);
        }

        return view('admin.rooms.crud')->with(compact('pageTitle', 'rooms', 'allCategories', 'selectedFeature', 'allFeatures','roomImages','selectedImage'));
    }


    public function destroy($id)
    {
        // Delete
        Rooms::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Oda Silindi.');
    }

    public function imagesDestroy($id)
    {
        Images::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Resim Silindi.');
    }

    public function featuresIndex() {
        $features = RoomFeature::get()->toArray();
        $users = Admin::get()->toArray();
        return view('admin.rooms.features.index', compact('features','users'));
    }

    public function featuresEdit(Request $request,$id=null)
    {
        $userId = Auth::guard('admin')->user()->id;
        if($id==""){
            $pageTitle="Oda Özellik Ekleme";
            $message = "Bilgiler Kayıt Edildi.";
            $feature = new RoomFeature;
            $feature->created_at = now();
            $feature->createUserId = $userId;
        }else{
            $pageTitle="Oda Özellik Düzeleme";
            $feature = RoomFeature::find($id);
            $message = "Bilgiler Güncellendi.";
            $feature->updated_at = now();
            $feature->updateUserId = $userId;
        }
        if($request->isMethod('post')){
            $data = $request->all();

            $rules=[
                'title'=>'required',
            ];
            $customMessages=[
                'title.require' => 'Başlık giriniz.',
            ];

            if(isset($data['status']) && $data['status'] == 'on'){
                $feature->status = 1;
            } else {
                $feature->status = 0;
            }

            $urlParts = parse_url($data['image']);
            $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
            $feature->image = $onlyPath;
            $feature->title = $data['title'];
            $feature->orderNo = $data['orderNo'];
            $feature->save();

            return redirect('/NPanel/rooms/features')->with('success_message',$message);
        }
        return view('admin.rooms.features.crud')->with(compact('pageTitle','feature'));
    }

    public function featuresDestroy($id)
    {
        // Delete
        RoomFeature::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Özellik Silindi.');
    }

    public function categoryIndex() {
        $categories = RoomCategories::get()->toArray();
        $users = Admin::get()->toArray();
        return view('admin.rooms.categories.index', compact('categories', 'users'));
    }

    public function categoryCrud(Request $request,$id=null)
    {
        $allCategories=RoomCategories::get()->toArray();
        $userId = Auth::guard('admin')->user()->id;
        if($id==""){
            $pageTitle="Kategori Ekleme";
            $categories = new RoomCategories;
            $message = "Bilgiler Kayıt Edildi.";
            $categories->created_at = now();
            $categories->createUserId = $userId;
        }else{
            $pageTitle="Kategori Düzeleme";
            $categories = RoomCategories::find($id);
            $message = "Bilgiler Güncellendi.";
            $categories->updated_at = now();
            $categories->updateUserId = $userId;
        }
        if($request->isMethod('post')){
            $data = $request->all();
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

            $urlParts = parse_url($data['image']);
            $onlyPath = isset($urlParts['path']) ? $urlParts['path'] : '';
            $categories->image = $onlyPath;

            $categories->title = $data['title'];
            $categories->content = $data['content'];
            $categories->url = $data['metaUrl'];
            $categories->meta_title = $data['metaTitle'];
            $categories->meta_description = $data['metaContent'];
            $categories->meta_keywords = $data['metaKey'];
            $categories->subId = $data['subPage'];
            $categories->orderNo = $data['orderNo'];
            $categories->save();
            return redirect('/NPanel/rooms/categories')->with('success_message',$message);
        }
        return view('admin.rooms.categories.crud')->with(compact('pageTitle','categories','allCategories'));
    }
    public function categoryDestroy($id)
    {
        // Delete
        RoomCategories::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Oda kategorisi Silindi.');
    }
}
