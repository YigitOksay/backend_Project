<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\HomepageController;
use App\Models\Activities;
use App\Models\BlogCategories;
use App\Models\HomePage;
use App\Models\Sliders;
use App\Models\RoomCategories;
use App\Models\Rooms;
use App\Models\Images;
use App\Models\Pages;
use App\Models\Settings;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PageViewController extends Controller
{
    public function home()
    {

        $modules = HomePage::where('status', 1)
            ->orderby('moduleId')
            ->get();


        $sliders = Sliders::where('status', 1)
            ->orderBy('orderNo')
            ->get();

        $rooms = RoomCategories::where('status', 1)
            ->orderBy('orderNo')
            ->get();


        $blogCategories = BlogCategories::where('status', 1)
            ->orderBy('orderNo')
            ->get();


        $viewRooms = rooms::where('status', 1)
            ->get();

            $roomsDetails = Rooms::where('status',1)
            ->get();





        return view('themes/home/index', compact('sliders', 'rooms', 'blogCategories', 'modules', 'viewRooms','roomsDetails'));
    }


    public function about($url)
    {
        $roomsDetails = Rooms::where('status',1)
        ->get();
        
         
            $pages = Pages::where('url', $url)
            ->first(); 
    
        
        if (!$pages) {
            abort(404); 
        }
    
        return view('themes/pageContent/index',compact('roomsDetails','pages'));
    }

    public function roomsCategory()
    {
        $roomsDetails = Rooms::where('status',1)
        ->get();


        $categories = RoomCategories::where('status', 1)
            ->orderBy('orderNo')
            ->get();

        return view('themes/rooms/roomsList/index', compact('categories','roomsDetails'));
    }

    public function showRoom($url)
    {
                
        $roomsDetails = Rooms::where('url', $url)
        ->where('status',1)
        ->get();


        return view('themes/rooms/roomsDetail/index', compact('roomsDetails'));
    }



    public function activities()
    {
        $roomsDetails = Rooms::where('status',1)
        ->get();



        $activities = Activities::all();



        return view('themes.activities.index', compact('activities','roomsDetails'));
    }

    public function contact()
    {
        $roomsDetails = Rooms::where('status',1)
        ->get();

        $contact = Settings::where('id',1)
        ->first();
        //  dd($contact);


        return view('themes.contact.index',compact('roomsDetails','contact'));
    }
}
