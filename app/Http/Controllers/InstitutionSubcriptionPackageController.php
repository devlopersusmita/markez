<?php

namespace App\Http\Controllers;


use App\Models\InstitutionSubcriptionPackage;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;
use Illuminate\Support\Facades\Validator;

class InstitutionSubcriptionPackageController extends Controller
{
    public function Institutionsubcriptionpackage(Request $request)
{



    $data7=InstitutionSubcriptionPackage::orderBy('institution_subscription_packages.id','desc')->when($request->has("title"),function($q)use($request){



           $title  = $request->get("title");
           if($title!='')
            {
               return $q->where("institution_subscription_packages.title","like","%".$title."%");
           }


    })->select('institution_subscription_packages.*')->get();

      $thearray = [];
     if(count($data7) > 0)
     {
        foreach($data7 as $k2=>$v2)
        {


                    $thearray[]=array(
                        'title'=>$v2->title
                        ,'order_no'=>$v2->order_no
                        , 'price'=>$v2->price
                        , 'days'=>$v2->days
                        , 'descriptions'=>$v2->descriptions
                        ,'id'=>$v2->id
                    );

        }
     }

   $data = $this->paginate_institutionsubcriptionpackage($thearray);

   if($request->ajax()){
       return view('admin.institution_subcription_package.package-pagination',['institutionsubcriptionpackages'=>$data]);
   }
   return view('admin.institution_subcription_package.package',['institutionsubcriptionpackages'=>$data]);



}
 public function paginate_institutionsubcriptionpackage($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('institutionsubcriptionpackage')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function store(Request $request)
    {

        $v = Validator::make($request->all(),[
            'title' => 'required|unique:institution_subscription_packages,title',

        ]);

        if ($v->fails())
        {

           return response()->json([
            'type'=>'error',
            'message' => $v->errors()->all()
        ]);
        }
        else
        {
            $descriptions='';
            if($request->descriptions_value!='')
            {
                $descriptions=$request->descriptions_value;
            }
            $title = $request->input('title');

        $created_by = Auth::id();



         $package = new InstitutionSubcriptionPackage();
            $package->title = $request->title;
            $package->order_no = $request->order_no;
            $package->price = $request->price;

            $package->days = $request->days;
            $package->created_by = $created_by;
            $package->descriptions =  $descriptions;
            if($package->save()){
                 Session::flash('success', 'successfully package added!');

                 return response()->json([
                  'message' => 'successfully package added!'
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);
               }
            }

    }

    public function packageView($id)
{


    $institutionsubcriptionpackages = InstitutionSubcriptionPackage::find($id);
    //return $categories;
    return json_encode(array('status'=>'ok','data'=>$institutionsubcriptionpackages));


}

public function update(Request $request, InstitutionSubcriptionPackage $institutionsubcriptionpackage,$id)
{
    $v = Validator::make($request->all(),[
        //'title' => 'required|unique:cms,title',
        'title' => 'required|unique:institution_subscription_packages,title,'.$id,

    ]);

    if ($v->fails())
    {

       return response()->json([
        'type'=>'error',
        'message' => $v->errors()->all()
    ]);
    }
    else
    {
        $descriptions='';
        if($request->descriptions_value!='')
        {
            $descriptions=$request->descriptions_value;
        }


        $package =  InstitutionSubcriptionPackage::where('id',$id)->first();
        $package->title = $request->title;

        $package->order_no = $request->order_no;
        $package->price = $request->price;
        $package->days = $request->days;
        $package->descriptions = $descriptions;
       //exit();



        if($package->save()){
             Session::flash('success', 'successfully package updated!');

             return response()->json([
              'message' => 'successfully package updated!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
        }

    }

}

}
