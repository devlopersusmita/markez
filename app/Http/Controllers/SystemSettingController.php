<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;

use Illuminate\Support\Str;

class SystemSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


public function System(Request $request){


    $countries = Country::orderBy('c_name','asc')->get();
    $cities = City::orderBy('city_name','asc')->get();

    $data7 = SystemSetting::leftJoin('countries','system_settings.default_country_id','=','countries.id')->leftJoin('cities','system_settings.default_city_id','=','cities.id')->select('system_settings.*','countries.c_name','cities.city_name')->get();
//dd($data7);

      $thearray = [];
     if(count($data7) > 0)
     {
        foreach($data7 as $k2=>$v2)
        {


                    $thearray[]=array(
                        'student_default_subscription_day'=>$v2->student_default_subscription_day
                        ,'teacher_default_subscription_day'=>$v2->teacher_default_subscription_day
                        , 'institution_default_subscription_day'=>$v2->institution_default_subscription_day
                        ,'default_country_id'=>$v2->default_country_id
                        , 'default_city_id'=>$v2->default_city_id
                        , 'city_name'=>$v2->city_name
                        , 'country_name'=>$v2->c_name
                        ,'teacher_online_class_before_minute'=>$v2->teacher_online_class_before_minute
                        , 'student_online_class_before_minute'=>$v2->student_online_class_before_minute
                        ,'id'=>$v2->id
                    );

        }
     }

   $data = $this->paginate_system($thearray);


   if($request->ajax()){

       return view('admin.system.system-pagination',['systems'=>$data,'countries'=>$countries,'cities'=>$cities]);
   }
   return view('admin.system.system',['systems'=>$data,'countries'=>$countries,'cities'=>$cities]);



}
 public function paginate_system($items, $perPage = 3, $page = null, $options = [])
    {
        $options = ['path' => Route('system')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, SystemSetting $systemSetting,$id)
    {
         $student_default_subscription_day = $request->input('student_default_subscription_day');
         $teacher_default_subscription_day = $request->input('teacher_default_subscription_day');
         $institution_default_subscription_day = $request->input('institution_default_subscription_day');
         $default_country_id = $request->input('default_country_id');
         $default_city_id = $request->input('default_city_id');
         $teacher_online_class_before_minute = $request->input('teacher_online_class_before_minute');
         $student_online_class_before_minute = $request->input('student_online_class_before_minute');



            $system =  SystemSetting::where('id',$id)->first();
            $system->student_default_subscription_day = $request->student_default_subscription_day;
            $system->teacher_default_subscription_day = $request->teacher_default_subscription_day;
            $system->institution_default_subscription_day = $request->institution_default_subscription_day;
            $system->default_country_id  =$request->default_country_id;
            $system->default_city_id = $request->default_city_id;
            $system->teacher_online_class_before_minute = $request->teacher_online_class_before_minute;
            $system->student_online_class_before_minute = $request->student_online_class_before_minute;
            //  $category->slug = $slug;

            if($system->save()){

                $data7 = SystemSetting::leftJoin('countries','system_settings.default_country_id','=','countries.id')->leftJoin('cities','system_settings.default_city_id','=','cities.id')->select('system_settings.*','countries.c_name','cities.city_name')->get();

                 Session::flash('success', 'successfully system settings updated!');

                 return response()->json([
                  'message' => 'successfully  system settings updated!',
                  'data'=> $data7

                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);
            }

    }


    public function systemView($id)
    {


        $systems = SystemSetting::find($id);
        //return $categories;
        return json_encode(array('status'=>'ok','data'=>$systems));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemSetting $systemSetting)
    {
        //
    }
}
