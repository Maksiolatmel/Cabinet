<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CohtactRequest;
use App\Models\Contact;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('home');
    }

    public function list()
    {
        $users = User::paginate(50);
        return view('pages.userlist', ['users' => $users]);
    }

    public function deleteUser(Request $request)
    {
        $id = $request->id;
        User::whereId($id)->firstOrFail()->delete();
        $users = User::paginate(50);
        $Mess = 'Користувача ID = '.$id.' видалено!';
        return view('pages.userlist', ['users' => $users, 'Mess' =>$Mess ]);
    }

}
