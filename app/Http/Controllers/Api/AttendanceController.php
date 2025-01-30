<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    //checkin
    public function checkin(Request $request)
    {
        //validate lat and long
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);


        //save new attendance
        $attendance = new Attendance();
        $attendance->user_id = $request->user()->id;
        $attendance->date =date('Y-m-d');
        $attendance->time = date('H:i:s');
        $attendance->latlon_in = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return response([
            'message' => 'Checkin successful',
            'attendance' => $attendance
    ], 200);
    }
}
