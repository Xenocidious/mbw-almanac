<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Vote;
use App\Comment;
use Auth;


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
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'name' => 'required',
        ]);
        

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg' // Only allow .jpg file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /image
            $request->file->store('image', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $image = new Image([
                "name" => $request->get('name'),
                "file_path" => $request->file->hashName(),
                "user_id" => Auth::user()->id,
                "user_name" => Auth::user()->name
            ]);
            $image->save(); // Finally, save the record.
        }

        return view('index');
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
        $image = Image::find($id);
        $image->delete();

        Comment::where('image_id', $id)->delete();
        Vote::where('image_id', $id)->delete();

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
