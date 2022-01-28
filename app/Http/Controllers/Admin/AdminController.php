<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard')->with([
            'countUsers' => User::all()->count(),
            'countGames' => Game::all()->count(),
            'countQuestions' => Question::all()->count(),
            'countCategories' => Category::all()->count()
        ]);
    }
}
