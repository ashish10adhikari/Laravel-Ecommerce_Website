<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\BlogModel;
use App\Models\contactModel;
use App\Models\TeamModel;
use App\Models\ShopModel;

class AdminController extends Controller
{
    public function adminhome()
    {

        return view('admin.adminhome');
        
    }

    public function users()
    {
        
        return view('admin.adminusers');
       
    }

    public function usersview()
    {
        $users=user::latest()->get();
        $data = [
            "data" => $users
        ];
        return response()->json($data);
       
    }

    public function deleteuser($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function testimonial()
    {
        
        return view('admin.admintestimonial');
        
    }

    public function testimonialview()
    {
        $testimonials=testimonial::latest()->get();
        $data = [
            "data" => $testimonials->map(function($testimonial) {
                return [
                    "id" => $testimonial->id,
                    "name" => $testimonial->name,
                    "position" => $testimonial->position,
                    "comment" => $testimonial->comment,
                    "image" => $testimonial->image  
                ];
            })
        ];
        return response()->json($data);
    }

    public function addtestimonial(Request $request)
    {
        
    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'testimonial' => 'required|string',
        'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

   
    $testimonial = new Testimonial();
    $testimonial->name = $request->name;
    $testimonial->position = $request->position;
    $testimonial->comment = $request->testimonial;

    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('testimonialprofile'), $imagename);
        $testimonial->image = $imagename;
    }

    
    $testimonial->save();

        return redirect()->back();
    }

    public function deletecomment($id)
    {
        $testimonial=testimonial::find($id);
        $testimonial->delete();
        return redirect()->back();
    }

    public function updatecomment($id)
    {
        $testimonial=testimonial::find($id);
        return view('admin.updatetestimonial',compact('testimonial'));
    }

    public function updatecmtform(Request $request, $id)
    {
       
    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'testimonial' => 'required|string',
        'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    
    $testimonial = Testimonial::findOrFail($id);
    $testimonial->name = $request->name;
    $testimonial->position = $request->position;
    $testimonial->comment = $request->testimonial;

  
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('testimonialprofile'), $imagename);
        $testimonial->image = $imagename;
    }

   
    $testimonial->save();
       return redirect()->back();

    // dd($request->all(), $request->file('image'));
       
    }

    public function adminblog()
    {
        $adminblogs=blogmodel::latest()->get();
        return view('admin.adminblog',compact('adminblogs'));
    }

    public function adminblogview()
    {
        $adminblogs=blogmodel::latest()->get();
        $data = [
            "data" => $adminblogs
            
        ];

        return response()->json($data);
    }

    public function addblog(Request $request)
    {
        $addblog= new blogmodel;
        $addblog->name=$request->name;
        $addblog->title=$request->title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('blogimage'), $imagename);
            $addblog->image = $imagename;
        }

        $addblog->save();
        return redirect()->back();



    }

    public function deleteblog($id)
    {
        $deleteblog=blogmodel::find($id);
        $deleteblog->delete();
        return redirect()->back();
    }

    public function updateblog($id)
    {
        $updateblog=blogmodel::find($id);
        return view('admin.updatetheblog',compact('updateblog'));
    }

    public function updatetheblog(Request $request, $id)
    {
        $updateblog=blogmodel::find($id);
        $updateblog->name=$request->name;
        $updateblog->title=$request->title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('blogimage'), $imagename);
            $updateblog->image = $imagename;
        }

        $updateblog->save();
        return redirect()->back();
    }

    public function admincontact()
    {
        $contacts=contactmodel::latest()->get();
        return view('admin.admincontact',compact('contacts'));
    }

    public function deletecontact($id)
    {
        $contact=contactmodel::find($id);
        $contact->delete();
        return redirect()->back();
    }

    public function adminteam()
    {
        $addteams=teammodel::latest()->get();
        return view('admin.adminteam',compact('addteams'));
    }

    public function addteam(Request $request)
    {
       $addteam= new TeamModel;
       $addteam->name=$request->name;
       $addteam->position=$request->position;
       $addteam->description=$request->description;

       if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('teamimage'), $imagename);
        $addteam->image = $imagename;
    }
    $addteam->save();
    return redirect()->back();

    }

    public function deleteteam($id)
    {
        $deleteteam=TeamModel::find($id);
        $deleteteam->delete();
        return redirect()->back();
    }

    public function updateteam($id)
    {
        $updateteam=TeamModel::find($id);
        return view('admin.editteam',compact('updateteam'));
    }

    public function editteam(Request $request, $id)
    {
        $editteam=TeamModel::find($id);
        $editteam->name=$request->name;
        $editteam->position=$request->position;
        $editteam->description=$request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('teamimage'), $imagename);
            $editteam->image = $imagename;
        }

        $editteam->save();
        return redirect()->back();
    }

    public function adminshop()
    {
        $items=shopmodel::all();
        return view('admin.adminshop',compact('items'));
    }

    public function additem(Request $request)
    {
        $newitem= new shopmodel;
        $newitem->name=$request->name;
        $newitem->price=$request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('itemimage'), $imagename);
            $newitem->image = $imagename;
        }
        $newitem->save();
        return redirect()->back();
    }
    
    public function deleteitem($id)
    {
        $item=shopmodel::find($id);
        $item->delete();
        return redirect()->back();
    }

    public function edititem($id)
    {
        $item=shopmodel::find($id);
        return view('admin.adminshopedit',compact('item'));

    }

    public function updateitem(Request $request, $id)
    {
        $item=shopmodel::find($id);
        $item->name=$request->name;
        $item->price=$request->price;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('itemimage'), $imagename);
            $item->image = $imagename;
        }
        $item->save();
        return redirect()->back();
    }
}
