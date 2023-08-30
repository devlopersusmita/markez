<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

class FaqController extends Controller
{
    public function Faq(Request $request){



        $data7=Faq::orderBy('faq.id','desc')->when($request->has("title"),function($q)use($request){



               $title  = $request->get("title");
               if($title!='')
                {
                   return $q->where("faq.title","like","%".$title."%");
               }


        })->select('faq.*')->get();

          $thearray = [];
         if(count($data7) > 0)
         {
            foreach($data7 as $k2=>$v2)
            {


                        $thearray[]=array(
                            'title'=>$v2->title
                            ,'slug'=>$v2->slug
                            ,'contents'=>$v2->contents
                            ,'order_no'=>$v2->order_no
                            , 'status'=>$v2->status
                            ,'id'=>$v2->id
                        );

            }
         }

       $data = $this->paginate_faq($thearray);

       if($request->ajax()){
           return view('admin.faq.faq-pagination',['faqs'=>$data]);
       }
       return view('admin.faq.faq',['faqs'=>$data]);



    }
     public function paginate_faq($items, $perPage = 10, $page = null, $options = [])
        {
            $options = ['path' => Route('faq')] ;

            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
            $items = $items instanceof Collection ? $items : Collection::make($items);
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        }

        public function statusFaq($id,$status)
        {
          $data = Faq::find($id);
          $data->status = $status;
          $result = $data->save();
          if($result)
          {
            Session::flash('success', 'Status changed successfully!');

                 return response()->json([
                  'message' => 'Status changed successfully!'
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


        public function faqView($id)
{


    $faq = Faq::find($id);

    return json_encode(array('status'=>'ok','data'=>$faq));


}

  public function destroy($id)
  {

    $faq = Faq::find($id);
    $result =$faq->delete();

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

public function store(Request $request)
{

    $v = Validator::make($request->all(),[
        'title' => 'required|unique:faq,title',

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
        $contents='';
        if($request->contents_value!='')
        {
            $contents=$request->contents_value;
        }



    $title = $request->input('title');


    $created_by = Auth::id();

    $slug = Str::slug($request->input('title'));


     $faq = new Faq();
        $faq->title = $request->title;
        $faq->slug = $slug;
        $faq->created_by = $created_by;
        $faq->contents =  $contents;
        $faq->order_no = $request->order_no;


        if($faq->save()){
             Session::flash('success', 'successfully faq added!');

             return response()->json([
              'message' => 'successfully faq added!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
        }
    }

}

public function update(Request $request, Faq $faq,$id)
{
    $v = Validator::make($request->all(),[
        //'title' => 'required|unique:faq,title',
         'title' => 'required|unique:faq,title,'.$id,

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
        $contents='';
        if($request->contents_value!='')
        {
            $contents=$request->contents_value;
        }
     $title = $request->input('title');
     $status = $request->input('status');
       
     $faq =  Faq::where('id',$id)->first();
        $faq->title = $request->title;
        $faq->status = $status;
      
         $faq->contents = $contents;
         $faq->order_no = $request->order_no;

        if($faq->save()){
             Session::flash('success', 'successfully faq updated!');

             return response()->json([
              'message' => 'successfully faq updated!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
             }     }

}

}
