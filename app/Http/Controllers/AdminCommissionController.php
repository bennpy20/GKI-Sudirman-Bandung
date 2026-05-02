<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminCommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Commission::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $commissions = $query->oldest('id')->paginate(10)->withQueryString();

        return view('admin.commission.index', compact('commissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.commission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'day' => 'required|string|max:10',
            'time_start' => 'required',
            'time_end' => 'required',
            'room' => 'required|string|max:200',
        ], [
            'name.required' => 'Nama komisi wajib diisi.',
            'name.string' => 'Nama komisi harus berupa teks.',
            'name.max' => 'Nama komisi tidak boleh lebih dari 100 karakter.',
            'day.required' => 'Hari persekutuan wajib diisi.',
            'day.string' => 'Hari persekutuan harus berupa teks.',
            'day.max' => 'Hari persekutuan tidak boleh lebih dari 10 karakter.',
            'time_start.required' => 'Waktu mulai wajib diisi.',
            'time_end.required' => 'Waktu selesai wajib diisi.',
            'room.required' => 'Lokasi atau ruangan wajib diisi.',
            'room.string' => 'Lokasi atau ruangan harus berupa teks.',
            'room.max' => 'Lokasi atau ruangan tidak boleh lebih dari 200 karakter.',
        ]);

        Commission::create([
            'name' => $request->name,
            'day' => $request->day,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'room' => $request->room,
        ]);

        return redirect()->route('admin.commission.index')->with('success', 'Data komisi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Carbon::setLocale('id');

        $commission = Commission::findOrFail($id);

        $memberStatus = [
            1 => 'Koordinator Hamba Tuhan',
            2 => 'Pendeta',
            3 => 'Penginjil',
            4 => 'Penatua',
            5 => 'Diaken',
            6 => 'Jemaat Biasa',
        ];

        $members = $commission->members()->oldest('id')->get()->map(function ($member) use ($memberStatus) {
            $member->memberStatus = $memberStatus[$member->status];
            return $member;
        });

        foreach ($members as $member) {
            $member->birth_date_formatted = Carbon::parse($member->birth_date, 'Asia/Jakarta')->translatedFormat('j F Y');
        }

        return view('admin.commission.show', compact('commission', 'members'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commission = Commission::findOrFail($id);

        return view('admin.commission.edit', compact('commission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'day' => 'required|string|max:10',
            'time_start' => 'required',
            'time_end' => 'required',
            'room' => 'required|string|max:200',
        ], [
            'name.required' => 'Nama komisi wajib diisi.',
            'name.string' => 'Nama komisi harus berupa teks.',
            'name.max' => 'Nama komisi tidak boleh lebih dari 100 karakter.',
            'day.required' => 'Hari persekutuan wajib diisi.',
            'day.string' => 'Hari persekutuan harus berupa teks.',
            'day.max' => 'Hari persekutuan tidak boleh lebih dari 10 karakter.',
            'time_start.required' => 'Waktu mulai wajib diisi.',
            'time_end.required' => 'Waktu selesai wajib diisi.',
            'room.required' => 'Lokasi atau ruangan wajib diisi.',
            'room.string' => 'Lokasi atau ruangan harus berupa teks.',
            'room.max' => 'Lokasi atau ruangan tidak boleh lebih dari 200 karakter.',
        ]);

        $commission = Commission::findOrFail($id);
        $commission->update([
            'name' => $request->name,
            'day' => $request->day,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'room' => $request->room,
        ]);

        return redirect()->route('admin.commission.index')->with('success', 'Data komisi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commission = Commission::findOrFail($id);
        $commission->delete();

        return redirect()->route('admin.commission.index')->with('success', 'Data komisi berhasil dihapus!');
    }
}
