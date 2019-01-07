<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;
use App\User;

class Circle extends Model
{
    protected $user;

    public function __constructor(User $user)
    {
        $this->user = $user;
    }

    /**
     * Undocumented function
     *
     * @param integer $user
     * @return json
     */
    public function getCircleByUser(integer $user)
    {
        $circle = $this->circle->where('user_id', $user)->get('circle');
        return $circle;
    }

    /**
     * Undocumented function
     *
     * @param integer $user
     * @return Collection
     */
    public function getCircleReviews(integer $user)
    {
        $circle = $this->getCircleByUser($user);
        $circle = collect(json_decode($circle));
        $allReviews = collect();

        foreach ($circle as $member) {
            
            $memberReviews = $this->user->find($member)->reviews;
            $allReviews = $allReviews->merge($memberReviews);
        }

        return $allReviews;
    }

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
