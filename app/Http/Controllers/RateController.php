<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Session;

class RateController extends Controller
{
    public function addRating(Request $request) {
        if($request->isMethod('POST')){
            $data = $request->all();
            if(!Auth::check()){
                $message = "Vous devez etre connecte pour noter ce livre";
                // Session::flash('error_message', $message);
                return redirect()->back();
            }

            if(!isset($data['rate'])) {
                $message = "Merci de mettre au moins une etoile pour ce livre";
                // Session::flash('error_message', $message);
                return redirect()->back();
            }

            $ratingCount = Rate::where(['user_id'=>Auth::user()->id, 'book_id'=>$data['book_id']])->count();
            if($ratingCount>0){
                $message = "Votre notes a deja ete prise en compte pour ce livre.";
                // Session::flash('error_message', $message);
                return redirect()->back();
            } else {
                $rating = new Rate;
                $rating->user_id = Auth::user()->id;
                $rating->book_id = $data['book_id'];
                $rating->review = $data['review'];
                $rating->rate = $data['rate'];
                $rating->status = 1;
                $rating->save();
                $message = "Merci d'avoir note ce livre !";
                // Session::flash('success_message', $message);
                return redirect()->back();
            }
        }
    }
}
