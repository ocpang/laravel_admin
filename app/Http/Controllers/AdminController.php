<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Redirect;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
     /**
      * Show the application dashboard.
      *
      * @return \Illuminate\Contracts\Support\Renderable
      */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function my_profile(){
        return view('admin.my_profile');
    }

    public function users(){
        return view('admin.users');
    }

    public function save_profile(){
        $postData = request()->post();
        
        $model = User::find(Auth::user()->id);
        $filename = $model->avatar;
        if(request()->hasfile('avatar')) {
            $file = request()->file('avatar');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = date('YmdHis').rand(10,99).'.'.$extension;
            $file->move(public_path().'/images/avatars/', $filename);
            $img = Image::make(public_path().'/images/avatars/'.$filename)->resize(300, null, function($constraint) {
                $constraint->aspectRatio();
            })->crop(300, 300, 0, 0);
            $img->save(public_path().'/images/avatars/'.$filename);

            session(['profile_picture' => asset('images/avatars/' . $filename)]);

            if(is_file(public_path().'/images/avatars/'.$model->avatar))
                unlink(public_path().'/images/avatars/'.$model->avatar);
        }

        $model->name = $postData['name'];
        $model->avatar = $filename;
        
        if($model->save())
            return Redirect::to("admin/my_profile")->withSuccess(trans('custom.saved_successfully'));
        else
            return Redirect::to("admin/my_profile")->withError(trans('custom.failed_to_save'));
        
    }

}
