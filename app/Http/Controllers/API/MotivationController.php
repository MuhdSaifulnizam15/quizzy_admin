<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Motivation;

class MotivationController extends BaseController
{
    /**
     * Get Daily Motivation API
     * 
     * @return \Illuminate\Http\Response
     */
    public function getDailyMotivation(Request $request){
        $motivation = Motivation::inRandomOrder()->first(); // get one random record

        return $this->sendResponse(
            'Daily Motivation', $motivation
        );
    }
}
