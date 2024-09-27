<?php

    function greeting()
    {
        $hour = date('H');

        if ($hour >= 5 && $hour <= 11) {
            return 'Good morning';
        } elseif ($hour >= 12 && $hour <= 17) {
            return 'Good afternoon';
        } elseif ($hour >= 18 && $hour <= 20) {
            return 'Good evening';
        } else {
            return 'Good night';
        }
    }
