<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\King;
use DB;

class KingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'king']);
    }
    public function index()
    {
        $king = DB::table('kings')->get();
        return view('kings.index', [ 'kings' => $king]);
    }

    public function show($id)
    {
        $king = DB::table('kings')
            ->where('id', $id)
            ->first();
        return view('kings.show')->with('king', $king);
    }

    public function create()
    {
        return view('kings.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'no' => 'required',
            'hobby' => 'required',
            'photo' => 'required',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240'
            ]);

        if ($request->hasfile('photo')) {
            var_dump($request->file('photo'));
            $image = $request->file('photo');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/kingphoto/', $name);

            $king = new King();
            $king->name = $request->name;
            $king->no = $request->no;
            $king->hobby = $request->hobby;
            $king->vote = 0;
            $king->photo = $name;
            $king->save();

            return back()->with('success', 'You created successfully.');
        }

            var_dump($request->all());
    }

    public function edit($id)
    {
        $king = DB::table('kings')
            ->where('id', $id)
            ->first();
        return view('kings.edit')->with('king', $king);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'no' => 'required',
            'hobby' => 'required',
            'vote' => 'required',
            'photo' => 'required',
        ]);

        DB::table('kings')->where('id', $request->id)->update([
            'name' => $request->name,
            'no' => $request->no,
            'hobby' => $request->hobby,
            'vote' => $request->vote,
            'photo' => $request->photo
        ]);
        
        return back()->withSuccess('Update Successful!');
    }

    public function king()
    {
        $king = DB::table('kings')->get();

        return view('king', ['kings' => $king]);
    }

    public function destroy($id)
    {
        DB::table('kings')->where('id', $id)->delete();
        return redirect('/king');
    }
}
