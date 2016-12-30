<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Gallery;

use App\Image;

use Auth;

use Session;

class GalleryController extends Controller
{

	public function __construct()
	{

		$this->middleware('auth');

	}


    public function index()
    {
    	$galleries = Gallery::all();
    	return view('gallery.gallery',compact('galleries'));
    }

    public function saveGalleryName(Request $request)
    {
    	$this->validate($request,['gallery_name' => 'required|min:3']);
    	$gallery = Gallery::create([

        		'gallery_name' => $request->get('gallery_name'),
        		'created_by'   => Auth::user()->id,
                'post_by'      => Auth::user()->name
    	       ]);

        Session::flash('gallery_name_message','Successfully Published!');
    	return redirect()->route('gallery.list');
    }

    public function viewGallery($id)
    {	
    	$gallery = Gallery::findOrFail($id);
    	return view('gallery.view',compact('gallery'));
    }

    public function saveGalleryPhoto($id,Request $request)
    {
      
        $this->validate($request,['images.*' => 'required|image' ]);



        if($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file){
                $filename = time() . $file->getClientOriginalName();
                $file->move('gallery/images',$filename);
                $gallery = Gallery::findOrFail($id);
                $gallery->images()->create([
                    'gallery_id' => $gallery->id,
                    'path'  => $filename,

                    ]);

            }
        }

        Session::flash('gallery_photo','Successfully Uploaded!');

        return redirect()->route('gallery.view',$gallery);
        

    }

    public function updateGalleryName($id,Request $request)
    {
        $this->validate($request,['gallery_name' => 'required|min:3']);
        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->all());
        Session::flash('gallery_name_edit','Successfully Updated!');
        return redirect()->back();
    }


    public function deleteGallery($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->images()->delete();
        $gallery->delete();
        Session::flash('gallery_name_delete','Successfully Deleted!');
        return redirect()->back();
    }

}
