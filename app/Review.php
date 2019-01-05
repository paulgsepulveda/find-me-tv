<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\User;

class Review extends Model
{
    protected $user;

    public function __constructor()
    {
        $this->user = Auth::user();
    }

    public function updateReview($request)
    {
        $review = $this->getReview(
            $request['show_id'],
            $request['season_id'],
            $request['episode_id']
        );

        $review->score = $request['score'];
        $review->review = $request['review'];
        $review->save();
    }

    public function getReview()
    {
        $this->where(

        )->get();
    }

    public function regenerateTiers()
    {
        
    }
}
