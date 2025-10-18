<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Mail\ContactMessageMail;
use App\Models\Setting;

class ContactController extends Controller
{
    /**
     * Handle contact form submission: validate, send email, and confirm.
     */
    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'nullable|string|max:30',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Determine recipient (admin/support email)
        $setting = Setting::current();
        $toAddress = $setting->email ?: config('mail.from.address');
        $toName = $setting->business_name ?: config('mail.from.name');

        try {
            Mail::to([$toAddress => $toName])
                ->send(new ContactMessageMail($validated));
        } catch (\Throwable $e) {
            Log::error('Contact form email failed', [
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withInput()
                ->withErrors(['email' => 'Sorry, we could not send your message at the moment. Please try again later.']);
        }

        return back()->with('success', 'Thank you, your message has been sent successfully.');
    }
}