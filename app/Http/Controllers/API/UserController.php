<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends BaseController
{
    /**
     * Get User Profile API
     * 
     * @return \Illuminate\Http\Response
     */
    public function getUserProfile(Request $request){
        $user = Auth::user();

        return $this->sendResponse(
            'User Profile', $user
        );
    }

    /**
     * Update User Profile API
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateUserProfile(Request $request){
        $user = Auth::user();

        return $this->sendResponse(
            'Profile Successfully Updated', $user
        );
    }
}
