<?php

namespace App\Services;

use App\Models\Post;

class PriceCalculator
{
public function calc(Post $post, int $numberOfDays)
{
    switch ($numberOfDays) {
        case $numberOfDays > 0 :
            return $numberOfDays * $post->price;
        case $numberOfDays = 0 :
            throw new \Exception('Invalid operation.');
            break;
        default:
            throw new \Exception('Invalid operation.');
    }
}
}
