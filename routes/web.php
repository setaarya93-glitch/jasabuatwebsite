<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

use App\Models\Hero;
use App\Models\Template;
use App\Http\Controllers\Dashboard\BerandaController;
use App\Http\Controllers\Dashboard\TemplateController;
use App\Http\Controllers\Dashboard\AnalyticsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CalculatorFeatureController;

// API untuk landing page (public)
Route::get('/api/calculator-features', [CalculatorFeatureController::class, 'apiIndex']);

Route::get('/', function () {
    $hero = Hero::first();
    $templatesDB = Template::all();
    return view('landing.index', compact('hero', 'templatesDB'));
})->name('home');

Route::get('/template/{id}', function ($id) {
    $template = Template::findOrFail($id);
    return view('landing.template.details', compact('template'));
})->name('template.details');

Route::get('/demo/{id}', function ($id) {
    $template = Template::findOrFail($id);
    $demoView = 'landing.demo.' . strtolower(str_replace(' ', '_', $template->name));
    
    if (!view()->exists($demoView)) {
        $demoView = 'landing.demo.default';
    }
    
    return view($demoView, compact('template'));
})->name('template.demo');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');
        Route::post('/analytics/refresh', [AnalyticsController::class, 'refresh'])->name('analytics.refresh');
        Route::get('/analytics/history', [AnalyticsController::class, 'history'])->name('analytics.history');
        Route::get('/analytics/view', [AnalyticsController::class, 'show'])->name('analytics.show');
        
        Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda.index');
        Route::post('/beranda', [BerandaController::class, 'update'])->name('beranda.update');
        
        Route::resource('template', TemplateController::class)->except(['show']);
        Route::resource('calculator-features', CalculatorFeatureController::class)->except(['show']);
    });
});

require __DIR__.'/settings.php';
