<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\About;
use App\Models\MultiImage;
use Illuminate\Support\Carbon;
use Image;

class AboutController extends Controller
{
    
    public function AboutPage(){

       
        $aboutpage=About::find(1);
         return view('admin.about_page.about_page_all',compact('aboutpage'));
         
     }
     public function UpdateAbout(Request $request){
        $about_id = $request->id;
        if($request->file('about_image')){
           $image=$request->file('about_image');
           $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//12343223.jpg
       
           Image::make($image)->resize(523,605)->save('upload/home_about/'.$name_gen);
           $save_url='upload/home_about/'. $name_gen;
   
           About::findOrfail($about_id)->update([
            'title'=>$request->title,
            'short_title'=>$request->short_title,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'about_image'=>$save_url,
   
           ]);
           
           $notification = array(
               'message' => 'About  Updated with Image Successfully', 
               'alert-type' => 'success'
           );
   
           return redirect()->back()->with($notification); 
       
           }
           else{
               About::findOrfail($about_id)->update([
                   'title'=>$request->title,
                   'short_title'=>$request->short_title,
                   'short_description'=>$request->short_description,
                   'long_description'=>$request->long_description,
                   
                  
       
               ]);
               
               $notification = array(
                   'message' => 'About Updated without Image Successfully', 
                   'alert-type' => 'success'
               );
       
               return redirect()->back()->with($notification); 
   
           }
        }
        public function HomeAbout(){
            $aboutpage=About::find(1);
            return view('frontend.about_page',compact('aboutpage'));
        }

        public function AboutMultiImage(){
            return view('admin.about_page.multimage');
        }


        public function StoreMultiImage(Request $request){
             $image=$request->file('multi_image');
         foreach($image as $multi_image){
                $name_gen=hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();//1232345256.jpg
                
                Image::make($multi_image)->resize(220,220)->save('upload/multi/'.$name_gen);
                $save_url='upload/multi/'.$name_gen;

                MultiImage::insert([
                    'multi_image'=>$save_url,
                    'created_at'=>Carbon::now()
                    
                ]);
                $notification=array(
                    'message'=>'Multi Image Inserted Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);

             }
        }

     public function AllMultiImage(){

        $allMultiImage=MultiImage::all();
        return view('admin.about_page.all_multiimage',compact('allMultiImage'));
     }

}
 