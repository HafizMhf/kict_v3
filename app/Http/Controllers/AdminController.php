<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function feedback_page(){

        return view('admin.feedback_page');
    }


    public function add_post(Request $request){

        //from table user
        $user=Auth()->user();
        $user_id= $user->id;
        $name= $user->name;
        $usertype= $user->usertype;



        //feedback table
        $post = new Feedback;

        $post -> title = $request -> title;
        $post -> description = $request -> description;
        $post -> post_status = 'Approved';

        //come from user table
        $post -> user_id = $user_id;
        $post -> name = $name;
        $post -> usertype = $usertype;


        //save image-keep image in public folder

        $image = $request -> image;

        if ($image) {

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);

            //keep in db
            $post -> image = $imagename;
        }

        //save and redirect
        $post -> save();
        return redirect()->back()->with('message', 'Feedback Added Successfully');


    }

    public function show_post(){

        //take all data in db to post
        $post = Feedback::all();
        return view('admin.show_post', compact('post'));

    }

    public function delete_post($id){

        $post = Feedback::find($id);

        $post->delete();

        return redirect()->back()->with('message', 'Feedback Deleted Successfully');
    }

    public function edit_page($id){

        $post = Feedback::find($id);

        return view('admin.edit_page', compact('post'));
    }

    public function update_post(Request $request, $id){

        $data = Feedback::find($id);
        $data->title=$request-> title;
        $data->description=$request-> description;

        //update image
        $image= $request->image;

        // Get the old image file name
        $oldImage = $data->image;
        if($image){

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);

            //keep in db
            $data -> image = $imagename;

            //delete old image file
            if($oldImage){
                $oldImagePath = public_path('postimage/'.$oldImage);
                if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
                }
            }
        }


        $data->save();
        return redirect()->back()->with('message', 'Feedback Updated Successfully');

    }

    public function accept_post($id){

        $data = Feedback::find($id);

        $data->post_status='Approved';
        $data->save();

        return redirect()->back()->with('message', 'Status has been changed to approved');
    }

    public function reject_post($id){

        $data = Feedback::find($id);

        $data->post_status='Rejected';
        $data->save();

        return redirect()->back()->with('message', 'Status has been changed to rejected');
    }
}
