<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    public function show($id) {
        $post = Post::with('comments')->find($id);
        return response()->json($post);
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
