<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() {
        $tag = Tag::latest()->paginate(5);

        return new TagResource(true, 'List Data Tag', $tag);
    }
}
