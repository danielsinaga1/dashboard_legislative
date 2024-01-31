<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;
use Notification;
use App\IncidentReport;
use App\Notifications\IncidentReport\ReminderExecutor;
use App\Notifications\IncidentReport\ReminderManagerExecutor;

class ReminderEmailExecutors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminder-executors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder Email Executors';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $incidentReports = IncidentReport::whereNotNull('acknowledged_by_id')->get();

        foreach($incidentReports as $incidentReport){
            $now = Carbon::now();
            $timesAssigned = $incidentReport->assigned_at;
            $timesApprovedFully = $incidentReport->acknowledged_at;
            

            // $dateAssigned = strtotime($timesAssigned);  
            // $dateApprovedFully = strtotime($timesApprovedFully);  
            // $dateNow = strtotime($now);  


            $dateAssigned =  date('Y-m-d H:i:s', strtotime(str_replace('-','/', $timesAssigned)));
            $dateApprovedFully = date('Y-m-d H:i:s', strtotime(str_replace('-','/', $timesApprovedFully)));
            $dateNow = date('Y-m-d H:i:s', strtotime(str_replace('-','/', $now)));


            $parseDateNow = Carbon::parse($dateNow);

            $parseDateAssigned = Carbon::parse($dateAssigned);

            $parseDateApprovedFully = Carbon::parse($dateApprovedFully);
   
        //    $date_diff= $datedateNow->diffInDays($arseDateAssigned);

            $hoursAssigned = $parseDateNow->diffInDays($parseDateAssigned);

            $hoursApprovedFully = $parseDateNow->diffInDays($parseDateApprovedFully);
           

            // $hoursAssigned = floor(abs($dateNow - $dateAssigned) / (60 * 60));
            
            // $hoursApprovedFully = floor(abs($dateNow - $dateApprovedFully) / (60 * 60)); 




            
            $search = 'Manager';   
            $managers = DB::table('users')
            ->join('incident_reports','users.dept_id','=','incident_reports.dept_designated_id')
            ->join('job_titles','users.job_id','=','job_titles.id')
            ->where('job_titles.name','LIKE','%'. $search . '%') 
            ->where('incident_reports.id',$incidentReport->id)
            ->select('users.*')->get();

            $action_bys = DB::table('users')
            ->join('incident_reports','incident_reports.action_by_id','users.id')
            ->where('incident_reports.id',$incidentReport->id)
            ->select('users.*')->get();



            foreach($managers as $manager){ 
                
                //Untuk Manager Executor dengan klasifikasi Insignificant
                if($incidentReport->classify_id == 1 && $hoursApprovedFully > 24 && $incidentReport->action_by_id == NULL){
                    
                    Notification::route('mail',$manager->email)->notify(new ReminderManagerExecutor($incidentReport, $manager->name, $timesApprovedFully)); 
                    
                }
                //Untuk Executor dengan klasifikasi Insignificant
                elseif($incidentReport->classify_id == 1 && $hoursAssigned > 24 && $incidentReport->result_id == 5){
                    foreach($action_bys as $action_by){
                        Notification::route('mail',$action_by->email)->notify(new ReminderExecutor($incidentReport, $action_by->name, $timesAssigned)); 
                    }
                    
                }
                //Untuk Manager Executor dengan klasifikasi Minor
                elseif($incidentReport->classify_id == 2 && $hoursApprovedFully > 12 && $incidentReport->action_by_id == NULL){
                    Notification::route('mail',$manager->email)->notify(new ReminderManagerExecutor($incidentReport, $manager->name, $timesApprovedFully)); 
                }
                //Untuk Executor dengan klasifikasi Minor
                elseif($incidentReport->classify_id == 2 && $hoursAssigned > 12 && $incidentReport->result_id == 5){
                    foreach($action_bys as $action_by){         
                        Notification::route('mail',$action_by->email)->notify(new ReminderExecutor($incidentReport, $action_by->name, $timesAssigned)); 
                    }
                }
                 //Untuk Manager Executor dengan klasifikasi Moderate
                 elseif($incidentReport->classify_id == 3 && $hoursApprovedFully > 12 && $incidentReport->action_by_id == NULL){
                    Notification::route('mail',$manager->email)->notify(new ReminderManagerExecutor($incidentReport, $manager->name, $timesApprovedFully)); 
                }
                //Untuk Executor dengan klasifikasi Moderate
                elseif($incidentReport->classify_id == 3 && $hoursAssigned > 12 && $incidentReport->result_id == 5){
                    foreach($action_bys as $action_by){         
                        Notification::route('mail',$action_by->email)->notify(new ReminderExecutor($incidentReport, $action_by->name, $timesAssigned)); 
                    }
                }
                 //Untuk Manager Executor dengan klasifikasi Major
                 elseif($incidentReport->classify_id == 4 && $hoursApprovedFully > 6 && $incidentReport->action_by_id == NULL){
                    Notification::route('mail',$manager->email)->notify(new ReminderManagerExecutor($incidentReport, $manager->name, $timesApprovedFully)); 
                }
                //Untuk Executor dengan klasifikasi Major
                elseif($incidentReport->classify_id == 4 && $hoursAssigned > 6 && $incidentReport->result_id == 5){
                    foreach($action_bys as $action_by){         
                        Notification::route('mail',$action_by->email)->notify(new ReminderExecutor($incidentReport, $action_by->name, $timesAssigned)); 
                    }
                }
                //Untuk Manager Executor dengan klasifikasi Catastrophic
                elseif($incidentReport->classify_id == 5 && $hoursApprovedFully > 1 && $incidentReport->action_by_id == NULL){
                    Notification::route('mail',$manager->email)->notify(new ReminderManagerExecutor($incidentReport, $manager->name, $timesApprovedFully)); 
                }
                //Untuk Executor dengan klasifikasi Catastrophic
                elseif($incidentReport->classify_id == 5 && $hoursAssigned > 1 && $incidentReport->result_id == 5){
                    foreach($action_bys as $action_by){         
                        Notification::route('mail',$action_by->email)->notify(new ReminderExecutor($incidentReport, $action_by->name, $timesAssigned)); 
                    }
                }
                
            }
    
        }
    }
}
