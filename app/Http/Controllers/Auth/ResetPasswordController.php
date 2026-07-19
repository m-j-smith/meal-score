<?php

namespace App\Http\Controllers\Auth;

use App\DTOs\Auth\ResetPasswordDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Services\Auth\ResetPasswordService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws ValidationException
     */
    public function store(ResetPasswordRequest $request, ResetPasswordService $resetPasswordService): RedirectResponse
    {
        $resetPasswordDTO = ResetPasswordDTO::fromRequest($request);

        $status = $resetPasswordService->create($resetPasswordDTO);

        // If the password was successfully reset, redirect the user back to the application's home authenticated view.
        // If there is an error, redirect them back to where they came from with their error message.
        return $status === Password::PasswordReset
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
    }
}
