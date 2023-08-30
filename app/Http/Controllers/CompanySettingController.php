<?php

namespace App\Http\Controllers;

use App\Models\CompanySetting;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;

use Illuminate\Support\Str;

class CompanySettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


public function Company(Request $request)
{



    $data7=CompanySetting::orderBy('company_settings.id','desc')->select('company_settings.*')->get();

      $thearray = [];
     if(count($data7) > 0)
     {
        foreach($data7 as $k2=>$v2)
        {

                $logo =$v2->logo != ''? asset($v2->logo):'';
                $fav_icon =$v2->fav_icon != ''? asset($v2->fav_icon):'';
                 $director_signature =$v2->director_signature != ''? asset($v2->director_signature):'';

                

                    $thearray[]=array(
                        'name'=>$v2->name
                        ,'logo'=>$logo
                        ,'director_signature'=>$director_signature
                        ,'copyright_text'=>$v2->copyright_text
                        , 'address'=>$v2->address
                        ,'phone'=>$v2->phone
                        , 'fax'=>$v2->fax
                        ,'country'=>$v2->country
                        , 'website'=>$v2->website
                        ,'id'=>$v2->id
                        , 'fav_icon'=>$fav_icon
                        , 'home_page_short_description'=>$v2->home_page_short_description
                        , 'footer_text'=>$v2->footer_text
                        ,'header_text'=>$v2->header_text
                        , 'facebook_link'=>$v2->facebook_link
                        , 'instagram_link'=>$v2->instagram_link
                        , 'twiter_link'=>$v2->twiter_link
                        , 'linkedin_link'=>$v2->linkedin_link
                        , 'youtube_link'=>$v2->youtube_link
                    );

        }
     }

   $data = $this->paginate_company($thearray);

   if($request->ajax()){
       return view('admin.company.company-pagination',['companys'=>$data]);
   }
   return view('admin.company.company',['companys'=>$data]);



}
 public function paginate_company($items, $perPage = 3, $page = null, $options = [])
    {
        $options = ['path' => Route('company')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanySetting  $companySetting
     * @return \Illuminate\Http\Response
     */
    public function show(CompanySetting $companySetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanySetting  $companySetting
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanySetting $companySetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanySetting  $companySetting
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, CompanySetting $companySetting,$id)
    {
         $name = $request->input('name');
         $address = $request->input('address');
         $phone = $request->input('phone');
         $fax = $request->input('fax');
         $website = $request->input('website');
         $country = $request->input('country');
         $copyright_text = $request->input('copyright_text');

         $home_page_short_description = $request->input('home_page_short_description_value');
         $footer_text = $request->input('footer_text_value');
         $header_text = $request->input('header_text_value');


         $logo=$request->old_logo;


            if($request->file('logo'))
            {
                if(file_exists(public_path().'/'.$request->old_logo))
                {
                    if($request->old_logo!='')
                    {
                    unlink(public_path().'/'.$request->old_logo);
                    }
                }

                    $image=$request->file('logo') ;


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

                            $logo = $attachment_1;
                        }
                        else
                        {
                           return response()->json(['status'=>'error','error'=>'logo  couldn\'t save, please try again later!']);
                        }
                     }
            }

             $fav_icon=$request->old_fav_icon;


            if($request->file('fav_icon'))
            {
                if(file_exists(public_path().'/'.$request->old_fav_icon))
                {
                    if($request->old_fav_icon!='')
                    {
                    unlink(public_path().'/'.$request->old_fav_icon);
                    }
                }

                    $image=$request->file('fav_icon') ;


                     $originName = $image->getClientOriginalName();
                     $fileName = pathinfo($originName, PATHINFO_FILENAME);
                     $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

                     $extension = $image->getClientOriginalExtension();
                     $fileName = $fileName.'_'.time().'.'.$extension;

                     if (in_array($extension,['png','jpg','jpeg','ico']))
                     {
                        if($image->move(public_path().'/frontend/images/', $fileName))
                        {
                            $attachment_1 =  'frontend/images/'.$fileName;

                            $fav_icon = $attachment_1;
                        }
                        else
                        {
                           return response()->json(['status'=>'error','error'=>'Fav icon  couldn\'t save, please try again later!']);
                        }
                     }
            }

            
             $director_signature=$request->old_director_signature;


            if($request->file('director_signature'))
            {
                if(file_exists(public_path().'/'.$request->old_director_signature))
                {
                    if($request->old_director_signature!='')
                    {
                    unlink(public_path().'/'.$request->old_director_signature);
                    }
                }

                    $image=$request->file('director_signature') ;


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

                            $director_signature = $attachment_1;
                        }
                        else
                        {
                           return response()->json(['status'=>'error','error'=>'Director signature  couldn\'t save, please try again later!']);
                        }
                     }
            }

            $company =  CompanySetting::where('id',$id)->first();
            $company->name = $request->name;
            $company->address = $request->address;
            $company->phone = $request->phone;
            $company->fax = $request->fax;
            $company->website = $request->website;
            $company->country = $request->country;
            $company->home_page_short_description = $home_page_short_description;
            $company->footer_text = $footer_text;
            $company->header_text = $header_text;
            $company->copyright_text = $request->copyright_text;
            $company->logo = $logo;
            $company->fav_icon = $fav_icon;
            $company->director_signature = $director_signature;

            

             $company->facebook_link = $request->facebook_link;
              $company->instagram_link = $request->instagram_link;
               $company->twiter_link = $request->twiter_link;
                $company->linkedin_link = $request->linkedin_link;
                 $company->youtube_link = $request->youtube_link;




            if($company->save()){

                $data7=CompanySetting::orderBy('company_settings.id','desc')->select('company_settings.*')->get();
                
                 Session::flash('success', 'successfully company updated!');

                 return response()->json([
                  'message' => 'successfully company updated!',
                  'data'=> $data7
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);
            }

    }


    public function companyView($id)
    {


        $companys = CompanySetting::find($id);
        //return $categories;
        $asset = asset('');
        return json_encode(array('status'=>'ok','data'=>$companys,'asset'=>$asset));


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanySetting  $companySetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanySetting $companySetting)
    {
        //
    }
}
