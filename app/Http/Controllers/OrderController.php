<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Course;
use App\Models\CourseContent;
use App\Models\User;

use App\Models\InstitutionSubcriptionPackage;

use Illuminate\Support\Facades\Stroage;
use DB;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;


use Illuminate\Support\Str;

class OrderController extends Controller
{

public function Order(Request $request){


    $user_id=Auth::id();

$local_order_query = Order::where('type','course')->get();
$local_order_array= [];

if(!empty($local_order_query)){
    foreach($local_order_query as $temp){
  $local_order_array[]=$temp->course_id;
    }
}

    $courses=Course::whereIn('id',$local_order_array)->get();


   $data7=Order::where('orders.type','course')->leftJoin('courses','courses.id','=','orders.course_id')->leftJoin('users','users.id','=','orders.user_id')

   ->when($request->has("course_id"),function($q)use($request){
    $course_id  = $request->get("course_id");
    if($course_id!='')

     {
        
        return $q->where("orders.course_id","like","%".$course_id."%");
    }




})  ->when($request->has("status"),function($q)use($request){
    $status  = $request->get("status");
    if($status!='')
     {
        return $q->where("orders.status","like","%".$status."%");
    }




})

->select('orders.*','courses.title as course_name','users.name as user_name')->get();
    //dd($data7);




    $thearray = [];
    if(count($data7) > 0)
    {
    foreach($data7 as $k2=>$v2)
    {


                $thearray[]=array(
                    'course_id'=>$v2->course_id
                    ,'user_id'=>$v2->user_id
                    , 'status'=>$v2->status
                    , 'total'=>$v2->total
                    , 'course_name'=>$v2->course_name
                    , 'user_name'=>$v2->user_name
                    , 'created_at'=>$v2->created_at
                    ,'id'=>$v2->id
                );

    }
}

$data = $this->paginate_order($thearray);

   if($request->ajax()){
       return view('admin.order.order-pagination',['orders'=>$data,'courses'=> $courses]);
   }
   return view('admin.order.order',['orders'=>$data,'courses'=> $courses]);



} 

public function institution_subscription_order(Request $request){


    $user_id=Auth::id();

$local_order_query = Order::where('type','subcription')->get();
$local_order_array= [];

if(!empty($local_order_query)){
    foreach($local_order_query as $temp){
  $local_order_array[]=$temp->institution_subcription_package_id;
    }
}

    $packages=InstitutionSubcriptionPackage::whereIn('id',$local_order_array)->get();
    $institutions=User::where('role','3')->orderBy('name','asc')->get();
  

   $data7=Order::where('orders.type','subcription')->leftJoin('institution_subscription_packages','institution_subscription_packages.id','=','orders.institution_subcription_package_id')->leftJoin('users','users.id','=','orders.user_id')

   ->when($request->has("institution_subcription_package_id"),function($q)use($request){
    $institution_subcription_package_id  = $request->get("institution_subcription_package_id");
    if($institution_subcription_package_id!='')

     {
        
        return $q->where("orders.institution_subcription_package_id","like","%".$institution_subcription_package_id."%");
    }




})  ->when($request->has("status"),function($q)use($request){
    $status  = $request->get("status");
    if($status!='')
     {
        return $q->where("orders.status","like","%".$status."%");
    }




}) ->when($request->has("user_id"),function($q)use($request){
    $user_id_input  = $request->get("user_id");
    if($user_id_input!='')
     {
        return $q->where("orders.user_id",$user_id_input);
    }




})

->select('orders.*','institution_subscription_packages.title as package_name','users.name as user_name')->get();
    //dd($data7);




    $thearray = [];
    if(count($data7) > 0)
    {
    foreach($data7 as $k2=>$v2)
    {


                $thearray[]=array(
                    'institution_subcription_package_id'=>$v2->institution_subcription_package_id
                    , 'days'=>$v2->days
                    ,'user_id'=>$v2->user_id
                    , 'status'=>$v2->status
                    , 'total'=>$v2->total
                    , 'package_name'=>$v2->package_name
                    , 'user_name'=>$v2->user_name
                    , 'created_at'=>$v2->created_at
                    ,'id'=>$v2->id
                );

    }
}

$data = $this->paginate_institution_subcription_package_order($thearray);

   if($request->ajax()){
       return view('admin.institution_subcription_package_order.institution_subcription_package_order-pagination',['orders'=>$data,'packages'=> $packages,'institutions'=>$institutions]);
   }
   return view('admin.institution_subcription_package_order.institution_subcription_package_order',['orders'=>$data,'packages'=> $packages,'institutions'=>$institutions]);



}

 public function paginate_order($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('order')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


 public function paginate_institution_subcription_package_order($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institution_subscription_order')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function adminpaymentView($id)
    {

       $payment = Payment::where('payments.order_id',$id)->orderBy('payments.id','desc')->get();
     return json_encode(array('status'=>'ok','data'=>$payment));


    }
    public function adminpaymentView_institution_subcription($id)
    {

       $payment = Payment::where('payments.order_id',$id)->orderBy('payments.id','desc')->get();
     return json_encode(array('status'=>'ok','data'=>$payment));


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

}
