<?php

if (!function_exists('star_rating')) {
    function star_rating($evaluation)
    {
        if ($evaluation >= 0 && $evaluation <= 1.8) {
            return '★☆☆☆☆';
        } elseif ($evaluation > 1.8 && $evaluation <= 2.8) {
            return '★★☆☆☆';
        } elseif ($evaluation > 2.8 && $evaluation <= 3.8) {
            return '★★★☆☆';
        } elseif ($evaluation > 3.8 && $evaluation <= 4.6) {
            return '★★★★☆';
        } elseif ($evaluation > 4.6 && $evaluation <= 5) {
            return '★★★★★';
        }
    }
}
