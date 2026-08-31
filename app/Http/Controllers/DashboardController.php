<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index(){
        $startDate = Carbon::now()->subMonth()->startOfDay(); // Start of the day one month ago
        $endDate = Carbon::now()->startOfDay();
    // dd($startDate,$endDate);

    $appointments = DB::table('old_appointments')
                        ->whereBetween('appointment_date', [$startDate, $endDate])
                        ->get();

    $totalAppointments = DB::table('old_appointments')
                        ->whereBetween('appointment_date', [$startDate, $endDate])
                        ->count(); 

    $appointmentCounts = DB::table('old_appointments')
                            ->join('departments', 'old_appointments.department_id', '=', 'departments.id')
                            ->select('departments.name', DB::raw('COUNT(*) as total'))
                            ->whereBetween('appointment_date', [$startDate, $endDate])
                            ->groupBy('departments.name')
                            ->pluck('total', 'departments.name');

    // Pass the appointment data and counts to the dashboard
    return view('dashboard', ['appointments' => $appointments, 'appointmentCounts' => $appointmentCounts, 'totalAppointments' => $totalAppointments]);
}
}
