<?php

namespace App\Http\Controllers;

use App\Mail\QuoteRequestReceived;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Throwable;

class QuoteRequestController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $back = route('contact').'#quote-form';

        // Honeypot: the "website" field is hidden from people, so only bots fill it.
        // Answer as if it worked and send nothing.
        if ($request->filled('website')) {
            return redirect($back)->with('status', 'quote-request-sent');
        }

        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'company' => ['nullable', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'phone' => ['nullable', 'string', 'max:50'],
                'service_interest' => ['nullable', 'string', 'max:255'],
                'message' => ['required_without:items', 'nullable', 'string', 'max:5000'],
                // Quote list from the product catalogue
                'items' => ['nullable', 'array', 'max:200'],
                'items.*.sku' => ['required', 'string', 'max:50'],
                'items.*.name' => ['required', 'string', 'max:255'],
                'items.*.qty' => ['required', 'integer', 'min:1', 'max:1000000'],
            ]);
        } catch (ValidationException $e) {
            throw $e->redirectTo($back);
        }

        $data += ['company' => null, 'phone' => null, 'service_interest' => null, 'message' => null, 'items' => null];

        try {
            Mail::to(config('services.quotes.to'))->send(new QuoteRequestReceived($data));
        } catch (Throwable $e) {
            // Never tell the buyer it went through when it didn't: keep what they
            // typed and point them at the inbox directly.
            report($e);

            return redirect($back)->withInput()->with('status', 'quote-request-failed');
        }

        return redirect($back)->with('status', 'quote-request-sent');
    }
}
