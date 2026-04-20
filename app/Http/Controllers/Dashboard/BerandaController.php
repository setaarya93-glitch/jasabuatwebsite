<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hero;

class BerandaController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        return view('dashboard.beranda.index', compact('hero'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_highlight' => 'required|string|max:255',
            'description' => 'required',
            'button_text' => 'required',
            'button_link' => 'required|url',
            'image' => 'required|url',
        ]);

        $hero = Hero::first();
        if (!$hero) {
            $hero = new Hero();
        }
        
        $hero->fill($request->all());
        $hero->save();

        return redirect()->route('dashboard.beranda.index')->with('success', 'Beranda berhasil diperbarui.');
    }
}
