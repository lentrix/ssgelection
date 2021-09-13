<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\RafflePrize;
use App\Models\RaffleWinner;
use App\Models\User;
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
        $raffleWinners = RaffleWinner::join('users','raffle_winners.user_id','users.id')
        ->select('raffle_winners.*', 'users.lname', 'users.fname', 'users.program','users.year')
        ->get();

        return view('raffles.winners',[
            'raffleWinners' => $raffleWinners
        ]);
    }

    public function draw() {
        $items = RafflePrize::where('quantity','>',0)->orderBy('item')->get();
        $act = Activity::orderBy('title')->get();

        $raffleItems = [];
        $activities = [];

        foreach($items as $item) {
            $raffleItems[$item->id] = $item->item . " ($item->quantity items) ";
        }

        foreach($act as $a) {
            $activities[$a->id] = $a->title;
        }

        return view('raffles.draw', [
            'raffleItems' => $raffleItems,
            'activities' => $activities
        ]);
    }
    public function storeWinner(Request $request) {
        $request->validate([
            'item' => 'numeric|required',
            'user_id' => 'numeric|required'
        ]);

        $item = RafflePrize::findOrFail($request->item);
        $user = User::find($request->user_id);

        RaffleWinner::create([
            'user_id' => $user->id,
            'raffle_prize_id' => $item->id,
            'drawn_by' => auth()->user()->id
        ]);

        $item->quantity = $item->quantity-1;
        $item->save();

        return redirect('/raffles/draw');
    }
    public function updateItem(Request $request) {
        $rafflePrize = RafflePrize::find($request->id);

        if(!$rafflePrize) {
            return back()->with('Error','Fatal Error: Cannot find record of the item ID');
        }

        $rafflePrize->update($request->all());

        return redirect('/raffles/items')->with('Info','A raffle item has been updated.');
    }
}
