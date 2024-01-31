<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MassDestroyIncidentReportNotificationRequest;
use App\Http\Requests\StoreIncidentReportNotificationRequest;
use App\Http\Requests\UpdateIncidentReportNotificationRequest;
use App\IncidentReport;
use App\IncidentReportNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncidentReportNotificationController extends Controller
{
    
    public function index()
    {
        abort_if(Gate::denies('ir_notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidentReportNotifications = IncidentReportNotification::all();

        return view('admin.incidentReportNotifications.index', compact('incidentReportNotifications'));
    }

    // public function create()
    // {
    //     abort_if(Gate::denies('ir_notification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $users = User::all()->pluck('name', 'id');

    //     return view('admin.userAlerts.create', compact('users'));
    // }

    // public function store(StoreUserAlertRequest $request)
    // {
    //     $userAlert = UserAlert::create($request->all());
    //     $userAlert->users()->sync($request->input('users', []));

    //     return redirect()->route('admin.user-alerts.index');
    // }

    public function show(IncidentReportNotification $incidentReportNotification)
    {
        abort_if(Gate::denies('ir_notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidentReportNotification->load('users');

        return view('admin.incidentReportNotifications.show', compact('incidentReportNotification'));
    }

    public function destroy(IncidentReportNotification $incidentReportNotification)
    {
        abort_if(Gate::denies('ir_notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidentReportNotification->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserAlertRequest $request)
    {
        IncidentReportNotification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function read(Request $request)
    {
        $alerts = IncidentReportNotification::where('read', false)->get();

        foreach ($alerts as $alert) {
            $pivot       = $alert->pivot;
            $pivot->read = true;
            $pivot->save();
        }
    }
    
    public function unreadNotifications(): array{
        $incidentReports = IncidentReport::where(function($query){
            $query->where('nama_pelapor_id',auth()->user()->id);
        })->with('notifications')->orderBy('created_at','DESC')->get();

        $UnreadCount = 0;

        foreach($incidentReports as $incidentReport){
            foreach($incidentReport->notifications as $notification){
                if($notification->sender_id !== auth()->user()->id && $notification->read_at === null){
                    if($incidentReport->nama_pelapor_id !== auth()->user()->id){
                        $UnreadCount++;
                    }
                }
            }
        }

        return ['readCount' => $UnreadCount];
        
    }

//     public function checkAccessRights(IncidentReportNotification $incidentReportNotification){
//         $authId = auth()->user()->id;
//  foreach ($topic->messages as $message) {
//             if ($message->sender_id !== Auth::id() && $message->read_at === null) {
//                 $message->read_at = Carbon::now();
//                 $message->save();
//             }
//         }
//         if($incidentReportNotification->sender_id !== $authId && $incidentReportNotification->receiver_id !== $authId){
//             return abort(401);
//         }
//     }

    public function checkAccessRights(IncidentReport $incidentReports){
        $authId = auth()->user()->id;

        foreach ($incidentReports as $incidentReport) {
            foreach ($incidentReport->notifications as $notification) {
                if ($notification->sender_id !==  $authId && 
                $notification->receiver_id !== $authId) {
                    return abort(401);
                }
            }
        }

    }

    public function showNotifications(IncidentReport $incidentReport){

        $this->checkAccessRights($incidentReport);

        foreach ($incidentReport->notifications as $notification) {
            if ($notification->sender_id !== Auth::id() && $notification->read_at === null) {
                $notification->read_at = Carbon::now();
                $notification->save();
            }
        }
        
        $unreads = $this->unreadNotifications();

        return view('admin.incidentReportNotifications.index',compact('incidentReport','unreads'));
    }

    


}
