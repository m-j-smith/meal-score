<?php

namespace App\Http\Controllers\Auth;

use App\DTOs\Auth\UserRegistrationDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisteredUserRequest;
use App\Services\Auth\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisteredUserRequest $request, UserService $userService): RedirectResponse
    {
        $userDTO = UserRegistrationDTO::fromRequest($request);

        $user = $userService->create($userDTO);

        auth()->login($user);

        $request->session()->regenerate();

        return redirect()->route('verification.notice');
    }
}
