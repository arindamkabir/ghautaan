<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 



use Illuminate\Http\Request;
use DB;

class ProfileController extends Controller
{
    // function to view the users their own profile
    public function viewprofile($username){
        if ((int)\Auth::user()->user_type == 1 && \Auth::user()->isAdmin == false) {
            $data = DB::table('users')
            ->join('freelancers', 'freelancers.user_id', '=', 'users.id')
            ->where('username', $username)
            ->first();
            
            return view('freelancer.profile' , ['data' => $data]);
 
        }
        elseif ((int)\Auth::user()->user_type == 2 && \Auth::user()->isAdmin == false) {

        }
    }
    public function editprofile($username){
        if ((int)\Auth::user()->user_type == 1 && \Auth::user()->isAdmin == false) {
            $data = DB::table('users')
            ->join('freelancers', 'freelancers.user_id', '=', 'users.id')
            ->where('username', $username)
            ->first();
            
            return view('freelancer.editprofile_gen' , ['data' => $data]);
        }
        elseif ((int)\Auth::user()->user_type == 2 && \Auth::user()->isAdmin == false) {
            return view('freelancer.editprofile_gen');

        }
    }
    public function updateprofile(Request $request){
        if ((int)\Auth::user()->user_type == 1 && \Auth::user()->isAdmin == false) {
            DB::table('users')
              ->where('id', \Auth::user()->id)
              ->update([
                  'f_name' => $request->f_name,
                  'l_name' => $request->l_name,
                  'username' => $request->username,
                  'email' => $request->email,
                  'mobile_number' => $request->contact,
              ]);
            DB::table('freelancers')
              ->where('user_id', \Auth::user()->id)
              ->update([
                  'city' => $request->city,
                  'state' => $request->state,
                  'address' => $request->address,
                  'zip' => $request->zip
              ]);
            return back()
            ->with('success','You have successfully updated your information.');
        }
        elseif ((int)\Auth::user()->user_type == 2 && \Auth::user()->isAdmin == false) {
            return view('freelancer.editprofile_gen');

        }
    }
    public function editpassword($username){
        if ((int)\Auth::user()->user_type == 1 && \Auth::user()->isAdmin == false) {
            $data = DB::table('users')
            ->join('freelancers', 'freelancers.user_id', '=', 'users.id')
            ->where('username', $username)
            ->first();
            
            return view('freelancer.editprofile_pass' , ['data' => $data]);
 
        }
        elseif ((int)\Auth::user()->user_type == 2 && \Auth::user()->isAdmin == false) {
            return view('freelancer.editprofile_pass');

        }
    }
    
    public function store_pro_pic(Request $request)
    {
        $user = DB::table('users')
        ->join('freelancers', 'freelancers.user_id', '=', 'users.id')
        ->where('users.id', \Auth::user()->id)
        ->first();
        if($user->pro_pic_name != null)        
            File::delete(public_path($user->pro_pic_path));
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = \Auth::user()->username . '.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $imageName);

        DB::table('freelancers')
              ->where('user_id', \Auth::user()->id)
              ->update(['pro_pic_name' => $imageName, 'pro_pic_path' => 'images/'.$imageName]);
   
        return back()
            ->with('success','You have successfully uploaded the image.')
            ->with('image',$imageName);
        


        //return back()->with('success', 'Image uploaded successfully');
    }    
    public function delete_pro_pic(Request $request)
    {
        $user = DB::table('users')
        ->join('freelancers', 'freelancers.user_id', '=', 'users.id')
        ->where('users.id', \Auth::user()->id)
        ->first();
        if($user->pro_pic_name != null)        
            File::delete(public_path($user->pro_pic_path));

        DB::table('freelancers')
              ->where('user_id', \Auth::user()->id)
              ->update(['pro_pic_name' => null, 'pro_pic_path' => null]);
   
        return back()
            ->with('success','You have successfully deleted the image.');
        
    }
}
