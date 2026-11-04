<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Member;
use App\Models\Region;
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
        $abouts = About::all();
        
        $members = Member::whereIn('status', [1, 2])->get();

        $memberStatus = [
            1 => 'Pendeta',
            2 => 'Penatua'
        ];

        foreach($members as $member) {
            $member->memberStatus = $memberStatus[$member->status];
        }

        return view('about_us.assembly_structure', compact('members', 'abouts'));
    }

    public function region()
    {
        $regions = Region::all();

        return view('about_us.region', compact('regions'));
    }

    public function church_theme()
    {
        $abouts = About::all();

        return view('about_us.church_theme', compact('abouts'));
    }
}
