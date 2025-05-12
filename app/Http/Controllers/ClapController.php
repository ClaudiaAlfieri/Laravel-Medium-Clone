<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ClapController extends Controller
{
    public function clap(Post $post)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'clapsCount' => $post->claps()->count(),
                'error' => 'Usuário não autenticado'
            ], 401);
        }

        $hasClapped = $user->hasClapped($post);

        if ($hasClapped) {
            $post->claps()->where('user_id', $user->id)->delete();
            $hasClapped = false;
        } else {
            $post->claps()->create([
                'user_id' => $user->id,
            ]);
            $hasClapped = true;
        }

        return response()->json([
            'clapsCount' => $post->claps()->count(),
            'hasClapped' => $hasClapped
        ]);
    }
}
