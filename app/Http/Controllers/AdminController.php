<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
USE Illuminate\Http\Response;
use App\Models\Admin;
use App\Models\Career;

class AdminController extends Controller
{
//    public function alluser(): Response {
//        $users = User::paginate(10);
//
//        return response()->view('dashboard/alluser', [
//            'users'=> $users
//        ]);
//
//    }



    public function alluser()
    {
        //select * from User
        $user = User::paginate(10);



        return view('dashboard.alluser', [
            'user' => $user
        ]);
    }

    public function uploaduser(Request $request){


        $request->validate([
//            'firstname'=>'required',
//            'lasttname'=>'required',
//            'pemail'=>'required|email|unique:users',
//            'dob'=>'required',
//            'phone'=>'required',
//            'gender'=>'required',
//            'maritalstatus'=>'required',
//            'nextofkin'=>'required',
//            'occupation'=>'required',
//            'address'=>'required',
//            'religion'=>'required',
//            'nationality'=>'required',
//            'stateoforigin'=>'required',
//            'socialmediahandle'=>'required',
//            'workstatus'=>'required',
//            'dateinducted'=>'required',
//            'noblehousestatus'=>'required',
//            'currentposition'=>'required',
//            'jemail'=>'required',
        ]);
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->pemail = $request->pemail;
        $user->jemail = $request->jemail;
        $user->dob = $request->dob;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->maritalstatus = $request->maritalstatus;
        $user->nextofkin = $request->nextofkin;
        $user->occupation = $request->occupation;
        $user->address = $request->address;
        $user->religion = $request->religion;
        $user->nationality = $request->nationality;
        $user->stateoforigin = $request->stateoforigin;
        $user->socialmediahandle = $request->socialmediahandle;
        $user->workstatus = $request->workstatus;
        $user->dateinducted = $request->dateinducted;
        $user->noblehousestatus = $request->noblehousestatus;
        $user->currentposition = $request->currentposition;
        $image = $request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('jciimage', $imagename);
        $user->image =$imagename;

        $res = $user->save();
        if($res){
            return back()->with('success', 'you have register successfully');
        }else{
            return back()->with('fail', 'something went wrong');
        }

    }

    public function upload(Request $request){
        $request->validate([
            'username'=>'required',
          //  'email'=>'required|email|unique:users',
            'password'=>'required',
            'cpassword'=>'required',

        ]);
        $user = new Admin();
        $user->username = $request->username;
        $user->email = $request->email;

        if($user->password == $user->cpassword){
            $user->password = Hash::make($request->password);

        }else{
            return back()->with('fail', 'paaaword miss match');
        }
        $file = $request->file;
        $imagename=time().'.'.$file->getClientoriginalExtension();
        $request->file->move('jciimage', $imagename);
        $user->file =$imagename;


        $res = $user->save();
        if($res){
            return back()->with('success', 'you have register successfully');
        }else{
            return back()->with('fail', 'something went wrong');
        }

    }
    public function alladmin(){

        $user = Admin::paginate(10);
        return view('dashboard.alladmin', ['user' => $user]);
    }

    public function sidebar(){
        $admin = Admin::all();
        return view('dashboard.sidebar', ['admin' => $admin]);
    }



    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }


    public function profile($id)
    {
        $user = User::find($id);
        $user_id = $id;
        $boy = Career::find($user_id);

        return view('dashboard.profile', compact( 'user', 'boy'));

    }

    public function addprofile(Request $request, $id){
        $request->validate([
//            'career'=>'required',
//            'year'=>'required',
//
        ]);
        $user = new Career();
        $user->career = $request->career;
        $user->year = $request->year;
        $user->user_id = $id;

        $res = $user->save();
        if($res){
            return back()->with('success', 'you have updated your career');
        }else{
            return back()->with('fail', 'something went wrong');
        }
    }

    public function edituser($id){
        $user = User::find($id);
        return view('dashboard.editusers', compact('user'));
    }

    public function editadmin($id){
        $user = Admin::find($id);

        return view('dashboard.editadmins', compact('user'));
    }

    public function deleteuser($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/alluser')->with('success', 'user removed');

    }
    public function deleteadmin($id){
        $user = Admin::find($id);
        $user->delete();
        return redirect('/alladmin')->with('success', 'admin removed');
    }

    public function editalluser(Request $request, $id){

        $request->validate([
//            'firstname'=>'required',
//            'lasttname'=>'required',
//            'pemail'=>'required|email|unique:users',
//            'dob'=>'required',
//            'phone'=>'required',
//            'gender'=>'required',
//            'maritalstatus'=>'required',
//            'nextofkin'=>'required',
//            'occupation'=>'required',
//            'address'=>'required',
//            'religion'=>'required',
//            'nationality'=>'required',
//            'stateoforigin'=>'required',
//            'socialmediahandle'=>'required',
//            'workstatus'=>'required',
//            'dateinducted'=>'required',
//            'noblehousestatus'=>'required',
//            'currentposition'=>'required',
//            'jemail'=>'required',
        ]);

        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->pemail = $request->pemail;
        $user->jemail = $request->jemail;
        $user->dob = $request->dob;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->maritalstatus = $request->maritalstatus;
        $user->nextofkin = $request->nextofkin;
        $user->occupation = $request->occupation;
        $user->address = $request->address;
        $user->religion = $request->religion;
        $user->nationality = $request->nationality;
        $user->stateoforigin = $request->stateoforigin;
        $user->socialmediahandle = $request->socialmediahandle;
        $user->workstatus = $request->workstatus;
        $user->dateinducted = $request->dateinducted;
        $user->noblehousestatus = $request->noblehousestatus;
        $user->currentposition = $request->currentposition;

        $image = $request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('jciimage', $imagename);
        $user->image =$imagename;

        $res = $user->save();
        if($res){
            return redirect('/alluser')->with('success', 'user updated');
        }else{
            return redirect('/alluser')->with('fail', 'Opps Something happened');
        }
    }

    public function editalladmin(Request $request, $id){

//        $request->validate([
//            'username'=>'required',
//            'email'=>'required|email|unique:admins',
//            'password'=>'required',
//            'cpassword'=>'required',
//
//        ]);


        $user = Admin::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
       // $user->password = $request->password;

        if($request->password == $request->cpassword){
            $user->password = Hash::make($request->password);

        }else{
            return back()->with('fail', 'password miss match');
        }

//        $file = $request->file;
//        $imagename=time().'.'.$file->getClientoriginalExtension();
//        $request->file->move('jciimage', $imagename);
//        $user->file =$imagename;


        $res = $user->save();
        if($res){
            return redirect('/alladmin')->with('success', 'admin updated');
        }else{
            return redirect('/alladmin')->with('fail', 'Opps Something happened');
        }


    }
    public function search()
    {
      $search_text = $_GET['query'];
      $user = User::where('title', 'LIKE', '%'.$search_text.'%')->get();

    }






}
