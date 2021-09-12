<?php

namespace App\Http\Controllers;

use App\Models\RafflePrize;
use App\Models\RaffleWinner;
use Illuminate\Http\Request;

class RaffleController extends Controller
{
    public function items() {
        return view('raffles.index', [
            'rafflePrizes' => RafflePrize::orderBy('created_at','DESC')->get()
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'item' => 'string|required',
            'worth' => 'numeric',
            'sponsor' => 'string'
        ]);

        RafflePrize::create([
            'item' => $request->item,
            'worth' => $request->worth,
            'sponsor' => $request->sponsor,
            'created_by' => auth()->user()->id,
            'quantity' => $request->quantity
        ]);

        return redirect('/raffles/items')->with('Info','A new raffle prize has been added.');
    }

    public function winners() {
        $raffleWinners = RaffleWinner::join('user', function($query) {
            $query->orderBy('lname')->orderBy('fname');
        })->select('raffle_winners.*', 'users.lname', 'users.fname', 'users.program','users.year');

        return view('raffles.winners',[
            'raffleWinners' => $raffleWinners
        ]);
    }

    public function draw() {
        $items = RafflePrize::where('quantity','>',0)->orderBy('item')->get();

        $raffleItems = [];

        foreach($items as $item) {
            $raffleItems[$item->id] = $item->item;
        }

        // dd($raffleItems);

        return view('raffles.draw', compact('raffleItems'));
    }
}
