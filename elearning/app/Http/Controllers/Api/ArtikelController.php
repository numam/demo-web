<?php

namespace app\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtikelResource;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
}
