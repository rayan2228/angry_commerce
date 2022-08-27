<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class AdminProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        "bio",
        "address",
        "phone_number",
        "profile_photo",
        "cover_photo",
    ];
    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }
}
