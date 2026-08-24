<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuoteRequestController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'company' => ['nullable', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'phone' => ['nullable', 'string', 'max:50'],
                'service_interest' => ['nullable', 'string', 'max:255'],
                'message' => ['required', 'string', 'max:5000'],
            ]);
        } catch (ValidationException $e) {
            throw $e->redirectTo(route('home').'#contact');
        }

        QuoteRequest::create($validated);

        return redirect(route('home').'#contact')->with('status', 'quote-request-sent');
    }
}
