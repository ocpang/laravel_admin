<?php

namespace App\Http\Controllers\admin;

use Auth;
use DataTables;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;

use Illuminate\Database\Eloquent\SoftDeletes;

class MenusController extends Controller
{

    use SoftDeletes;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
        //  $this->middleware('auth');
     }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::where('parent_id', 0)->get();
        $item = new Menu();
             
        return view('admin.menus', compact('item', 'menus'));        
    }

    public function list()
    {
        $data = Menu::orderBy('id', 'desc')->get();
        return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('parent_id', function ($row) 
                    {
                        //change over here
                        return $row->parent_id > 0 ? Menu::find($row->parent_id)->name : '-';
                    })
                    ->editColumn('created_at', function ($row) 
                    {
                        //change over here
                        return date('d-m-Y', strtotime($row->created_at) );
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" class="btn btn-warning btn-sm text-white" onclick="editData('.$row->id.')"><i class="fa fa-edit"></i></a> 
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteData('.$row->id.')"><i class="fa fa-trash-alt"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
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
        if(empty($request->id)){
            $data = array(
                'order' => $request->order,
                'name' => $request->name,
                'link' => $request->link,
                'icon' => $request->icon,
                'parent_id' => $request->parent_id,
                'language' => $request->language,
                'created_at' => NOW(),
            );
            
            $status = Menu::insert($data);
        }
        else{
            $data = Menu::find($request->id);
            $data->order = $request->order;
            $data->name = $request->name;
            $data->link = $request->link;
            $data->icon = $request->icon;
            $data->parent_id = $request->parent_id;
            $data->language = $request->language;
            $data->updated_at = NOW();

            $status = $data->save();
        }

        if($status){ 
            $response = array('message' => trans('custom.saved_successfully'), 'status' => 'success');
        }
        else{
            $response = array('message' => trans('custom.failed_to_save'), 'status' => 'failed');
        }

        return Response::json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $get_data = Menu::find($request->id);
        if(count($get_data) > 0)
            $data = array('status' => 'success', 'data' => $get_data);
        else
            $data = array('status' => 'error');
        
        return Response::json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $get_data = Menu::find($request->id);
        // print_r(Auth::check().' A');exit;
        // $get_data->deleted_by = Auth::user()->id;
        // $get_data->save();

        if($get_data->trashed())
            $data = array('status' => 'success');
        else
            $data = array('status' => 'error');
        
        return Response::json($data);
    }
}
