<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id())
        {
            $post=Feedback::where('post_status', '=', 'Approved')->get();
            $usertype = Auth()->user()->usertype;

            if ($usertype=='user') {
                return view('home.homepage', compact('post'));
            }
            else if($usertype=='admin'){

                return view('admin.adminhome');
            }
            else{
                return redirect()->back();
            }

        }
    }

    public function post(){

        return view('post');
    }

    public function homepage(){

        $post = Feedback::where('post_status', '=', 'Approved')->get();

        return view('home.homepage', compact('post'));
    }

    public function post_details($id){

        $post = Feedback::find($id);

        return view('home.post_details', compact('post'));
    }

    public function create_post(){

        return view('home.create_post');
    }

    public function user_post(Request $request){

        $user=Auth()->user();
        $userid=$user->id;
        $username=$user->name;
        $usertype=$user->usertype;

        //new post
        $post = new Feedback;
        $post -> title = $request -> title;
        $post -> description = $request -> description;
        $post -> user_id = $userid;
        $post -> name = $username;
        $post -> usertype = $usertype;
        $post ->post_status='In Review';


        //image add
        $image= $request->image;
        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);
            $post->image=$imagename;
        }

        $post->save();
        Alert::success('Congratulations', 'Feedback Added Successfully');
        return redirect()->back();
    }

    public function my_post(){

        $user=Auth::user();
        $userid=$user->id;

        $data = Feedback::where('user_id','=', $userid)->get();
        return view('home.my_post', compact('data'));
    }

    public function my_post_del($id){

        $data = Feedback::find($id);

        $data->delete();
        Alert::warning('Deleted', 'Your feedback has been deleted successfully');
        return redirect()->back();
    }


    public function post_update_page($id){


        $data = Feedback::find($id);

        return view('home.post_page', compact('data'));
    }

    public function update_post_data(Request $request ,$id){

        $data= Feedback::find($id);

        $data->title=$request ->title;
        $data->description=$request ->description;

        $image=$request->image;
        $oldImage = $data->image; // Get the old image file name

        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);

            $data->image=$imagename;

        // Delete the old image file
        if ($oldImage) {
                $oldImagePath = public_path('postimage/'.$oldImage);
                if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
                }
            }
        }

        $data->save();
        Alert::success('Updated', 'Your feedback has been updated successfully');
        return redirect()->back();

    }
}
