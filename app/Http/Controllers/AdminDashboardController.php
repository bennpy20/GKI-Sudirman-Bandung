<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Commission;
use App\Models\Devotion;
use App\Models\Member;
use App\Models\Region;
use App\Models\Worship;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Carbon::setLocale('id');

        $date_now = Carbon::now('Asia/Jakarta')->isoFormat('dddd, D MMMM Y');

        $members = Member::all();

        $regions = Region::all();

        $commissions = Commission::all();

        $commission_names = $commissions->pluck('name', 'id');

        $week_start = Carbon::now('Asia/Jakarta')->startOfDay();
        $week_end = Carbon::now('Asia/Jakarta')->addWeeks(2)->endOfDay();

        $worships = Worship::with([
            'liturgical_calendars',
            'preachers',
            'sunday_services'
        ])
        ->whereBetween('date', [$week_start, $week_end])
        ->orderBy('date', 'asc')
        ->get();

        foreach($worships as $worship) {
            $worship->formatted_day = Carbon::parse($worship->date, 'Asia/Jakarta')->translatedFormat('l');
            $worship->formatted_day_num = Carbon::parse($worship->date, 'Asia/Jakarta')->translatedFormat('j');
            $worship->formatted_month_year = Carbon::parse($worship->date, 'Asia/Jakarta')->translatedFormat('F Y');
            $worship->formatted_time = Carbon::parse($worship->time, 'Asia/Jakarta')->format('H:i');

            if ($worship->category == 0) {
                $worship->category_label = 'Kebaktian Umum';
            } else {
                $worship->category_label = ('Ibadah ' . $commission_names[$worship->category]) ?? '-';
            }
        }

        $announcements = Announcement::whereDate('date_start', '<=', Carbon::today('Asia/Jakarta'))
            ->whereDate('date_end', '>=', Carbon::today('Asia/Jakarta'))
            ->orderBy('date_end', 'asc')
            ->limit(3)
            ->get();
        
        $announcementCategory = [
            1 => 'Diakonia',
            2 => 'Persekutuan dan Keesaan',
            3 => 'Pembinaan',
            4 => 'Sarana Penunjang',
        ];
        
        foreach ($announcements as $announcement) {
            $announcement->date_start = Carbon::parse($announcement->date_start, 'Asia/Jakarta')->translatedFormat('j F Y');
            $announcement->date_end = Carbon::parse($announcement->date_end, 'Asia/Jakarta')->translatedFormat('j F Y');
            $announcement->category = $announcementCategory[$announcement->category];
        }

        $today = Carbon::today('Asia/Jakarta');

        $devotions = Devotion::whereDate('date', $today)
            ->orderBy('category', 'asc') // optional biar urut
            ->get();
        
        $devotionCategory = [
            1 => 'Umum',
            2 => 'Remaja/Pemuda',
            3 => 'Anak Sekolah Minggu',
            4 => 'Usia Indah',
        ];

        foreach ($devotions as $devotion) {
            $devotion->devotionCategory = $devotionCategory[$devotion->category] ?? '-';
        }

        return view('admin.index', compact('date_now', 'members', 'regions', 'commissions', 'worships', 'announcements', 'devotions'));
    }
}
