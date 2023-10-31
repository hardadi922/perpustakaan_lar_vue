<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuStoreRequest;
use App\Http\Requests\BukuUpdateRequest;
use App\Models\Buku;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $buku = BukuResource::collection(Buku::all());
        $buku = Buku::all();
        // dd($buku);

        return Inertia::render('Buku/Index', [
            'bukus' => $buku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Buku/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BukuStoreRequest $request)
    {
        dd($request);
        $request->validated($request->all());
        $buku = Buku::create([
            'judul_buku' => $request->judul_buku,
        ]);

        return to_route('buku.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        // dd($buku->judul_buku);
        return Inertia::render('Buku/Edit',[
            'buku' => $buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BukuUpdateRequest $request, string $id)
    {
        // dd($id);

        $request->validated($request->all());
        $buku = Buku::find($id);
        $buku->judul_buku = $request->judul_buku;
        $buku->save();

        return Inertia::render('Buku/Edit',[
            'buku' => $buku
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    //    dd($id);
        $buku = Buku::find($id);
        // dd($buku);
        $buku->delete();
        return to_route("buku.index");
    }
}
