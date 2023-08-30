<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;

use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



public function Category(Request $request)
{



    $data7=Category::orderBy('categories.id','desc')->when($request->has("name"),function($q)use($request){



           $name  = $request->get("name");
           if($name!='')
            {
               return $q->where("categories.name","like","%".$name."%");
           }


    })->select('categories.*')->get();

      $thearray = [];
     if(count($data7) > 0)
     {
        foreach($data7 as $k2=>$v2)
        {


                    $thearray[]=array(
                        'name'=>$v2->name
                        ,'slug'=>$v2->slug
                        , 'status'=>$v2->status
                        ,'id'=>$v2->id
                    );

        }
     }

   $data = $this->paginate_category($thearray);

   if($request->ajax()){
       return view('admin.category.category-pagination',['categories'=>$data]);
   }
   return view('admin.category.category',['categories'=>$data]);



}
 public function paginate_category($items, $perPage = 10, $page = null, $options = [])
    {
        $options = ['path' => Route('category')] ;

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
        $name = $request->input('name');
       // $slug = $request->input('name');
        $created_by = Auth::id();

        $slug = Str::slug($request->input('name'));

         $category = new Category();
            $category->name = $request->name;
            $category->slug = $slug;
            $category->created_by = $created_by;
            if($category->save()){
                 Session::flash('success', 'successfully category added!');

                 return response()->json([
                  'message' => 'successfully category added!'
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category,$id)
    {
         $name = $request->input('name');
         $status = $request->input('status');
           $slug = Str::slug($request->input('name'));


         $category =  Category::where('id',$id)->first();
            $category->name = $request->name;
            $category->status = $status;
             $category->slug = $slug;

            if($category->save()){
                 Session::flash('success', 'successfully category updated!');

                 return response()->json([
                  'message' => 'successfully category updated!'
                ]);
            }else{
                 Session::flash('error', 'Something wrong!');
                 return response()->json([
                      'message' => 'Something wrong!'
                    ]);
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */



public function statuscategory($id,$status)
{
  $data = Category::find($id);
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

public function categoryView($id)
{


    $categories = Category::find($id);
    //return $categories;
    return json_encode(array('status'=>'ok','data'=>$categories));


}


  public function destroy($id)
  {

    $categories = Category::find($id);
    $result =$categories->delete();

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


}
