<?php

namespace app\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtikelResource;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() {
        $artikel = Artikel::latest()->paginate(5);

        return new ArtikelResource(true, 'List Data Artikel', $artikel);
    }

    /**
     * store
     *
     * @param mixed $request
     * @return void
     */

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama'          => 'required',
            'thumbnail'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'konten'        => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $thumbnail = $request->file('thumbnail');
        $thumbnail->storeAs('public/artikel', $thumbnail->hashName());

        $artikel = Artikel::create([
            'nama'          => $request->nama,
            'thumbnail'     => $thumbnail->hashName(),
            'konten'        => $request->konten,

        ]);

        return new ArtikelResource(true, 'Data Artikel berhasil ditambah', $artikel);
    }

    /**
     * show
     *
     * @param mixed $id
     * @return void
     */
    public function show($id) {
        $artikel = Artikel::find($id);

        return new ArtikelResource(true, 'Detail data artikel', $artikel);
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
            'nama'      => 'required',
            'konten'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $artikel = Artikel::find($id);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnail->storeAs('public/artikel', $thumbnail->hashName());

            Storage::delete('public/artikel/' . basename($artikel->thumbnail));

            $artikel->update([
                'nama'          => $request->nama,
                'thumbnail'     => $thumbnail->hashName(),
                'konten'        => $request->konten,
            ]);
        } else {
            $artikel->update([
                'nama'      => $request->nama,
                'konten'    => $request->konten,
            ]);
        }

        return new ArtikelResource(true, 'Data Artikel Berhasil diubah', $artikel);
    }


     /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {

        //find post by ID
        $artikel = Artikel::find($id);

        //delete image
        Storage::delete('public/artikel/'.basename($artikel->thumbnail));

        //delete post
        $artikel->delete();

        //return response
        return new ArtikelResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
