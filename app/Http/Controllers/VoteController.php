<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vote;

use App\Exports\VotesExport;
use Maatwebsite\Excel\Facades\Excel;

use DB;

class VoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['kingvote', 'queenvote']);
    }

    public function result()
    {
        $king = DB::table('kings')->orderBy('vote', 'DESC')->get();
        $queen = DB::table('queens')->orderBy('vote', 'DESC')->get();
        return view('result', ['kings' => $king, 'queens' => $queen]);
    }

    public function export()
    {
        return Excel::download(new VotesExport, 'votes.xlsx');
    }

    public function show()
    {
        $vote = DB::table('votes')->get();
        return view('votes.show', ['votes' => $vote]);
    }

    public function list()
    {
        $vote = DB::table('votes')->get();
        return view('votes.index', ['votes' => $vote]);
    }


    public function create()
    {
        function generateRandomString($length = 6)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        for ($j = 0; $j < 750; $j++) {
            $vote = new Vote();
            $vote->key = generateRandomString();
            $vote->king = 0;
            $vote->queen = 0;
            $vote->save();
        }

        return back()->with('success', 'You created keys successfully.');
    }

    public function kingvote(Request $request)
    {
        $key = DB::table('votes')->where('key', $request->key)->first();
        if ($key) {
            if ($key->king == 0) {
                $king = DB::table('kings')->where('id', $request->id)->first();

                $vote = $king->vote + 1;

                DB::table('kings')->where('id', $request->id)->update([
                    'vote' => $vote,
                ]);
                DB::table('votes')->where('key', $request->key)->update([
                    'king' => 1,
                ]);

                return back()->with('success', 'Your Voting is success');
            } else {
                return back()->with('using', 'Your Key has been used.');
            }
        } else {
            return back()->with('notfound', 'Your key is not Found');
        }
    }
    public function queenvote(Request $request)
    {
        $key = DB::table('votes')->where('key', $request->key)->first();
        if ($key) {
            if ($key->queen == 0) {
                $queen = DB::table('queens')->where('id', $request->id)->first();

                $vote = $queen->vote + 1;

                DB::table('queens')->where('id', $request->id)->update([
                    'vote' => $vote,
                ]);
                DB::table('votes')->where('key', $request->key)->update([
                    'queen' => 1,
                ]);

                return back()->with('success', 'Your Voting is success');
            } else {
                return back()->with('using', 'Your Key has been using.');
            }
        } else {
            return back()->with('notfound', 'Your key is not Found');
        }
    }

    public function delete()
    {
        DB::table('votes')->delete();
        return redirect('/voteuser');
    }
}
