<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use DB;
use Notification;
use App\IncidentReport;
use App\Notifications\IncidentReport\ReminderInitiatorSuperintendent;
use App\Notifications\IncidentReport\ReminderInitiatorManager;
use Illuminate\Console\Command;

class ReminderEmailInitiators extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminder-initiators';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder Email Initiators';

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
        $incidentReports = IncidentReport::all();
        $now = Carbon::now();
        
        foreach($incidentReports as $incidentReport){
            $timesCreated = $incidentReport->created_at;
            $timesReviewed = $incidentReport->reviewed_at;

            
            // $dateNow = strtotime($now);  
            // $dateCreated = strtotime($timesCreated);  
            // $dateReviewed = strtotime($timesReviewed);  
            
             
            $dateCreated =  date('Y-m-d H:i:s', strtotime(str_replace('-','/', $timesCreated)));
            $dateReviewed = date('Y-m-d H:i:s', strtotime(str_replace('-','/', $timesReviewed)));
            $dateNow = date('Y-m-d H:i:s', strtotime(str_replace('-','/', $now)));


            $parseDateNow = Carbon::parse($dateNow);
            $parseDateCreated = Carbon::parse($dateCreated);
            $parseDateReviewed = Carbon::parse($dateReviewed);
   
            $hoursCreated = $parseDateNow->diffInHours($parseDateCreated);
            $hoursReviewed = $parseDateNow->diffInHours($parseDateReviewed);
            // $initiators = DB::table('users')
            //     ->join('incident_reports','incident_reports.nama_pelapor_id','users.id')
            //     ->join('users as level1','level1.id','users.parent_id')
            //     ->join('users as level2','level2.id','level1.parent_id')
            //     ->where('incident_reports.id',$incidentReport->id)
            //     ->select('users.*','level1.name as superior','users.name as username','level2.name as manager','level1.email as sup_email','level2.email as mngr_email')->get();


            
                $initiators = DB::table('users')
                ->join('incident_reports','incident_reports.nama_pelapor_id','users.id')
                ->join('role_user','role_user.user_id','users.id')
                ->join('roles','role_user.role_id','roles.id')
                ->join('users as level1','level1.id','users.parent_id')
                ->join('users as level2','level2.id','level1.parent_id')
                ->where('incident_reports.id',$incidentReport->id)
                ->select('users.*','level1.name as superior','users.name as username','level2.name as manager','level1.email as sup_email','level2.email as mngr_email','roles.id as role_id')->get();

            // $checkRoleUsers = DB::table('users')
            //     ->join('incident_reports','incident_reports.nama_pelapor_id','users.id')
            //     ->join('role_user','role_user.user_id','users.id')
            //     ->join('roles','role_user.role_id','roles.id')
            //     ->join('users as level1','level1.id','users.parent_id')
            //     ->where('incident_reports.id',$incidentReport->id)
            //     ->select('users.name','level1.name as superior','role.id as role_id')
            //     ->get();

            
            // $hoursCreated = floor(abs($dateNow - $dateCreated) / (60 * 60)); 
            // $hoursReviewed = floor(abs($dateNow - $dateReviewed) / (60 * 60)); 

            //Untuk Superintendent dengan klasifikasi Insignificant
            if($incidentReport->classify_id == 1 && $hoursCreated > 24 && $incidentReport->result_id == 4){
                foreach($initiators as $initiator){
                    if($incidentReport->ri_id == 2){
                        $usersUtilitySuperintendents = DB::table('users')->where('npk', 1102251)->select('users.*')->get();
                        foreach($usersUtilitySuperintendents as $usersUtilitySuperintendent){
                            $superintendentName = $usersUtilitySuperintendent->name;
                            $superintendentMail = $usersUtilitySuperintendent->email;

                            Notification::route('mail',$superintendentMail)->notify(new ReminderInitiatorSuperintendent($incidentReport, $superintendentName, $timesCreated)); 
                        }
                    }else{
                        $superintendentName = $initiator->superior;
                        $superintendentMail = $initiator->sup_email;
                        
                        Notification::route('mail',$superintendentMail)->notify(new ReminderInitiatorSuperintendent($incidentReport, $superintendentName, $timesCreated)); 
                   }
                }
            }
            //Untuk Superintendent dengan klasifikasi Minor
            elseif($incidentReport->classify_id == 2 && $hoursCreated > 12 && $incidentReport->result_id == 4){
                foreach($initiators as $initiator){
                    if($incidentReport->ri_id == 2){
                        $usersUtilitySuperintendents = DB::table('users')->where('npk', 1102251)->select('users.*')->get();
                        foreach($usersUtilitySuperintendents as $usersUtilitySuperintendent){
                            $superintendentName = $usersUtilitySuperintendent->name;
                            $superintendentMail = $usersUtilitySuperintendent->email;

                            Notification::route('mail',$superintendentMail)->notify(new ReminderInitiatorSuperintendent($incidentReport, $superintendentName, $timesCreated)); 
                        }
                    }else{
                        $superintendentName = $initiator->superior;
                        $superintendentMail = $initiator->sup_email;

                        Notification::route('mail',$superintendentMail)->notify(new ReminderInitiatorSuperintendent($incidentReport, $superintendentName, $timesCreated)); 
                   }

                }      
                    
            } 
            //Untuk Superintendent dengan klasifikasi Moderate
            elseif($incidentReport->classify_id == 3 && $hoursCreated > 6 && $incidentReport->result_id == 4){
                foreach($initiators as $initiator){
                    if($incidentReport->ri_id == 2){
                        $usersUtilitySuperintendents = DB::table('users')->where('npk', 1102251)->select('users.*')->get();
                        foreach($usersUtilitySuperintendents as $usersUtilitySuperintendent){
                            $superintendentName = $usersUtilitySuperintendent->name;
                            $superintendentMail = $usersUtilitySuperintendent->email;
                            
                            Notification::route('mail',$superintendentMail)->notify(new ReminderInitiatorSuperintendent($incidentReport, $superintendentName, $timesCreated)); 
                        }
                    }else{
                        $superintendentName = $initiator->superior;
                        $superintendentMail = $initiator->sup_email;
                        
                        Notification::route('mail',$superintendentMail)->notify(new ReminderInitiatorSuperintendent($incidentReport, $superintendentName, $timesCreated)); 
                   }

                }      
            } 
            //Untuk Superintendent dengan klasifikasi Major
            elseif($incidentReport->classify_id == 4 && $hoursCreated > 2 && $incidentReport->result_id == 4){
                foreach($initiators as $initiator){
                    if($incidentReport->ri_id == 2){
                        $usersUtilitySuperintendents = DB::table('users')->where('npk', 1102251)->select('users.*')->get();
                        foreach($usersUtilitySuperintendents as $usersUtilitySuperintendent){
                            $superintendentName = $usersUtilitySuperintendent->name;
                            $superintendentMail = $usersUtilitySuperintendent->email;
                            
                            Notification::route('mail',$superintendentMail)->notify(new ReminderInitiatorSuperintendent($incidentReport, $superintendentName, $timesCreated)); 
                        }
                    }else{
                        $superintendentName = $initiator->superior;
                        $superintendentMail = $initiator->sup_email;

                        Notification::route('mail',$superintendentMail)->notify(new ReminderInitiatorSuperintendent($incidentReport, $superintendentName, $timesCreated)); 
                   }

                }      
            } 
            //Untuk Superintendent dengan klasifikasi Catastrophic
            elseif($incidentReport->classify_id == 5 && $hoursCreated > 1 && $incidentReport->result_id == 4){
                foreach($initiators as $initiator){
                    if($incidentReport->ri_id == 2){
                        $usersUtilitySuperintendents = DB::table('users')->where('npk', 1102251)->select('users.*')->get();
                        foreach($usersUtilitySuperintendents as $usersUtilitySuperintendent){
                            $superintendentName = $usersUtilitySuperintendent->name;
                            $superintendentMail = $usersUtilitySuperintendent->email;
                            
                            Notification::route('mail',$superintendentMail)->notify(new ReminderInitiatorSuperintendent($incidentReport, $superintendentName, $timesCreated)); 
                        }
                    }else{
                        $superintendentName = $initiator->superior;
                        $superintendentMail = $initiator->sup_email;
                        
                        Notification::route('mail',$superintendentMail)->notify(new ReminderInitiatorSuperintendent($incidentReport, $superintendentName, $timesCreated)); 
                   }

                }      
            } 
            //Untuk Manager dengan klasifikasi Insignificant     
            elseif($incidentReport->classify_id == 1 && $hoursReviewed > 24 && $incidentReport->result_id == 1){
                foreach($initiators as $initiator){
                    $checkRoleUser = $initiator->role_id;

                    if($checkRoleUser == 4){
 
                        $managerName = $initiator->superior;
                        $managerMail = $initiator->sup_email;

                        Notification::route('mail',$managerMail)->notify(new ReminderInitiatorManager($incidentReport, $managerName, $timesReviewed));
                    }else{
                        $managerName = $initiator->manager;
                        $managerMail = $initiator->mngr_email;
    
                        Notification::route('mail',$managerMail)->notify(new ReminderInitiatorManager($incidentReport, $managerName, $timesReviewed));
                    }
                   
                }   
            }
            //Untuk Manager dengan klasifikasi Minor
            elseif($incidentReport->classify_id == 2 && $hoursReviewed > 12 && $incidentReport->result_id == 1){
                foreach($initiators as $initiator){
                    $checkRoleUser = $initiator->role_id;

                    if($checkRoleUser == 4){
 
                        $managerName = $initiator->superior;
                        $managerMail = $initiator->sup_email;
                        
                        Notification::route('mail',$managerMail)->notify(new ReminderInitiatorManager($incidentReport, $managerName, $timesReviewed));
                    }else{
                        $managerName = $initiator->manager;
                        $managerMail = $initiator->mngr_email;
    
                        Notification::route('mail',$managerMail)->notify(new ReminderInitiatorManager($incidentReport, $managerName, $timesReviewed));
                    }
                    
                }   
            }
             //Untuk Manager dengan klasifikasi Moderate
             elseif($incidentReport->classify_id == 3 && $hoursReviewed > 6 && $incidentReport->result_id == 1){
                foreach($initiators as $initiator){
                    $checkRoleUser = $initiator->role_id;

                    //Superintendent
                    if($checkRoleUser == 4){

                        $managerName = $initiator->superior;
                        $managerMail = $initiator->sup_email;

                        Notification::route('mail',$managerMail)->notify(new ReminderInitiatorManager($incidentReport, $managerName, $timesReviewed));
                    }else{
                        $managerName = $initiator->manager;
                        $managerMail = $initiator->mngr_email;
    
                        Notification::route('mail',$managerMail)->notify(new ReminderInitiatorManager($incidentReport, $managerName, $timesReviewed));
                    }      
                }   
            }
            //Untuk Manager dengan klasifikasi Major
            elseif($incidentReport->classify_id == 4 && $hoursReviewed > 2 && $incidentReport->result_id == 1){
                foreach($initiators as $initiator){
                    $checkRoleUser = $initiator->role_id;
                    
                    if($checkRoleUser == 4 || $checkRoleUser == 3 || $checkRoleUser){

                        $managerName = $initiator->superior;
                        $managerMail = $initiator->sup_email;

                        Notification::route('mail',$managerMail)->notify(new ReminderInitiatorManager($incidentReport, $managerName, $timesReviewed));
                    }else{

                        $managerName = $initiator->manager;
                        $managerMail = $initiator->mngr_email;
    
                        Notification::route('mail',$managerMail)->notify(new ReminderInitiatorManager($incidentReport, $managerName, $timesReviewed));
                    }
                    
                }   
            }
            //Untuk Manager dengan klasifikasi Catastrophic
            elseif($incidentReport->classify_id == 5 && $hoursReviewed > 1 && $incidentReport->result_id == 1){
                foreach($initiators as $initiator){
                    $checkSuperintendent = $initiator->role_id;

                    if($checkSuperintendent == 4){

                        $managerName = $initiator->superior;
                        $managerMail = $initiator->sup_email;

                        Notification::route('mail',$managerMail)->notify(new ReminderInitiatorManager($incidentReport, $managerName, $timesReviewed));
                    }else{
                        $managerName = $initiator->manager;
                        $managerMail = $initiator->mngr_email;
    
                        Notification::route('mail',$managerMail)->notify(new ReminderInitiatorManager($incidentReport, $managerName, $timesReviewed));
                    }

                    
                }   
            }
            
        }
    }
}
