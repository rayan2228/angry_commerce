<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index', [
            "admin_details" => AdminProfile::where("admin_id", "=", auth()->guard('admin')->id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
    public function show(AdminProfile $adminProfile)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminProfile $adminProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adminProfile)
    {
        $request->validate([
            'profile_photo' => 'mimes:png,jpg',
            'cover_photo' => 'mimes:png,jpg',
            'bio' => 'min:120 | max:500 |nullable',
        ]);
        if ($request->hasFile('profile_photo') && AdminProfile::find($adminProfile)->profile_photo === null) {
            $profile_photo_name = Str::replace(' ', '_', auth()->user()->name) . "_" . auth()->user()->id . "_" . Carbon::now()->format("Y") . "." . $request->file('profile_photo')->getClientOriginalExtension();
            $profile_photo = Image::make($request->file('profile_photo'))->resize(196, 196);
            $profile_photo->save(base_path("public/uploads/admin_profile/" . $profile_photo_name), 80);
            AdminProfile::find($adminProfile)->update([
                "bio" => $request->bio,
                "address" => $request->address,
                "phone_number" => $request->phone_number,
                "profile_photo" => $profile_photo_name,
            ]);
        } elseif ($request->hasFile('profile_photo') && AdminProfile::find($adminProfile)->profile_photo != null) {
            unlink(base_path("public/uploads/admin_profile/" . AdminProfile::find($adminProfile)->profile_photo));
            $profile_photo_name = Str::replace(' ', '_', auth()->user()->name) . "_" . auth()->user()->id . "_" . Carbon::now()->format("Y") . "." . $request->file('profile_photo')->getClientOriginalExtension();
            $profile_photo = Image::make($request->file('profile_photo'))->resize(196, 196);
            $profile_photo->save(base_path("public/uploads/admin_profile/" . $profile_photo_name), 80);
            AdminProfile::find($adminProfile)->update([
                "bio" => $request->bio,
                "address" => $request->address,
                "phone_number" => $request->phone_number,
                "profile_photo" => $profile_photo_name,
            ]);
        } elseif ($request->hasFile('cover_photo') && AdminProfile::find($adminProfile)->cover_photo === null) {
            $cover_photo_name = Str::replace(' ', '_', auth()->user()->name) . "_" . auth()->user()->id . "_" . Carbon::now()->format("Y") . "." . $request->file('cover_photo')->getClientOriginalExtension();
            $cover_photo = Image::make($request->file('cover_photo'))->resize(1600, 451);
            $cover_photo->save(base_path("public/uploads/admin_profile/" . $cover_photo_name), 80);
            AdminProfile::find($adminProfile)->update([
                "bio" => $request->bio,
                "address" => $request->address,
                "phone_number" => $request->phone_number,
                "cover_photo" => $cover_photo_name,
            ]);
        } elseif ($request->hasFile('cover_photo') && AdminProfile::find($adminProfile)->cover_photo != null) {
            unlink(base_path("public/uploads/admin_profile/" . AdminProfile::find($adminProfile)->cover_photo));
            $cover_photo_name = Str::replace(' ', '_', auth()->user()->name) . "_" . auth()->user()->id . "_" . Carbon::now()->format("Y") . "." . $request->file('cover_photo')->getClientOriginalExtension();
            $cover_photo = Image::make($request->file('cover_photo'))->resize(1600, 451);
            $cover_photo->save(base_path("public/uploads/admin_profile/" . $cover_photo_name), 80);
            AdminProfile::find($adminProfile)->update([
                "bio" => $request->bio,
                "address" => $request->address,
                "phone_number" => $request->phone_number,
                "cover_photo" => $cover_photo_name,
            ]);
        } elseif (($request->hasFile('profile_photo') && AdminProfile::find($adminProfile)->profile_photo === null) && ($request->hasFile('cover_photo') && AdminProfile::find($adminProfile)->cover_photo === null)) {
            $profile_photo_name = Str::replace(' ', '_', auth()->user()->name) . "_" . auth()->user()->id . "_" . Carbon::now()->format("Y") . "." . $request->file('profile_photo')->getClientOriginalExtension();
            $profile_photo = Image::make($request->file('profile_photo'))->resize(196, 196);
            $profile_photo->save(base_path("public/uploads/admin_profile/" . $profile_photo_name), 80);
            $cover_photo_name = Str::replace(' ', '_', auth()->user()->name) . "_" . auth()->user()->id . "_" . Carbon::now()->format("Y") . "." . $request->file('cover_photo')->getClientOriginalExtension();
            $cover_photo = Image::make($request->file('cover_photo'))->resize(1600, 451);
            $cover_photo->save(base_path("public/uploads/admin_profile/" . $cover_photo_name), 80);
            AdminProfile::find($adminProfile)->update([
                "bio" => $request->bio,
                "address" => $request->address,
                "phone_number" => $request->phone_number,
                "profile_photo" => $profile_photo_name,
                "cover_photo" => $cover_photo_name,
            ]);
        } elseif (($request->hasFile('profile_photo') && AdminProfile::find($adminProfile)->profile_photo != null) && ($request->hasFile('cover_photo') && AdminProfile::find($adminProfile)->cover_photo != null)) {
            unlink(base_path("public/uploads/admin_profile/" . AdminProfile::find($adminProfile)->profile_photo));
            unlink(base_path("public/uploads/admin_profile/" . AdminProfile::find($adminProfile)->cover_photo));

            $profile_photo_name = Str::replace(' ', '_', auth()->user()->name) . "_" . auth()->user()->id . "_" . Carbon::now()->format("Y") . "." . $request->file('profile_photo')->getClientOriginalExtension();
            $profile_photo = Image::make($request->file('profile_photo'))->resize(196, 196);
            $profile_photo->save(base_path("public/uploads/admin_profile/" . $profile_photo_name), 80);

            $cover_photo_name = Str::replace(' ', '_', auth()->user()->name) . "_" . auth()->user()->id . "_" . Carbon::now()->format("Y") . "." . $request->file('cover_photo')->getClientOriginalExtension();
            $cover_photo = Image::make($request->file('cover_photo'))->resize(1600, 451);
            $cover_photo->save(base_path("public/uploads/admin_profile/" . $cover_photo_name), 80);
            AdminProfile::find($adminProfile)->update([
                "bio" => $request->bio,
                "address" => $request->address,
                "phone_number" => $request->phone_number,
                "profile_photo" => $profile_photo_name,
                "cover_photo" => $cover_photo_name,
            ]);
        } else {
            AdminProfile::find($adminProfile)->update([
                "bio" => $request->bio,
                "address" => $request->address,
                "phone_number" => $request->phone_number,
            ]);
        }
        return back()->with("profile_update","Profile Details Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminProfile $adminProfile)
    {
        //
    }
}
