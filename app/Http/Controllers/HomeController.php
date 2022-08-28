<?php

namespace App\Http\Controllers;

use App\Mail\ClientMessage;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home()
    {
        return view('welcome', [
            "categories" => Category::where("status", 1)->get(),
            "brands" => Brand::where("brand_status", 1)->get(),
        ]);
    }
    public function about_us()
    {
        return view('customer.about.about');
    }
    public function contact_us()
    {
        return view('customer.contact.contact');
    }
    public function contact_message(Request $request)
    {
        $request->validate([
            "*" => "required",
        ]);
        ContactUs::insert([
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
            "created_at" => Carbon::now(),
        ]);
        Mail::to('rhrayan2228@gmail.com')->send(new ClientMessage($request->name, $request->email, $request->subject, $request->message));
        return back()->with("message_sent","your message successfully sended");
    }
}
