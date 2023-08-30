<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;

use Illuminate\Support\Str;

class HomeSettingController extends Controller
{
    public function adminhomesetting(Request $request)
    {



        $data7=HomeSetting::orderBy('home_settings.id','desc')->select('home_settings.*')->get();

          $thearray = [];
         if(count($data7) > 0)
         {
            foreach($data7 as $k2=>$v2)
            {


                        $thearray[]=array(

                            'slider'=>$v2->slider
                           ,'slider_text'=>$v2->slider_text
                           ,'slider_header'=>$v2->slider_header
                           ,'description'=>$v2->description
                           ,'link'=>$v2->link
                            ,'id'=>$v2->id
                        );

            }
         }

       $data = $this->paginate_adminhomesetting($thearray);

       if($request->ajax()){
           return view('admin.home.home-pagination',['homes'=>$data]);
       }
       return view('admin.home.home',['homes'=>$data]);



    }
     public function paginate_adminhomesetting($items, $perPage = 10, $page = null, $options = [])
        {
            $options = ['path' => Route('adminhomesetting')] ;

            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
            $items = $items instanceof Collection ? $items : Collection::make($items);
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        }




public function adminhomesettingview($id)
{


    $home_settings = HomeSetting::find($id);
    $asset_path = asset('');

    return json_encode(array('status'=>'ok','data'=>$home_settings,'asset_path'=>$asset_path,));


}

  public function adminhomesettingdelete($id)
  {

    $home_settings = HomeSetting::find($id);
    $result =$home_settings->delete();

    if($result)
    {
        Session::flash('error', 'Data deleted successfully!');

        return response()->json([
          'message' => 'Data deleted successfully!'
        ]);
    }
    else
    {
        Session::flash('error', 'Something wrong!');

        return response()->json([
          'message' => 'Something wrong!'
        ]);
    }



}

public function adminhomesettingstore(Request $request)
{
     $created_by = Auth::id();
     if($request->hasfile('slider'))
     {
             $image=$request->file('slider') ;


         $originName = $image->getClientOriginalName();
         $fileName = pathinfo($originName, PATHINFO_FILENAME);
         $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

         $extension = $image->getClientOriginalExtension();
         $fileName = $fileName.'_'.time().'.'.$extension;


         if (in_array($extension, ['png','jpg','jpeg',]))
         {
            $image->move(public_path().'/frontend/images/', $fileName);
            $attachment_1 =  'frontend/images/'.$fileName;

               $slider = $attachment_1;




         }




 }
      $home_settings = new HomeSetting();

        $home_settings->slider = $slider;
        $home_settings->slider_text = $request->slider_text;
        $home_settings->slider_header = $request->slider_header;
        $home_settings->description = $request->description;
        $home_settings->link = $request->link;



        if($home_settings->save()){
             Session::flash('success', 'successfully home setting added!');

             return response()->json([
              'message' => 'successfully home setting added!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
        }


}

public function adminhomesettingupdate(Request $request, HomeSetting $home_settings,$id)
{


    $slider=$request->old_slider;


    if($request->file('slider'))
    {
        if(file_exists(public_path().'/'.$request->old_slider))
        {
            if($request->old_slider!='')
            {
            unlink(public_path().'/'.$request->old_slider);
            }
        }

            $image=$request->file('slider') ;


             $originName = $image->getClientOriginalName();
             $fileName = pathinfo($originName, PATHINFO_FILENAME);
             $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

             $extension = $image->getClientOriginalExtension();
             $fileName = $fileName.'_'.time().'.'.$extension;

             if (in_array($extension,['png','jpg','jpeg']))
             {
                if($image->move(public_path().'/frontend/images/', $fileName))
                {
                    $attachment_1 =  'frontend/images/'.$fileName;

                    $slider = $attachment_1;
                }
                else
                {
                   return response()->json(['status'=>'error','error'=>'slider  couldn\'t save, please try again later!']);
                }
             }
    }
        $home_settings =  HomeSetting::where('id',$id)->first();
        if($slider) {
            $home_settings->slider = $slider;
        }
         $home_settings->slider_text = $request->slider_text;
         $home_settings->slider_header = $request->slider_header;
         $home_settings->description = $request->description;
         $home_settings->link = $request->link;




        if($home_settings->save()){
             Session::flash('success', 'successfully home setting updated!');

             return response()->json([
              'message' => 'successfully home setting updated!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
             }     }



}
