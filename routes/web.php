<?php

use App\Http\Controllers\PersonalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PersonalController::class, 'welcome']);