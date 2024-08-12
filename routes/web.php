<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

if (setting('dotdigital.active')) {

    Route::post('/dotdigital/subscribe', function(Request $request) {

        $response = Http::withHeaders([
            'authorization' => 'Basic '.base64_encode(setting('dotdigital.username').':'.setting('dotdigital.password')),
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ])->post('https://r1-api.dotdigital.com/v2/contacts/with-consent-and-preferences', [
            'contact' => [
                'email' => $request->input('email'),
                'isOptedIn' => true
            ]
        ]);

        if($response->status() === 201) {
            return response()->json(['subscribed' => true]);
        }

        return response()->json(['subscribed' => false]);

    })->name('dotdigital.subscribe');
}
