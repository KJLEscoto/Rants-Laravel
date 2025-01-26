<?php

namespace App\Http\Controllers;

use App\Models\Rant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class LikeController extends Controller
{
    public function toggleLike(Rant $rant)
    {
        $user = Auth::user();

        // Check if the user has already liked the rant
        $like = $rant->likes()->where('user_id', $user->id)->first();

        if ($like) {
            // If already liked, remove the like
            $like->delete();
            return redirect()->back()->with('status', 'Like removed.');
        } else {
            // Otherwise, add a like
            $rant->likes()->create(['user_id' => $user->id]);
            return redirect()->back()->with('status', 'Rant liked!');
        }
    }

}