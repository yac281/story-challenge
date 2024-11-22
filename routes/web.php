<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    $timerEnd = env('TIMER_END', '2025-01-01');
    return view('welcome', compact('timerEnd'));
});


Route::get('/hotel', function () {
    return view('hotel');
})->name('hotel');

Route::post('/hotel/check', function (\Illuminate\Http\Request $request) {
    $apartment = strtolower($request->input('apartment'));
    if ($apartment === '6a') {
        session(['valid_apartment' => true]);
        return redirect('/hotel/6a');
    }

    $messages = [
        "Appartamento non occupato",
        "Appartamento occupato",
        "Appartamento con lavori in corso"
    ];
    $randomMessage = $messages[array_rand($messages)];
    return back()->with('error', $randomMessage);
})->name('hotel.check');

Route::get('/hotel/6a', function () {
    if (!session()->has('valid_apartment')) {
        return redirect('/hotel')->with('error', 'Devi inserire il numero di appartamento!');
    }
    return view('apartment_6a');
})->name('hotel.6a');

Route::post('/hotel/6a/check', function (\Illuminate\Http\Request $request) {
    $safeCode = $request->input('safe_code');

    if ($safeCode === '9305') {
        session()->flash('message', 'Cassaforte aperta! Hai trovato un indizio importante.');
        // Reindirizza alla rotta per il download
        return redirect()->route('apartment.download');
    }

    return back()->with('message', 'Codice errato. Riprova.');
})->name('apartment.check');

Route::get('/hotel/6a/download', function () {
    $filePath = public_path('documents/diario.pdf'); 
    $fileName = 'diario di Jameson.pdf'; 
    
    return Response::download($filePath, $fileName, [
        'Content-Type' => 'application/pdf',
    ]);
})->name('apartment.download');

Route::get('/pozzo', function () {
    return view('pozzo');
})->name('well');

Route::post('/pozzo/check', function (\Illuminate\Http\Request $request) {
    $blood = $request->input('blood');

    if ($blood === '28') {
        return redirect()->back()->with('message', 'Hai una visione e vedi la signora <a href="/woods">Woods</a>');
    }

    return back()->with('message', 'Ti stai solo dissanguando. Riprova.');
})->name('pozzo.check');

Route::get('/bar', function () {
    return view('bar');
})->name('bar');

Route::post('/bar/check', function (\Illuminate\Http\Request $request) {
    $inputs = $request->only(['field1', 'field2', 'field3']);

    if (
        strtolower($inputs['field1']) === 'acqua' &&
        strtolower($inputs['field2']) === 'caffè' &&
        strtolower($inputs['field3']) === 'tonica'
    ) {
        return redirect()->back()->with('message', '<a href="/hannah">Hannah</a>');
    }

    return back()->with('message', 'Le risposte sono errate. Riprova.');
})->name('bar.check');

Route::get('/hannah', function () {
    return view('hannah');
})->name('hannah');

Route::get('/woods', function () {
    return view('woods');
})->name('woods');

Route::post('/woods/check', function (\Illuminate\Http\Request $request) {
    $safeCode = $request->input('formula');

    if ($safeCode === 'Luxifera') {
        return redirect()->back()->with('message', 'Hai scacciato il male antico, hai vinto!!!!');
    }

    return back()->with('message', 'Formula errata. Riprova.');
})->name('woods.check');