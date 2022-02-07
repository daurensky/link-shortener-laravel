<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function getByHash($hash)
    {
        $link = Link::where('hash', $hash)->first();
        $link->views += 1;
        $link->save();

        return redirect($link->original);
    }
}
