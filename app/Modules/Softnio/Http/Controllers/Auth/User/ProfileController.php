<?php

namespace App\Modules\Softnio\Http\Controllers\Auth\User;

use App\Modules\Softnio\Http\Requests\User\UserProfileRequest as Request;
use App\Modules\Softnio\Services\Profile\UserProfileService;

class ProfileController
{
    protected $service;

    public function __construct(UserProfileService $profileService)
    {
        $this->service = $profileService;
    }

    public function kycView()
    {
        return view('App\Modules\Softnio::admin.profile.kyc_view');
    }

    public function profile()
    {
        return $this->service->with('profile', 'document:id,user_id,type', 'address')
            ->find(auth()->id());
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        auth()->user()->update(
            $request->only('first_name', 'last_name', 'display_name')
        );

        $this->service->profile($request);

        $this->service->address($request);

        if ($request->type)
            $this->service->documentType($request);

        return response()->json([
            'message' => 'Profile updated successfully'
        ]);
    }

    public function showProfile()
    {
        return view('App\Modules\Softnio::admin.profile.profile');
    }
}
