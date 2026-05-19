<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Worship;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SundayServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Carbon::setLocale('id');

        $thisSunday = Carbon::today()->copy()->endOfWeek(Carbon::SUNDAY);
        $nextSunday = $thisSunday->copy()->addWeek();

        $dates = [
            $thisSunday->toDateString(),
            $nextSunday->toDateString()
        ];

        $worships = Worship::with([
            'liturgical_calendars',
            'preachers',
            'sunday_services.members',
            'sunday_services.stewards'
        ])->whereIn('date', $dates)->get()->groupBy('category');

        $commissions = Commission::pluck('name', 'id');

        $getWeek = function ($category) use ($worships, $thisSunday, $nextSunday) {
            $data = $worships[$category] ?? collect();
            return [
                'week1' => $data->firstWhere('date', $thisSunday->toDateString()),
                'week2' => $data->firstWhere('date', $nextSunday->toDateString()),
            ];
        };

        $categories = collect();

        $categories->push([
            'label' => 'Kebaktian Umum',
            'data' => $getWeek(0)
        ]);

        foreach ($commissions as $id => $name) {
            $categories->push([
                'label' => $name,
                'data' => $getWeek($id)
            ]);
        }

        // Filter hanya yg punya datanya
        $categories = $categories->filter(function ($category) {
            return $category['data']['week1'] || $category['data']['week2'];
        })->values();

        $formatDate = function ($date) {
            return $date ? Carbon::parse($date)->translatedFormat('d F Y') : '-';
        };

        // Ambil smua data pelayanan
        $getAllServices = function ($week) {
            if (!$week) return collect();
            return collect($week->sunday_services)
                ->filter(fn($s) => $s->worships_id === $week->id)
                ->sortBy('id')
                ->groupBy(fn($s) => $s->stewards?->field)
                ->map(function ($items, $field) {
                    return [
                        'field' => $field,
                        'names' => $items->pluck('members.name')->implode(', ')
                    ];
                })->sortBy('field');
            };

        return view('sunday_service.index', compact('categories', 'formatDate', 'getAllServices'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
