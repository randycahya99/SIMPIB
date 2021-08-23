<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Auth;
use App\User;
use App\Models\Pengelola;
use App\Models\Coach;
use App\Models\Mentor;
use App\Models\Pendamping;

class UserController extends Controller
{
    //Menampilkan Halaman Profile User
    public function Profile()
    {
        $user = Auth::user()->pengelolas;

        // dd($user);
        
        return view('profile', compact('user'));
    }

    public function EditProfile($id)
    {
        $user = Auth::user($id);
        
        // dd($user);

        return view('editProfile', compact('user'));
    }

    public function UpdateProfilePengelola(Request $request, $id)
    {
        //Validasi Inputan Form
    }
}
