<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;

class Review extends Model
{
    protected $user;

    public function __constructor()
    {
    }

    public function user()
    {
        $this->belongsTo('App\User');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param integer $user
     * @return boolean
     */
    public function updateReview(Request $request, integer $user)
    {
        $review = $this->getReview(
            $user,
            $request->input('review.show'),
            $request->input('review.season'),
            $request->input('review.episode')
        );

        $review->score = $request->input('review.score');
        $review->review = $request->input('review.review');
        $review->save();

        $this->regenerateTiers($user);

        return true;
    }

    public function getReview(integer $user, integer $showId, $seasonId = null, $episodeId = null)
    {
        $review = $this->where('user_id', $user)
                        ->where('show_id', $showId)
                        ->where('season_id', $seasonId)
                        ->where('episode_id', $episodeId)
                        ->get();
        
        return $review;
    }

    public function regenerateTiers(integer $user)
    {
        $reviews = $this->where('user_id', $user)->get();
        $this->assignTiers($this->filterForShows($reviews));
        $this->assignTiers($this->filterForShows($reviews));
        $this->assignTiers($this->filterForEpisodes($reviews));

        return true;
    }

    public function assignTiers(Collection $reviews)
    {
        $totalReviews = $reviews->count();
        $reviewCountRemaining = $totalReviews;
        $reviews = $reviews->sortByDesc('score');
        $evenReviewsPerTier = intdiv($totalReviews, 10);

        foreach ($reviews as $review) {

            $newTier = 10 - round((($totalReviews - $reviewCountRemaining) / $evenReviewsPerTier), 0, PHP_ROUND_HALF_UP);
            $reviewCountRemaining--;

            $review->tier = $newTier;
        }

        $reviews->save();
        return true;
    }

    public function filterForShows(Collection $reviews)
    {
        $shows = $reviews->where('season_id', null)->get();
        return $shows;
    }

    public function filterForSeasons(Collection $reviews)
    {
        $seasons = $reviews->where('season_id', '>', 0)
                            ->where('episode_id', null)
                            ->get();
        return $seasons;
    }

    public function filterForEpisodes(Collection $reviews)
    {
        $episodes = $reviews->where('episode_id', '>', 0)->get();
        return $episodes;
    }
}
