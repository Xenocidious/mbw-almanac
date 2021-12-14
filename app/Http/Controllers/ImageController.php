<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Vote;
use App\Image;
use App\Comment;
use App\UserImageSeen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


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
     * Store a newly created image in directory.
     *
     * there will be 2 instances saved of the image, one row in the DB, and the physical file in the local directory
     *
     */
    public function store(Request $request)
    {
        // Validate the inputs
        if ($request->file->extension() == "jpg" || $request->file->extension() == "png" || $request->file->extension() == "jpeg") {
            // ensure the request has a file before we attempt anything else.
            if ($request->hasFile('file')) {

                //create $file using the request
                $file = $request->file('file');

                //making sure that the image has a description and consists out of the right format
                $request->validate([
                    'description' => 'required',
                ], [
                    'image' => 'mimes:jpeg' // Only allow .jpg file types.
                ]);

                //define filename
                $fileName = $file->getClientOriginalName();

                //define where the image will be saved in the local directory
                $destinationPath = public_path() . '/uploads/image';

                //save the image in the local directory
                $file->move($destinationPath, $fileName);


                $file_path = public_path() . '/uploads/image/' . $request->file->getClientOriginalName();
                
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
                for ($i = 1; $i <= $maxUser[0]['id']; $i++) {
                    if (User::where('id', $i)->exists()) {
                        $newRow = new UserImageSeen([
                            "user_id" => $i,
                            "image_id" => $imageId,
                        ]);

                        $newRow->save();
                    }
                }
            }
        } else {
            return redirect()->back()->with('error', 'file extension must be an .PNG, .JPG or .JPEG');
        }
        return redirect('photohub');
    }

    public function upvote($image_id)
    {
        $vote = new Vote();
        $vote->image_id = $image_id;
        $vote->user_id = Auth::user()->id;
        $vote->save();

        return redirect()->back();
    }

    public function removeUpvote($image_id)
    {
        $image_id = intval($image_id);
        $whereArray = array('user_id' => Auth::user()->id, 'image_id' => $image_id);
        Vote::where($whereArray)->delete();

        return redirect()->back();
    }

    public function openImage($image_id)
    {
        $images = Image::where('id', $image_id)->get();
        $votes = Vote::get();
        $comments = Comment::get();
        return view('image', [
            'image' => $images,
            'votes' => $votes,
            'comments' => $comments
        ]);
    }

    public function delete($id)
    {
        $ImageName = Image::get()->where('id', $id);
        $ImageName = reset($ImageName);
        $key = key($ImageName);
        //get filename of the image that we want to remove
        $filename = Image::get()->where('id', $id)[$key]['file_path'];
        //get filepath of the image that we want to remove
        $file_path = public_path() . '/uploads/image/' . $filename;
        //check whether image exists in local direcory
        if(file_exists($file_path)){
            //remove image from local directory
            unlink($file_path);
        }

        //remove image in the DB
        Image::where('id', $id)->delete();
        //remove all comments in the DB
        Comment::where('image_id', $id)->delete();
        //remove all upvotes in the DB
        Vote::where('image_id', $id)->delete();
        //remove all 'unseen messages' for the sidebar in DB
        UserImageSeen::where('image_id', $id)->delete();

        //return user to photohub
        return redirect('photohub');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
