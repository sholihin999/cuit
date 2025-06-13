<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class CuitController extends Controller
{
    public function index(): View {
        $posts = Post::with('user')->latest()->get();

        return view('home', compact('posts'));
    }
    public function post(Request $request): RedirectResponse {
       Post::create(
            [
                'user_id' => Auth::id(),
                'content' => $request->content,
            ]);

        return redirect('/')->with('success', 'Your Post has been save!');
    }

}
