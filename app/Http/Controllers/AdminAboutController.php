<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::with('users')->oldest('id')->get();

        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'users_id' => auth()->id()
        ]);

        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ], [
            'name.required' => 'Label informasi wajib diisi.',
            'name.string' => 'Label informasi harus berupa teks.',
            'name.max' => 'Label informasi tidak boleh lebih dari 100 karakter.',
            'description.required' => 'Deskripsi lengkap wajib diisi.',
            'description.string' => 'Deskripsi lengkap harus berupa teks.',
        ]);

        About::create($request->only('name', 'description', 'users_id'));

        return redirect()->route('admin.about.index')->with('success', 'Data profil gereja berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $about = About::with('users')->findOrFail($id);

        return view('admin.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $about = About::with('users')->findOrFail($id);

        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge([
            'users_id' => auth()->id()
        ]);
        
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ], [
            'name.required' => 'Label informasi wajib diisi.',
            'name.string' => 'Label informasi harus berupa teks.',
            'name.max' => 'Label informasi tidak boleh lebih dari 100 karakter.',
            'description.required' => 'Deskripsi lengkap wajib diisi.',
            'description.string' => 'Deskripsi lengkap harus berupa teks.',
        ]);

        $about = About::findOrFail($id);

        $about->update($request->only('name', 'description', 'users_id'));

        return redirect()->route('admin.about.index')->with('success', 'Data profil gereja berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect()->route('admin.about.index')->with('success', 'Data profil gereja berhasil dihapus!');
    }
}
