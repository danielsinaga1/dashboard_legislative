<?php

namespace App\Http\Controllers\Admin;

use App\CategoryIncident;
use App\ClassificationDetail;
use App\DesignationDepartment;
use App\IncidentReport;
use App\IncidentReportNotification;
use App\OriginDepartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {

        return view('home');
    }

}
