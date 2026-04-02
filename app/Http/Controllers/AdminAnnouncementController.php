<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Carbon::setLocale('id');

        $announcementsFilter = Announcement::query();

        if ($request->filter == 'active') {
            $announcementsFilter->where('date_end', '>=', Carbon::now('Asia/Jakarta')->endOfDay());
        } elseif ($request->filter == 'expired') {
            $announcementsFilter->where('date_end', '<', Carbon::now('Asia/Jakarta')->endOfDay());
        }

        $announcements = $announcementsFilter->paginate(10)->withQueryString();

        foreach ($announcements as $announcement) {
            $announcement->is_date_active = Carbon::now('Asia/Jakarta')->lte(Carbon::parse($announcement->date_end, 'Asia/Jakarta')->endOfDay());
            $announcement->date_start = Carbon::parse($announcement->date_start, 'Asia/Jakarta')->translatedFormat('j F Y');
            $announcement->date_end = Carbon::parse($announcement->date_end, 'Asia/Jakarta')->translatedFormat('j F Y');
        }

        return view('admin.announcement.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:200',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'title.required' => 'Judul pengumuman wajib diisi.',
            'title.string' => 'Judul pengumuman harus berupa teks.',
            'title.max' => 'Judul pengumuman tidak boleh lebih dari 200 karakter.',
            'content.required' => 'Isi pengumuman wajib diisi.',
            'content.string' => 'Isi pengumuman harus berupa teks.',
            'category.required' => 'Kategori pengumuman wajib diisi.',
            'category.string' => 'Kategori pengumuman harus berupa teks.',
            'category.max' => 'Kategori pengumuman tidak boleh lebih dari 100 karakter.',
            'date_start.required' => 'Tanggal mulai wajib diisi.',
            'date_start.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'date_end.required' => 'Tanggal selesai wajib diisi.',
            'date_end.date' => 'Tanggal selesai harus berupa tanggal yang valid.',
            'date_end.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai.',
            'image_url.image' => 'File yang diunggah harus berupa gambar.',
            'image_url.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'image_url.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        $request['users_id'] = auth()->id();

        $announcement = Announcement::create($request->only('title', 'content', 'category', 'date_start', 'date_end', 'users_id'));

        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $path = $file->storeAs('announcements', $filename, 'public');
            $announcement->update(
                ['image_url' => $path]
            );
        }

        return redirect()->route('admin.announcement.index')->with('success', 'Data warta jemaat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Carbon::setLocale('id');

        $announcement = Announcement::with('users')->findOrFail($id);

        $announcement->is_date_active = Carbon::now('Asia/Jakarta')->lte(Carbon::parse($announcement->date_end, 'Asia/Jakarta')->endOfDay());
        $announcement->date_start = Carbon::parse($announcement->date_start)->translatedFormat('j F Y');
        $announcement->date_end = Carbon::parse($announcement->date_end)->translatedFormat('j F Y');

        $announcement->updated_at_local = Carbon::parse($announcement->updated_at)->timezone('Asia/Jakarta')->translatedFormat('j F Y H:i');

        return view('admin.announcement.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('admin.announcement.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $announcement = Announcement::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:200',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'title.required' => 'Judul pengumuman wajib diisi.',
            'title.string' => 'Judul pengumuman harus berupa teks.',
            'title.max' => 'Judul pengumuman tidak boleh lebih dari 200 karakter.',
            'content.required' => 'Isi pengumuman wajib diisi.',
            'content.string' => 'Isi pengumuman harus berupa teks.',
            'category.required' => 'Kategori pengumuman wajib diisi.',
            'category.string' => 'Kategori pengumuman harus berupa teks.',
            'category.max' => 'Kategori pengumuman tidak boleh lebih dari 100 karakter.',
            'date_start.required' => 'Tanggal mulai wajib diisi.',
            'date_start.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'date_end.required' => 'Tanggal selesai wajib diisi.',
            'date_end.date' => 'Tanggal selesai harus berupa tanggal yang valid.',
            'date_end.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai.',
            'image_url.image' => 'File yang diunggah harus berupa gambar.',
            'image_url.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'image_url.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        $request['users_id'] = auth()->id();

        $announcement->update($request->only('title', 'content', 'category', 'date_start', 'date_end', 'users_id'));

        if ($request->hasFile('image_url')) {
            if ($announcement->image_url) {
                Storage::disk('public')->delete($announcement->image_url);
            }

            $file = $request->file('image_url');
            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $path = $file->storeAs('announcements', $filename, 'public');
            $announcement->update(
                ['image_url' => $path]
            );
        } elseif ($request->input('remove_image')) {
            if ($announcement->image_url) {
                Storage::disk('public')->delete($announcement->image_url);
                $announcement->update(['image_url' => null]);
            }
        }

        return redirect()->route('admin.announcement.index')->with('success', 'Data warta jemaat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $announcement = Announcement::findOrFail($id);

        if ($announcement->image_url) {
            Storage::disk('public')->delete($announcement->image_url);
        }

        $announcement->delete();

        return redirect()->route('admin.announcement.index')->with('success', 'Data warta jemaat berhasil dihapus!');
    }
}
