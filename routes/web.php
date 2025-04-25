<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmailListController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CampaignCreateSessionControl;
use App\Http\Controllers\TrackingController;


Route::get('/t/{mail}/o', [TrackingController::class, 'openings'])->name('tracking.openings');
Route::get('/t/{mail}/c', [TrackingController::class, 'clicks'])->name('tracking.clicks');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/email-list', [EmailListController::class, 'index'])->name('email-list.index');
    Route::get('/email-list/create', [EmailListController::class, 'create'])->name('email-list.create');
    Route::post('/email-list/create', [EmailListController::class, 'store']);
    Route::post('/email-list', [EmailListController::class, 'store'])->name('email-list.store');
    Route::get('/email-list/{emailList}/subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
    Route::get('/email-list/{emailList}/subscribers/create', [SubscriberController::class, 'create'])->name('subscribers.create');
    Route::post('/email-list/{emailList}/subscribers/create', [SubscriberController::class, 'store']);
    Route::delete('/email-list/{emailList}/subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');
    Route::resource('templates', TemplateController::class);

    // Campaigns Routes

    Route::get('/', [CampaignController::class, 'index'])->name('campaigns.index');

    Route::get('/campaigns/create/{tab?}', [CampaignController::class, 'create'])->middleware(CampaignCreateSessionControl::class)->name('campaigns.create');
    Route::post('/campaigns/create/{tab?}', [CampaignController::class, 'store']);
    Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy'])->name('campaigns.destroy');

    Route::get('/campaigns/{campaign}/statistics', [CampaignController::class, 'showStatistics'])->name('campaigns.show.statistics');
    Route::get('/campaigns/{campaign}/open', [CampaignController::class, 'showOpen'])->name('campaigns.show.open');
    Route::get('/campaigns/{campaign}/clicked', [CampaignController::class, 'showClicked'])->name('campaigns.show.clicked');



});

require __DIR__.'/auth.php';
