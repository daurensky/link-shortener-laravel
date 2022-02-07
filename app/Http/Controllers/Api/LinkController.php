<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\LinkService;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function store(Request $request, LinkService $linkService): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $hash = $linkService->getOrCreate($request->input('url'));

        return response()->json($hash);
    }
}
