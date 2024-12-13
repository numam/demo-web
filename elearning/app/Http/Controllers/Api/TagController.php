<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() {
        $tags = Tag::latest()->paginate(5);

        return new TagResource(true, 'List Data Tags', $tags);
    }

    /**
     * store
     *
     * @param mixed $request
     * @return void
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tags,slug',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tag = Tag::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
        ]);

        return new TagResource(true, 'Tag berhasil ditambah', $tag);
    }

    /**
     * show
     *
     * @param mixed $id
     * @return void
     */
    public function show($id) {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return new TagResource(true, 'Detail data tag', $tag);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tags,slug,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $tag->update([
            'nama' => $request->nama,
            'slug' => $request->slug,
        ]);

        return new TagResource(true, 'Data Tag berhasil diubah', $tag);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id) {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $tag->delete();

        return new TagResource(true, 'Data Tag berhasil dihapus', null);
    }
}
