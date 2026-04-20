<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Template;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::all();
        return view('dashboard.template.index', compact('templates'));
    }

    public function create()
    {
        return view('dashboard.template.create');
    }

    private function formatData($data)
    {
        if(isset($data['packages']) && is_array($data['packages'])) {
            foreach(['basic', 'standard', 'premium'] as $type) {
                if(isset($data['packages'][$type]['features']) && is_string($data['packages'][$type]['features'])) {
                    $featuresStr = $data['packages'][$type]['features'];
                    $featuresArr = array_map('trim', explode(',', $featuresStr));
                    $data['packages'][$type]['features'] = array_filter($featuresArr);
                }
            }
        }
        
        if(isset($data['reviews']) && is_array($data['reviews'])) {
            // Remove empty reviews
            $data['reviews'] = array_filter($data['reviews'], function($rev) {
                return !empty($rev['user']) || !empty($rev['comment']);
            });
            // Re-index array
            $data['reviews'] = array_values($data['reviews']);
        }
        
        return $data;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required',
            'rating' => 'required',
            'reviews_count' => 'required|numeric',
            'description' => 'required',
        ]);

        $data = $request->except('_token');
        $data = $this->formatData($data);
        Template::create($data);
        return redirect()->route('dashboard.template.index')->with('success', 'Template berhasil ditambah.');
    }

    public function edit(Template $template)
    {
        return view('dashboard.template.edit', compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required',
            'rating' => 'required',
            'reviews_count' => 'required|numeric',
            'description' => 'required',
        ]);

        $data = $request->except('_token', '_method');
        $data = $this->formatData($data);
        $template->update($data);
        return redirect()->route('dashboard.template.index')->with('success', 'Template berhasil diperbarui.');
    }

    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('dashboard.template.index')->with('success', 'Template berhasil dihapus.');
    }
}
