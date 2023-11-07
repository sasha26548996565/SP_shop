<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpRequest;
use Domain\Auth\Contracts\RegisterNewUserContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SignUpController extends Controller
{
    public function renderPage(): View
    {
        return view('auth.sign-up');
    }

    public function handle(SignUpRequest $request, RegisterNewUserContract $action): RedirectResponse
    {
        $action(
            $request->get('name'),
            $request->get('email'),
            $request->get('password'),
        );
        return redirect()->intended(route('home'));
    }
}