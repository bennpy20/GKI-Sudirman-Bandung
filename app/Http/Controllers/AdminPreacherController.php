<?php

namespace App\Http\Controllers;

use App\Models\Preacher;
use Illuminate\Http\Request;

class AdminPreacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preachers = Preacher::oldest('id')->paginate(10);

        return view('admin.preacher.index', compact('preachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.preacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'base' => 'required|string|max:100',
        ], [
            'name.required' => 'Nama pengkhotbah wajib diisi.',
            'name.string' => 'Nama pengkhotbah harus berupa teks.',
            'name.max' => 'Nama pengkhotbah tidak boleh lebih dari 200 karakter.',
            'base.required' => 'Basis jemaat pengkhotbah wajib diisi.',
            'base.string' => 'Basis jemaat pengkhotbah harus berupa teks.',
            'base.max' => 'Basis jemaat pengkhotbah tidak boleh lebih dari 100 karakter.',
        ]);

        Preacher::create([
            'name' => $request->name,
            'base' => $request->base,
        ]);

        return redirect()->route('admin.preacher.index')->with('success', 'Data pengkhotbah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $preacher = Preacher::findOrFail($id);

        return view('admin.preacher.show', compact('preacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $preacher = Preacher::findOrFail($id);

        return view('admin.preacher.edit', compact('preacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'base' => 'required|string|max:100',
        ], [
            'name.required' => 'Nama pengkhotbah wajib diisi.',
            'name.string' => 'Nama pengkhotbah harus berupa teks.',
            'name.max' => 'Nama pengkhotbah tidak boleh lebih dari 200 karakter.',
            'base.required' => 'Basis jemaat pengkhotbah wajib diisi.',
            'base.string' => 'Basis jemaat pengkhotbah harus berupa teks.',
            'base.max' => 'Basis jemaat pengkhotbah tidak boleh lebih dari 100 karakter.',
        ]);

        $preacher = Preacher::findOrFail($id);
        $preacher->update([
            'name' => $request->name,
            'base' => $request->base,
        ]);

        return redirect()->route('admin.preacher.index')->with('success', 'Data pengkhotbah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $preacher = Preacher::findOrFail($id);
        $preacher->delete();

        return redirect()->route('admin.preacher.index')->with('success', 'Data pengkhotbah berhasil dihapus.');
    }
}
