<?php

namespace App\Http\Controllers;

use App\Models\Devotion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDevotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Carbon::setLocale('id');

        $devotions = Devotion::latest()->paginate(10);

        $devotionCategory = [
            1 => 'Dewasa',
            2 => 'Remaja/Pemuda',
            3 => 'Anak Sekolah Minggu',
            4 => 'Usia Indah',
        ];

        foreach ($devotions as $devotion) {
            $devotion->created_at_formatted = Carbon::parse($devotion->created_at, 'Asia/Jakarta')->translatedFormat('j F Y');
            $devotion->devotionCategory = $devotionCategory[$devotion->category];
        }

        return view('admin.devotion.index', compact('devotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.devotion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:200',
            'bible_verse' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'category' => 'required|in:1,2,3,4',
            'content' => 'required|string',
        ], [
            'title.required' => 'Judul renungan wajib diisi.',
            'title.string' => 'Judul renungan harus berupa teks.',
            'title.max' => 'Judul renungan tidak boleh lebih dari 200 karakter.',
            'bible_verse.required' => 'Nats Alkitab wajib diisi.',
            'bible_verse.string' => 'Nats Alkitab harus berupa teks.',
            'bible_verse.max' => 'Nats Alkitab tidak boleh lebih dari 100 karakter.',
            'author.required' => 'Nama penulis/sumber wajib diisi.',
            'author.string' => 'Nama penulis/sumber harus berupa teks.',
            'author.max' => 'Nama penulis/sumber tidak boleh lebih dari 100 karakter.',
            'category.required' => 'Kategori pembaca wajib dipilih.',
            'category.in' => 'Kategori pembaca tidak valid.',
            'content.required' => 'Isi renungan wajib diisi.',
            'content.string' => 'Isi renungan harus berupa teks.',
        ]);

        $request['users_id'] = auth()->id();

        Devotion::create($request->only('title', 'bible_verse', 'author', 'category', 'content', 'users_id'));

        return redirect()->route('admin.devotion.index')->with('success', 'Data renungan harian berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $devotion = Devotion::findOrFail($id);

        Carbon::setLocale('id');

        $devotion->created_at_formatted = Carbon::parse($devotion->created_at, 'Asia/Jakarta')->translatedFormat('j F Y');

        $devotionCategory = [
            1 => 'Dewasa',
            2 => 'Remaja/Pemuda',
            3 => 'Anak Sekolah Minggu',
            4 => 'Usia Indah',
        ];

        $devotion->devotionCategory = $devotionCategory[$devotion->category];

        return view('admin.devotion.show', compact('devotion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $devotion = Devotion::findOrFail($id);

        return view('admin.devotion.edit', compact('devotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $devotion = Devotion::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:200',
            'bible_verse' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'category' => 'required|in:1,2,3,4',
            'content' => 'required|string',
        ], [
            'title.required' => 'Judul renungan wajib diisi.',
            'title.string' => 'Judul renungan harus berupa teks.',
            'title.max' => 'Judul renungan tidak boleh lebih dari 200 karakter.',
            'bible_verse.required' => 'Nats Alkitab wajib diisi.',
            'bible_verse.string' => 'Nats Alkitab harus berupa teks.',
            'bible_verse.max' => 'Nats Alkitab tidak boleh lebih dari 100 karakter.',
            'author.required' => 'Nama penulis/sumber wajib diisi.',
            'author.string' => 'Nama penulis/sumber harus berupa teks.',
            'author.max' => 'Nama penulis/sumber tidak boleh lebih dari 100 karakter.',
            'category.required' => 'Kategori pembaca wajib dipilih.',
            'category.in' => 'Kategori pembaca tidak valid.',
            'content.required' => 'Isi renungan wajib diisi.',
            'content.string' => 'Isi renungan harus berupa teks.',
        ]);

        $request['users_id'] = auth()->id();

        $devotion->update($request->only('title', 'bible_verse', 'author', 'category', 'content', 'users_id'));

        return redirect()->route('admin.devotion.index')->with('success', 'Data renungan harian berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $devotion = Devotion::findOrFail($id);
        $devotion->delete();

        return redirect()->route('admin.devotion.index')->with('success', 'Data renungan harian berhasil dihapus!');
    }
}
