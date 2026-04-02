<?php

namespace App\Http\Controllers;

use App\Models\LiturgicalCalendar;
use Illuminate\Http\Request;

class AdminLiturgicalCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liturgical_calendars = LiturgicalCalendar::oldest('id')->paginate(10);

        return view('admin.liturgical_calendar.index', compact('liturgical_calendars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.liturgical_calendar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'color' => 'required|string|max:50',
        ], [
            'name.required' => 'Nama pekan liturgi wajib diisi.',
            'name.string' => 'Nama pekan liturgi harus berupa teks.',
            'name.max' => 'Nama pekan liturgi tidak boleh lebih dari 150 karakter.',
            'color.required' => 'Warna wajib diisi.',
            'color.string' => 'Warna harus berupa teks.',
            'color.max' => 'Warna tidak boleh lebih dari 50 karakter.',
        ]);

        LiturgicalCalendar::create($request->only('name', 'color'));

        return redirect()->route('admin.liturgical_calendar.index')->with('success', 'Data pekan liturgi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $liturgical_calendar = LiturgicalCalendar::findOrFail($id);

        return view('admin.liturgical_calendar.show', compact('liturgical_calendar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $liturgical_calendar = LiturgicalCalendar::findOrFail($id);

        return view('admin.liturgical_calendar.edit', compact('liturgical_calendar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'color' => 'required|string|max:50',
        ], [
            'name.required' => 'Nama pekan liturgi wajib diisi.',
            'name.string' => 'Nama pekan liturgi harus berupa teks.',
            'name.max' => 'Nama pekan liturgi tidak boleh lebih dari 150 karakter.',
            'color.required' => 'Warna wajib diisi.',
            'color.string' => 'Warna harus berupa teks.',
            'color.max' => 'Warna tidak boleh lebih dari 50 karakter.',
        ]);

        $liturgical_calendar = LiturgicalCalendar::findOrFail($id);
        $liturgical_calendar->update($request->only('name', 'color'));

        return redirect()->route('admin.liturgical_calendar.index')->with('success', 'Data pekan liturgi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $liturgical_calendar = LiturgicalCalendar::findOrFail($id);
        $liturgical_calendar->delete();

        return redirect()->route('admin.liturgical_calendar.index')->with('success', 'Data pekan liturgi berhasil dihapus!');
    }
}
