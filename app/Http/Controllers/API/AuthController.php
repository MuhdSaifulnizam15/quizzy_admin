<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Avatar;
use Storage;

class AuthController extends BaseController
{
    use SendsPasswordResetEmails, VerifiesEmails;

    /**
     * Register API
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $avatar = Avatar::create($user->name)->getImageObject()->encode('png');
        Storage::put('avatars/'.$user->id.'/avatar.png', (string) $avatar);

        $user->sendEmailVerificationNotification();
        // $success['token'] = $user->createToken('QuizzySecret')->accessToken;
        $success['email'] = $user->email;

        return $this->sendResponse(
            // 'User successfully registered', $success
            'something', $user
        );
    }

    /**
     * Login API
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            $success['token'] = $user->createToken('QuizzySecret')->accessToken;
            $success['name'] = $user->name; 

            if($user->email_verified_at !== null){
                return $this->sendResponse(
                    'User sucessfully login', $success
                );
            } else {
                return $this->sendResponse(
                    'Please verify your account. Check the inbox of this email ' . $request->email, $success
                );
            }
        } else {
            return $this->sendError(
                'Invalid credentials'
            );
        }
    }

    /**
     * Logout API
     * 
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request){
        if(auth()->user()){
            $accessToken = auth()->user()->token()->revoke();

            return $this->sendResponse(
                'You have successfully logged out!'
            );
        } else {
            return $this->sendError(
                'Unable to logout',
            );
        }
    }

    /**
     * Send password reset link.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function forgot(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return $this->sendResponse(
            'Password reset email sent.', $response
        );
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return $this->sendResponse(
            'Email could not be sent to this email address.'
        );
    }

    /**
     * Handle reset password 
     */
    public function callResetPassword(Request $request)
    {
        return $this->reset($request);
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();

        event(new PasswordReset($user));
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return $this->sendResponse(
            'Password reset successfully'
        );
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return $this->sendResponse(
            'Failed, Invalid Token'
        );
    }

    /**
     * Verify email 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request) {
        if (!$request->hasValidSignature()) {
            return $this->sendError('Invalid/Expired url provided', [], 401);
        }
    
        $user = User::findOrFail($request->id);
    
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            return $this->sendResponse('Email verified');
        } else {
            return $this->sendResponse('Email already verified');
        }
    
    }

    /**
     * Resend email verification link 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->sendError('Email already verified', [], 400);
        }
    
        $request->user()->sendEmailVerificationNotification();
    
        return $this->sendResponse('Email verification link sent on your email id');
        
    }

    /**
     * Return unauthorize error message 
     * 
     * @return \Illuminate\Http\Response
     */
    public function unauthorized() { 
        return $this->sendError("unauthorized", [], 401); 
    } 

    /**
     * Get User Details
     * 
     * @return \Illuminate\Http\Response
     */
    public function getUserDetails() {
        $user = Auth::user();
        return $this->sendResponse('user details', $user);
    }
}
