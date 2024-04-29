<?php

namespace App\Http\Controllers\personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class DiaryController extends Controller
{
    public function show()
    {
        // Fetch diary entries for the specified user
        $diaries = Diary::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        // Pass the diary entries to a view for display
        return view('personal.diaries', compact('diaries'));
    }

    public function showCreate()
    {
        return view('personal.diaryCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $diary = new Diary();
        $diary->user_id = Auth::id();
        $diary->content = $request->input('content');
        $diary->save();

        return redirect()->route('user.diary', ['userId' => Auth::id()])->with('success', 'Diary entry created successfully!');    
    }

    public function addToFavorites($diaryId)
    {
        // Retrieve the authenticated user
        $userId = auth()->id();

        // Check if the user has already favorited the diary post
        $existingFavorite = Favorite::where('user_id', $userId)
                                ->where('diary_id', $diaryId)
                                ->exists();

        // If the favorite entry doesn't already exist, create a new one
        if (!$existingFavorite) {
            $favorite = new Favorite();
            $favorite->user_id = $userId;
            $favorite->diary_id = $diaryId;
            $favorite->save();
    
            return redirect()->route('user.diary', ['userId' => $userId])->with('success', 'Favorite successfully added!');
        } else {
            // If the favorite entry already exists, redirect back with an error message
            return redirect()->back()->with('error', 'Diary post is already in favorites!');
        }
    }

    public function destroy(Diary $diary)
    {
        // Delete the diary entry
        $diary->delete();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Diary entry successfully deleted!');
    }

    
}
