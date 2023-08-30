<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Http\Requests\StoreCmsRequest;
use App\Http\Requests\UpdateCmsRequest;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;

use Illuminate\Support\Str;

class CmsController extends Controller
{

public function Cms(Request $request){



    $data7=Cms::orderBy('cms.id','desc')->when($request->has("title"),function($q)use($request){



           $title  = $request->get("title");
           if($title!='')
            {
               return $q->where("cms.title","like","%".$title."%");
           }


    })->select('cms.*')->get();

      $thearray = [];
     if(count($data7) > 0)
     {
        foreach($data7 as $k2=>$v2)
        {


                    $thearray[]=array(
                        'title'=>$v2->title
                        ,'slug'=>$v2->slug
                        ,'contents'=>$v2->contents
                        , 'status'=>$v2->status
                        ,'id'=>$v2->id
                    );

        }
     }

   $data = $this->paginate_cms($thearray);

   if($request->ajax()){
       return view('admin.cms.cms-pagination',['cmses'=>$data]);
   }
   return view('admin.cms.cms',['cmses'=>$data]);



}
 public function paginate_cms($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('cms')] ;

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function store(Request $request)
    {
        $title = $request->input('title');
       // $slug = $request->input('name');
       $contents='';
       if($request->contents_value!='')
       {
           $contents=$request->contents_value;
       }
        $created_by = Auth::id();

        $slug = Str::slug($request->input('title'));

         $cms = new Cms();
            $cms->title = $request->title;
            $cms->slug = $slug;
            $cms->created_by = $created_by;
            $cms->contents =  $contents;


            if($cms->save()){
                 Session::flash('success', 'successfully cms added!');

                 return response()->json([
                  'message' => 'successfully cms added!'
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);
            }

    }


    public function update(Request $request, Cms $cms,$id)
    {
         $title = $request->input('title');
         $status = $request->input('status');
           $slug = Str::slug($request->input('title'));
           $contents='';
            if($request->contents_value!='')
            {
                $contents=$request->contents_value;
            }



         $cms =  Cms::where('id',$id)->first();
            $cms->title = $request->title;
            $cms->status = $status;
             $cms->slug = $slug;
             $cms->contents = $contents;

            if($cms->save()){
                 Session::flash('success', 'successfully cms updated!');

                 return response()->json([
                  'message' => 'successfully cms updated!'
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);
            }

    }


public function cmsView($id)
{


    $cms = Cms::find($id);
    //return $categories;
    return json_encode(array('status'=>'ok','data'=>$cms));


}


  public function destroy($id){

    $cms = Cms::find($id);
    $result =$cms->delete();

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


public function statuscms($id,$status)
{
  $data = Cms::find($id);
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Http\Requests\StoreCmsRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreCmsRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function show(Cms $cms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function edit(Cms $cms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCmsRequest  $request
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateCmsRequest $request, Cms $cms)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Cms $cms)
    // {
    //     //
    // }
}
