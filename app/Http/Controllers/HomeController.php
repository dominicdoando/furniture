<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{
    //GET ALL
    public function AllSlider(){
       $sliders = DB::table('sliders')->get();
       return view('admin.home.slider', compact('sliders'));
    }

    public function AddSlider(){
        return view('admin.home.create-slider');
    }

    //SAVE
    public function StorageSlider(Request $request){

        $validated = $request->validate([
            'sub_title' => 'required|max:255',
            'title' => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $image = $request->files->get('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1920, 790)->save('image/slider/'.$name_gen);
        $last_img ='image/slider/'.$name_gen;


        Slider::insert([
            'sub_title' => $request->sub_title,
            'title' => $request->title,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('all.slider')->with('success', 'Slide Update Successfully');
    }
    
    //EDIT
    public function EditSlider($id){
        $sliders = Slider::find($id);
        return view('admin.home.edit-slider', compact('sliders'));
    }

    //UPDATE
    public function UpdateSlider(Request $request, $id){
        $old_image = $request->old_image;
        $image = $request->files->get('image');
        if($image){
            $image = $request->files->get('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 200)->save('image/slider/'.$name_gen);
            $last_img ='image/slider/'.$name_gen;
            unlink($old_image);
            Slider::find($id)->update([
                'title' => $request->title,
                'sub_title' => $request->sub,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
            
        }else{
            Slider::find($id)->update([
                'title' => $request->title,
                'sub_title' => $request->sub,
                'created_at' => Carbon::now()
            ]);
        }
        return Redirect()->route('all.slider')->with('success', 'Slide Update Successfully');
    }
    //DELETE
    public function DeleteSlider($id){
        // $delete = Slider::find($id);
        // $delete->delete();
        DB::table('sliders')->delete($id);
        return Redirect()->route('all.slider')->with('success', 'Slider Delete Successfully');
    }

}
