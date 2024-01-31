<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentReportNotification extends Model
{
    public $table = 'ir_notifications';

    protected $fillable = [
        'incident_id',
        'sender_id',
        'receiver_id',
        'content',
        'read',
    ];

    protected $dates = [
        'read_at',
        'sent_at',
    ];

    public function notificationIncidentReports()
    {
        return $this->belongsTo(IncidentReport::class);
    }

    public function sender()
    {
        return $this->hasOne(User::class, 'id', 'sender_id')->withTrashed();
    }
    
    public function receiver(){
        return $this->hasOne(User::class, 'id', 'receiver_id')->withTrashed();
    }

    public static function unreadCount()
    {
        $incidentReportNotifications = IncidentReportNotification::where(function ($query) {
            $query
                ->where('sender_id', auth()->user()->id)
                ->orWhere('receiver_id', auth()->user()->id);
        })
            ->orderBy('created_at', 'DESC')
            ->get();

        $unreadCount = 0;
    
                foreach($incidentReportNotifications as $incidentReportNotification){
                    if ($incidentReportNotification->sender_id !== auth()->user()->id && $incidentReportNotification->read_at === null) {
                        $unreadCount++;
                    }
                }
               
        return $unreadCount;
    }

}
