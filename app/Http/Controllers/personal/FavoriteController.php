<?php

namespace App\Http\Controllers\personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class FavoriteController extends Controller
{
    public function index()
    {

        $favorites = Favorite::with('diary')->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        
        return view('personal.favorite', compact('favorites'));
    }

    public function destroy(Favorite $favorite)
    {
        // Delete the favorite entry
        $favorite->delete();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Favorite successfully removed!');
    }
}
