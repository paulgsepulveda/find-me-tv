<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\TMDBApi;
use App\Library\RatingSystem;
use App\Review;
use App\Recommendation;
use App\User;

class ApiController extends Controller
{
    protected $tmdb;
    protected $review;
    protected $recommendation;
    protected $user;

    public function __construct(
        TMDBApi $tmdb, 
        Review $review, 
        Recommendation $recommendation, 
        User $user
        )
    {
        $this->tmdb = $tmdb;
        $this->review = $review;
        $this->recommendation = $recommendation;
        $this->user = $user;
    }

    public function getShow($show)
    {
        $id = (int) $show;
        $response = $this->tmdb->getShow($id);
        return $response;
    }

    public function getSeason($show, $season)
    {
        $show = (int) $show;
        $season = (int) $season;
        $response = $this->tmdb->getSeason($show, $season);
        return $response;
    }

    public function getEpisode(Request $request, $show, $season, $episode)
    {
        return $this->tmdb->getEpisode($show, $season, $episode);
    }

    public function discoverShow()
    {
        $response = $this->tmdb->discoverShow();
        return $response;
    }

    public function createReview(Request $request)
    {
        $review = new Review;
        $review->user_id = Auth::user()->id;
        $review->show_id = $request->input('review.show');
        $review->season =  $request->input('review.season');
        $review->episode = $request->input('review.episode');
        $review->score = $request->input('review.score');
        $review->review = $request->input('review.review');
        $review->save();

        $review->regenerateTiers(Auth::user()->id);

        /**
         * Some reviews are the product of recommendations, or are reviews of recommended 
         * shows that the user reviewed from another page. If so, two things need to be addressed: 
         * 
         * 1. The recommendation needs to be taken off of the list so its spot can be filled.
         * 2. The quality of the recommendation needs to be assessed.
         * 
         */
        if ($request->input('recommendation')) {

        }

        return response()->json(true);
    }

    public function updateReview(Request $request)
    {
        return response()->json($this->review->updateReview($request->all()));
    }

    public function getReview(Request $request)
    {
        return response()->json($this->review->getReview($request->all()));
    }

    public function getReviews(Request $request)
    {
        return response()->json($this->user->find(Auth::user()->id)->reviews);
    }

    public function search(Request $request) 
    {
        $query = urlencode($request->input('search'));
        $response = $this->tmdb->search($query, $request->input('page'));
        return $response;
    }
}
