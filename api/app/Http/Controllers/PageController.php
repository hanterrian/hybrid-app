<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function view(Request $request, string $slug)
    {
        $model = Page::where(['slug' => $slug])
            ->firstOrFail();

        return new PageResource($model);
    }
}
