<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Member;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function visionMission()
    {
        $abouts = About::all();
        
        return view('about_us.vision_mission', compact('abouts'));
    }

    public function assemblyStructure()
    {
        $members = Member::whereIn('status', [1, 2, 3, 4, 5])->get();

        $memberStatus = [
            1 => 'Koordinator Hamba Tuhan',
            2 => 'Pendeta',
            3 => 'Penginjil',
            4 => 'Penatua',
            5 => 'Diaken',
            6 => 'Jemaat Biasa',
        ];

        foreach($members as $member) {
            $member->memberStatus = $memberStatus[$member->status];
        }

        return view('about_us.assembly_structure', compact('members'));
    }
}
