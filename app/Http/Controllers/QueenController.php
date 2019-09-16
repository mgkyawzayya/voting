<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Queen;

use DB;

class QueenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'queen']);
    }
    public function index()
    {
        $queen = DB::table('queens')->get();
        return view('queens.index', [ 'queens' => $queen]);
    }

    public function show($id)
    {
        $queen = DB::table('queens')
            ->where('id', $id)
            ->first();
        return view('queens.show')->with('queen', $queen);
    }

    public function create()
    {
        return view('queens.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'no' => 'required',
            'photo' => 'required',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:102400'
            ]);

        if ($request->hasfile('photo')) {
            var_dump($request->file('photo'));
            $image = $request->file('photo');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/queenphoto/', $name);

            $queen = new Queen();
            $queen->name = $request->name;
            $queen->no = $request->no;
            $queen->vote = 0;
            $queen->photo = $name;
            $queen->save();

            return back()->with('success', 'You created successfully.');
        }
    }

    public function edit($id)
    {
        $queen = DB::table('queens')
            ->where('id', $id)
            ->first();
        return view('queens.edit')->with('queen', $queen);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'no' => 'required',
            'vote' => 'required',
            'photo' => 'required'
        ]);

        DB::table('queens')->where('id', $request->id)->update([
            'name' => $request->name,
            'no' => $request->no,
            'vote' => $request->vote,
            'photo' => $request->photo
        ]);
        
        return back()->withSuccess('Update Successful!');
    }

    public function queen()
    {
        $queen = DB::table('queens')->get();

        return view('queen', ['queens' => $queen]);
    }

    public function destroy($id)
    {
        DB::table('queens')->where('id', $id)->delete();
        return redirect('/queen');
    }
}
