<?php

namespace App\Http\Controllers;

use App\Mail\CreateUser;
use App\Models\Admin;
use App\Models\AdminProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $author_details_id = 
        $search = $request->search ?? "";
        $total_admin = Admin::where("role", "admin")->count();
        $total_editor = Admin::where("role", "editor")->count();
        if ($search) {
            $brands = Admin::where("name", "LIKE", "%$search%")->orWhere("role", "LIKE", "%$search%")->orWhere("email", "LIKE", "%$search%")->Paginate(4);
        } else {
            $editors = Admin::Paginate(4);
        }
        return view('admin.user.index', compact("editors", "search", "total_admin", "total_editor"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            '*' => "required"
        ]);
        $random_password = Str::random(8);
        $get_id = Admin::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($random_password),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        AdminProfile::insert([
            "admin_id" => $get_id,
        ]);
        Mail::to($request->email)->send(new CreateUser(auth()->guard('admin')->user()->name, $request->email, $random_password, $request->role));
        return back()->with("user_add", "user added successfully");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("admin.user.show", [
            "auth" => Admin::where("id", "=", $id)->get(['name', 'email', 'role']),
            "admin_details" => Admin::find($id)->admin_profiles,
        ]);
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
        $request->validate([
            "*" => "required",
            "password" => "min:8|confirmed|different:old_password",
        ]);
        if ((Hash::check($request->old_password, auth()->guard('admin')->user()->password))) {
            Admin::where('id', '=', $id)->update([
                "password" => bcrypt($request->password),
            ]);
            return back()->with("password_update", "your password successfully updated");
        } else {
            return back()->withErrors('old password was incorrect');
        }
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
