<?php

namespace App\Http\Controllers;

use Auth;
use App\Vote;
use App\Image;
use App\Comment;
use App\UserImageSeen;
use App\User;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class ImageController extends Controller
{
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
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // Validate the inputs
        if($request->file->extension() == "jpg" || $request->file->extension() == "png" || $request->file->extension() == "jpeg"){
            // ensure the request has a file before we attempt anything else.
            if ($request->hasFile('file')) {

                $file = $request->file('file');
                $request->validate([
                    'description' => 'required',
                ],[
                    'image' => 'mimes:jpeg' // Only allow .jpg file types.
                ]);
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/uploads/image';
                $file->move($destinationPath,$fileName);
                


    
                // Store the record, using the new file hashname which will be it's new filename identity.
                $image = new Image([
                    "description" => $request->get('description'),
                    "file_path" => $request->file->getClientOriginalName(),
                    "user_id" => Auth::user()->id,
                    "user_name" => Auth::user()->name
                ]);

                $image->save(); // Finally, save the record.
                
                $imageId = $image['id'];
                
                //update the user_images_seen table to update amount of missed images

                $maxUser = User::where('id', \DB::raw("(select max(`id`) from users)"))->get();

                for($i=1; $i<=$maxUser[0]['id']; $i++){
                    if (User::where('id', $i)->exists()) {
                        $newRow = new UserImageSeen([
                            "user_id" => $i,
                            "image_id" => $imageId,
                        ]);

                        $newRow->save();
                    }
                }
            }
        }else{
            return redirect()->back()->with('error', 'file extension must be an .PNG, .JPG or .JPEG');   
        }
        return redirect('photohub');
    }

    public function upvote($image_id){

        $vote = new Vote();
        $vote->image_id = $image_id;
        $vote->user_id = Auth::user()->id;
        $vote->save();
        
        return redirect()->back();
    }

    public function removeUpvote($image_id){

        $image_id = intval($image_id);
        $whereArray = array('user_id' => Auth::user()->id, 'image_id' => $image_id);
        Vote::where($whereArray)->delete();

        return redirect()->back();
    }

    public function openImage($image_id){
        $images = Image::where('id', $image_id)->get();
        $votes = Vote::get();
        $comments = Comment::get();
        return view('image', [
            'image' => $images,
            'votes' => $votes,
            'comments' => $comments
        ]);
    }

    public function delete($id){
        sleep(1);

        Image::where('id', $id)->delete();
        Comment::where('image_id', $id)->delete();
        Vote::where('image_id', $id)->delete();
        UserImageSeen::where('image_id', $id)->delete();

        return redirect('photohub');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
