<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class AdminRegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::oldest('id')->paginate(10);
        
        return view('admin.region.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.region.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:200',
        ], [
            'name.required' => 'Nama pekan liturgi wajib diisi.',
            'name.string' => 'Nama pekan liturgi harus berupa teks.',
            'name.max' => 'Nama pekan liturgi tidak boleh lebih dari 100 karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 200 karakter.',
        ]);

        Region::create($request->only('name', 'description'));

        return redirect()->route('admin.region.index')->with('success', 'Data rayon berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $region = Region::findOrFail($id);

        $memberStatus = [
            1 => 'Pendeta',
            2 => 'Penginjil',
            3 => 'Penatua',
            4 => 'Diaken',
            5 => 'Jemaat',
        ];

        $members = $region->members()->oldest('id')->get()->map(function ($member) use ($memberStatus) {
            $member->memberStatus = $memberStatus[$member->status];
            return $member;
        });

        return view('admin.region.show', compact('region', 'members'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $region = Region::findOrFail($id);

        return view('admin.region.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:200',
        ], [
            'name.required' => 'Nama pekan liturgi wajib diisi.',
            'name.string' => 'Nama pekan liturgi harus berupa teks.',
            'name.max' => 'Nama pekan liturgi tidak boleh lebih dari 100 karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 200 karakter.',
        ]);

        $region = Region::findOrFail($id);
        $region->update($request->only('name', 'description'));

        return redirect()->route('admin.region.index')->with('success', 'Data rayon berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $region = Region::findOrFail($id);
        $region->delete();

        return redirect()->route('admin.region.index')->with('success', 'Data rayon berhasil dihapus!');    
    }
}
