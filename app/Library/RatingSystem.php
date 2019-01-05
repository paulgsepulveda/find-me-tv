<?php

namespace App\Library;
use App\Review;
use App\User;
use App\Recommendation;
use App\Circle;

class RatingSystem {

    protected $reviews;
    protected $user;
    protected $circle;

    public function __constructor(Circle $circle, User $user, Review $review)
    {
        $this->circle = $circle;
        $this->user = $user;
    }

    /**
     * Generate a specified number of new recommendations for the selected user
     *
     * @param integer $user - user_id value
     * @param integer $count - number of recommendations to add, defaults to 1
     * @return void
     */
    public function generateRecommendation(integer $user, $count = 1)
    {
        $circle = $this->circle->where('user_id', $user)->get();
        $circle = collect(json_decode($circle));
    }

    public function generateCircle(integer $user)
    {
        $otherUsers = $this->user->where('user_id', '!=', $user)->get('user_id');

        $userReviews = $this->review->where('user_id', $user);
        $userShows = $this->assembleVector 
        $similarityScore = [];
        foreach ($otherUsers as $other) {
            $otherReviews = $this->review->where('user_id', $other);
            // Show
            
            $otherScore[] = $this->cosineSimilarity

            // Season


            // Episode
        }
    }

    public function createCircle(integer $user, string $circle) {
        $this->circle->user_id = $user;
        $this->circle->circle = $circle;
        $this->circle->save();
        return true;
    }

    /**
     * Calculates the similarity of vector arrays generated by the assembleVector() method.
     * Since the keys are integers, it uses the "+" operator rather than array_merge to 
     * remove duplicate keys.
     * 
     * Array format: [int "show / season / episode id" => int "tier rating"]
     *
     * @param array $vector1 - The current user's set of ratings
     * @param array $vector2 - The comparison user's set of ratings
     * @return void
     */
    public function cosineSimilarity(array $vector1, array $vector2)
    {
        $combinedVectorKeys = array_keys($vector1 + $vector2);
		$dotProduct = 0;
		$magnitude1 = 0;
		$magnitude2 = 0;
		foreach ($combinedVectorKeys as $key) 
		{
			$vectorValue1 = isset($vector1[$key]) ? $vector1[$key] : 0;
			$vectorValue2 = isset($vector2[$key]) ? $vector2[$key] : 0;
			$dotProduct += ($vectorValue1 * $vectorValue2);
			$magnitude1 += ($vectorValue1 ** 2);
			$magnitude2 += ($vectorValue2 ** 2);
		}
		$magnitude1 = sqrt($magnitude1);
		$magnitude2 = sqrt($magnitude2);
        $similarity = $dotProduct / ($magnitude1 * $magnitude2);
        
		return $similarity;
    }

    public function assembleVector($reviews, string $category)
    {
        switch ($category) {
            case 'show_id':
                $filtered = $reviews->where('season_id', null)
                                    ->get('show_id', 'tier');
                break;
            
            case 'season_id':
                $filtered = $reviews->where('season_id', '>', 0)
                                    ->where('episode_id', null)
                                    ->get('season_id', 'tier');
                break;

            case 'episode_id':
                $filtered = $reviews->where('episode_id', '>', 0)
                                ->get('episode_id', 'tier');
                break;
        }

        return $filtered->toArray();
    }

    public function estimateRating()
    {

    }

    public function generateUserList()
    {

    }

    public function testCircleMembership()
    {

    }

}