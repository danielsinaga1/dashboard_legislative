<?php

namespace App;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'users';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];

    protected $fillable = [
        'npk',
        'name',
        'email',
        'job_id',
        'dept_id',
        'parent_id',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
        'email_verified_at',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function getIsAdministratorAttribute() {
        return $this->roles()->where('id', 8)->exists();
    }
    public function getIsSuperAdministratorAttribute() {
        return $this->roles()->where('id', 3)->exists();
    }

    public function getIsSupervisorAttribute() {
        return $this->roles()->where('id', 4)->exists();
    }

    public function getIsSuperintendentAttribute() {
        return $this->roles()->where('id', 4)->exists();
    }

    public function getIsManagerAttribute() {
        return $this->roles()->where('id', 5)->exists();
    }

    public function getIsGeneralManagerAttribute() {
        return $this->roles()->where('id', 6)->exists();
    }

    public function getIsInitiatorAttribute() {
        return $this->roles()->where('id', 7)->exists();
    }


    public function getIsAdministrator2Attribute() {
        return $this->roles()->where('id', 10)->exists();
    }
    public function senderIncidentReportNotifications(){
        return $this->hasMany(IncidentReportNotification::class, 'sender_id', 'id');
    }

    public function receiverIncidentReportNotifications(){
        return $this->hasMany(IncidentReportNotification::class, 'receiver_id', 'id');
    }
    public function namaPelaporIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'nama_pelapor_id', 'id');
    }

    public function reviewedByIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'reviewed_by_id', 'id');
    }

    public function acknowledgedByIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'acknowledged_by_id', 'id');
    }

    public function actionByIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'action_by_id', 'id');
    }

    public function assignedToAssets()
    {
        return $this->hasMany(Asset::class, 'assigned_to_id', 'id');
    }

    public function assignedUserAssetsHistories()
    {
        return $this->hasMany(AssetsHistory::class, 'assigned_user_id', 'id');
    }

    public function picinvest()
    {
        return $this->hasMany(InvestigationDetail::class, 'pic_id', 'id');
    }

    public function auditlogs(){
        return $this->hasMany(AuditLog::class, 'user_id', 'id');
   }

    public function userUserAlerts()
    {
        return $this->belongsToMany(UserAlert::class);
    }

    public function userIncidentReports()
    {
        return $this->belongsToMany(IncidentReport::class);
    }

    public function userIncidentReports1()
    {
        return $this->belongsToMany(IncidentReport::class)->wherePivot('user_id',auth()->user()->id);
    }

   public function parent()
   {
       return $this->belongsTo(User::class, 'parent_id');
   }

   public function roles()
   {
       return $this->belongsToMany(Role::class);
   }

   public function job()
   {
       return $this->belongsTo(JobTitle::class, 'job_id');
   }

   public function dept()
   {
       return $this->belongsTo(OriginDepartment::class, 'dept_id');
   }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }





}
