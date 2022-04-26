<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Career;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('auth.dashboard.home');
    }

    public function status(Request $request,$id){
        $career = Career::findOrFail($id);
        $career->status = !$career->status;
        $career->save();
        return redirect()->back();
    }
}
