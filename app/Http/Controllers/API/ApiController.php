<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\TMDBApi;
use Aoo\Library\RatingSystem;
use App\Review;

class ApiController extends Controller
{
    protected $tmdb;
    protected $review;
    protected $recommendation;

    public function __constructor(TMDBApi $tmdb, Review $review, Recommendation $recommendation)
    {
        $this->tmdb = $tmdb;
        $this->review = $review;
        $this->recommendation = $recommendation;
    }

    public function getShow(Request $request, $show)
    {
        return response()->json($this->tmdb->getShow($show));
    }

    public function getSeason(Request $request, $show, $season)
    {
        return response()->json($this->tmdb->getSeason($show, $season));
    }

    public function getEpisode(Request $request, $show, $season, $episode)
    {
        return response()->json($this->tmdb->getEpisode($show, $season, $episode));
    }

    public function discoverShow(Request $request)
    {
        $params = $request->query();
        return response()->json($this->tmdb->discoverShow($params));
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

        $review->regenerateTiers();

        /**
         * Some reviews are the product of recommendations, or are reviews of recommended 
         * shows that the user reviewed from another page. If so, two things need to be addressed: 
         * 
         * 1. The recommendation needs to be taken off of the list so its spot can be filled.
         * 2. The quality of
         * 
         */
        if ($request->input('recommendation')) {

        }

        return;
    }

    public function updateReview(Request $request)
    {
        return $this->review->updateReview($request->all());
    }

    public function getReview(Request $request)
    {
        return $this->review->getReview($request->all());
    }
}
