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
    public function index(Request $request)
    {
        Carbon::setLocale('id');

        $today = Carbon::today('Asia/Jakarta');

        $query = Devotion::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            if ($request->status == 'active') {
                $query->whereDate('date', $today);
            } elseif ($request->status == 'past') {
                $query->whereDate('date', '<', $today);
            } elseif ($request->status == 'upcoming') {
                $query->whereDate('date', '>', $today);
            }
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $devotions = $query->latest()->paginate(10)->withQueryString();

        $devotionCategory = [
            1 => 'Umum',
            2 => 'Remaja/Pemuda',
            3 => 'Anak Sekolah Minggu',
            4 => 'Usia Indah',
        ];

        foreach ($devotions as $devotion) {
            $devotion->date_formatted = Carbon::parse($devotion->date, 'Asia/Jakarta')->translatedFormat('j F Y');
            $devotion->devotionCategory = $devotionCategory[$devotion->category];
        }

        return view('admin.devotion.index', compact('devotions', 'devotionCategory'));
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
        $request->merge([
            'users_id' => auth()->id()
        ]);

        $request->validate([
            'title' => 'required|string|max:200',
            'bible_verse' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'category' => 'required|in:1,2,3,4',
            'content' => 'required|string',
            'date' => 'required|date',
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
            'date.required' => 'Tanggal renungan wajib diisi.',
            'date.date' => 'Tanggal renungan tidak valid.',
        ]);

        Devotion::create([
            'title' => $request->title,
            'bible_verse' => $request->bible_verse,
            'author' => $request->author,
            'category' => $request->category,
            'content' => $request->content,
            'date' => $request->date,
            'users_id' => $request->users_id,
        ]);

        return redirect()->route('admin.devotion.index')->with('success', 'Data renungan harian berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $devotion = Devotion::findOrFail($id);

        Carbon::setLocale('id');

        $devotion->date_formatted = Carbon::parse($devotion->date, 'Asia/Jakarta')->translatedFormat('j F Y');
        $devotion->updated_at_local = Carbon::parse($devotion->updated_at, 'Asia/Jakarta')->timezone('Asia/Jakarta')->translatedFormat('j F Y H:i');

        $devotionCategory = [
            1 => 'Umum',
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
        $request->merge([
            'users_id' => auth()->id()
        ]);

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
            'date.required' => 'Tanggal renungan wajib diisi.',
            'date.date' => 'Tanggal renungan tidak valid.',
        ]);

        $devotion = Devotion::findOrFail($id);

        $devotion->update([
            'title' => $request->title,
            'bible_verse' => $request->bible_verse,
            'author' => $request->author,
            'category' => $request->category,
            'content' => $request->content,
            'date' => $request->date,
            'users_id' => $request->users_id,
        ]);

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
