<?php

namespace App\Http\Controllers;

use App\Models\InstitutionTeacher;
use App\Models\InstitutionAdmin;
use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Institution;

use App\Models\Page;


use App\Models\RequestDetails;
use App\Models\User;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;

use Mail;
use Carbon\Carbon;

use App\Mail\NotifyMail;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class InstitutionMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function institutionmenu(Request $request)
    {



         $userId = Auth::id();

         $user = Institution::where('created_by',$userId)->first();
         $user_id = $user->id;

         $pages = Page::orderBy('pages.id','desc')->where('created_by',$user_id)->select('pages.*')->get();

         $data7=Menu::orderBy('menu.id','desc')->where('institution_id',$user_id)->leftJoin('pages', 'pages.id', '=', 'menu.page_id')->select('menu.*','pages.title as page_name')->get();



          $thearray = [];
         if(count($data7) > 0)
         {
            foreach($data7 as $k2=>$v2)
            {


                        $thearray[]=array(
                            'menu_name'=>$v2->menu_name
                            ,'slug'=>$v2->slug
                            ,'link'=>$v2->link
                            ,'page_id'=>$v2->page_id

                            ,'page_name'=>$v2->page_name
                            ,'location'=>$v2->location

                            ,'id'=>$v2->id
                        );

            }
         }

       $data = $this->paginate_menu($thearray);

       if($request->ajax()){
           return view('theme.institution.institution-menu-pagination',['menus'=>$data,'pages'=>$pages]);
       }
       return view('theme.institution.institution-menu',['menus'=>$data,'pages'=>$pages]);



    }
     public function paginate_menu($items, $perPage = 10, $page = null, $options = [])
        {
            $options = ['path' => Route('institutionmenu')] ;

            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
            $items = $items instanceof Collection ? $items : Collection::make($items);
            return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        }


        public function menustore(Request $request)
 {


    $userId = Auth::id();



         $user = Institution::where('created_by',$userId)->first();
         $user_id = $user->id;

         $pages = Page::orderBy('pages.id','desc')->where('created_by',$user_id)->select('pages.*')->get();


    $v = Validator::make($request->all(),[
        'menu_name' => 'required',
        'location' => 'required',

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



                $menu_name = $request->input('menu_name');


                $slug = Str::slug($request->input('menu_name'));


                    $menu = new Menu();
                    $menu->menu_name = $request->menu_name;
                    $menu->slug = $slug;
                    $menu->institution_id = $user_id;
                    $menu->link = $request->link;
                    $menu->sort_order = $request->sort_order;
                    $menu->page_id = $request->page_id;
                    $menu->location = $request->location;



                if($menu->save())
                {
                    Session::flash('success', 'Successfully menu added!');

                    return response()->json([
                    'message' => 'successfully menu added!'
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


public function menuupdate(Request $request, Menu $menu,$id)
{
    $currentDateTime = Carbon::now();




    $v = Validator::make($request->all(),[
        'menu_name' => 'required|unique:menu,menu_name,'.$id,
         //'title' => 'required'.$id,
         'page_id' =>'required',
         'location' =>'required',


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

        $link='';
        if($request->link!='')
        {
            $link=$request->link;
        }

        $sort_order='';
        if($request->sort_order!='')
        {
            $sort_order=$request->sort_order;
        }

        $page_id='';
        if($request->page_id!='')
        {
            $page_id=$request->page_id;
        }

        $location='';
        if($request->location!='')
        {
            $location=$request->location;
        }

     $menu_name = $request->input('menu_name');


     $menu =  Menu::where('id',$id)->first();
     //dd($menu);
        $menu->menu_name = $request->menu_name;
        $menu->page_id = $page_id;
        $menu->link = $link;
        $menu->sort_order = $sort_order;
        $menu->location = $location;
        $menu->updated_at = $currentDateTime->format('Y-m-d H:i:s');





        if($menu->save()){
             Session::flash('success', 'successfully menu updated!');

             return response()->json([
              'message' => 'successfully menu updated!'
            ]);
        }else{
             Session::flash('error', 'Something wrong!');
             return response()->json([
                  'message' => 'Something wrong!'
                ]);
             }     }

}


public function viewmenu($id)
{


    $menu = Menu::find($id);

    return json_encode(array('status'=>'ok','data'=>$menu));


}


public function menudelete($id)
{

  $menu = Menu::find($id);
  $result =$menu->delete();

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
