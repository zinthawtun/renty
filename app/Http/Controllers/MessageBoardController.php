<?php

namespace App\Http\Controllers;

use App\Category;
use App\MessageBoard;
use Dotenv\Validator;
use Illuminate\Http\Request;

class MessageBoardController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $mboards = MessageBoard::latest()->simplePaginate(5);
       return view('boards.index', compact('mboards'))
           ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('boards.create', compact('cats'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $request)
    {
        return Validator::make($request, [
            'tile' => 'required|string|max:255',
            'category_id' => 'required',
            'content' => 'required',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         MessageBoard::create([
            'title' => $request['title'],
            'category_id' => $request['cat'],
            'content' => $request['content'],
             'user_id' => auth()->id(),
        ]);

        return redirect('/boards')->with('status', 'You have successfully posted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boards = MessageBoard::where('user_id', $id)->latest()->simplePaginate(5);
        return view('boards.show',compact('boards'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats  = Category::all();
        $board = MessageBoard::find($id);
        return view('boards.edit',compact('board','id', 'cats'));
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
          $board= MessageBoard::find($id);
          $board->title=$request['title'];
          $board->content=$request['content'];
          $board->category_id=$request['cat'];
          $board->user_id=auth()->id();
          $board->save();


            // redirect

            return redirect('/boards')->with('status', 'You have successfully updated your message');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $board = MessageBoard::find($id);
        $board->delete();

        return redirect('/boards')->with('status', 'Your message has been deleted.');
    }
}
