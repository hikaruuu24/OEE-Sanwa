<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:dashboard', ['only' => 'dashboard']);
    }

    public function dashboard()
    {
        $data['page_title'] = 'Dashboard';
        $data['breadcrumb'] = 'Dashboard';

        return view('dashboard.index', $data);
    }

    public function machineOverview()
    {
        $data['page_title'] = 'Machine Overview';
        $data['breadcrumb'] = 'Machine Overview > Machine#1';

        return view('machine-overview.index', $data);
    }

    public function machineAnalysis()
    {
        $data['page_title'] = 'Machine Analysis';
        $data['breadcrumb'] = 'Machine Analysis > Machine#1';

        return view('machine-analysis.index', $data);
    }

    public function breakdownAnalysis()
    {
        $data['page_title'] = 'Breakdown Analysis';
        $data['breadcrumb'] = 'Breakdown Analysis ';

        return view('breakdown-analysis.index', $data);
    }


}
