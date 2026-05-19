<?php

namespace App\Http\Controllers;

use App\Models\Devotion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DevotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Carbon::setLocale('id');

        $query = Devotion::query();

        $selectedCategory = $request->input('category', 1);

        $query->where('category', $selectedCategory);

        $devotions = $query->orderBy('date', 'desc')->get();

        $categoryMap = [
            1 => 'Umum',
            2 => 'Remaja/Pemuda',
            3 => 'Anak Sekolah Minggu',
            4 => 'Usia Indah',
        ];

        foreach ($devotions as $devotion) {
            $devotion->formatted_date = Carbon::parse($devotion->date)->translatedFormat('j F Y');
            $devotion->month_year = Carbon::parse($devotion->date)->translatedFormat('F Y');
            $devotion->category_name = $categoryMap[$devotion->category] ?? 'Tidak Diketahui';
        }

        $devotionCategories = Devotion::select('category')->distinct()->pluck('category');

        $devotionCategories = $devotionCategories->map(function ($cat) use ($categoryMap) {
            return [
                'value' => $cat,
                'label' => $categoryMap[$cat]
            ];
        });

        // featuredDevotion = renungan di hari ini

        $featuredDevotion = $devotions->first(function ($devotion) {
            return Carbon::parse($devotion->date)->isToday();
        });

        $featuredDevotion = $devotions->first(function ($devotion) {
            return Carbon::parse($devotion->date)->isToday();
        });

        // remainingDevotions = sisa renungan selain yg hari ini utk history renungan
        if ($featuredDevotion) {
            $remainingDevotions = $devotions->reject(function ($devotion) use ($featuredDevotion) {
                return $devotion->id === $featuredDevotion->id;
            });
        } else {
            $remainingDevotions = $devotions;
        }

        $groupedDevotions = $remainingDevotions->groupBy('month_year');

        return view('devotion.index', compact('devotions', 'featuredDevotion', 'groupedDevotions', 'devotionCategories', 'selectedCategory'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Carbon::setLocale('id');

        $devotion = Devotion::findOrFail($id);
        $devotion->date = Carbon::parse($devotion->date, 'Asia/Jakarta')->translatedFormat('j F Y');

        return view('devotion.show', compact('devotion'));
    }
}
