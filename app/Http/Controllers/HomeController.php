<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

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
    public function index()
    {
        $user = Auth::user();
        $questionTest=Question::all();
        $questions = $user->questions()->paginate(6);
        $questionTest=$this->paginate($questionTest);
        return view('home')->with('questions',$questionTest);
    }

    public function paginate($items,$perPage=12, $page=null, $baseUrl="/home", $options=[]){

        $page=$page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items=$items instanceof Collection ? $items : Collection::make($items);

        $lap=new LengthAwarePaginator($items->forPage($page, $perPage),
            $items->count(), $perPage,$page,$options);

        if($baseUrl){
            $lap->setPath($baseUrl);
        }
        return $lap;
    }
}
