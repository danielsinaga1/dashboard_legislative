<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'irms', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::get('incident-reports/read', 'IncidentReportController@read');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Results
    Route::delete('results/destroy', 'ResultController@massDestroy')->name('results.massDestroy');
    Route::resource('results', 'ResultController');

    // Root Causes
    Route::delete('root-causes/destroy', 'RootCauseController@massDestroy')->name('root-causes.massDestroy');
    Route::resource('root-causes', 'RootCauseController');

    // Category Incidents
    Route::delete('category-incidents/destroy', 'CategoryIncidentController@massDestroy')->name('category-incidents.massDestroy');
    Route::resource('category-incidents', 'CategoryIncidentController');

    // Chemical Releases
    Route::delete('chemical-releases/destroy', 'ChemicalReleaseController@massDestroy')->name('chemical-releases.massDestroy');
    Route::resource('chemical-releases', 'ChemicalReleaseController');

    // Precortive
    Route::delete('precortives/destroy', 'PrecortiveController@massDestroy')->name('precortives.massDestroy');
    Route::resource('precortives', 'PrecortiveController');

     // Area Incidents
     Route::delete('area-incidents/destroy', 'AreaIncidentController@massDestroy')->name('area-incidents.massDestroy');
     Route::resource('area-incidents', 'AreaIncidentController');

      // Region Incidents
      Route::delete('region-incidents/destroy', 'RegionIncidentController@massDestroy')->name('region-incidents.massDestroy');
      Route::resource('region-incidents', 'RegionIncidentController');

     // Area Users
     Route::delete('area-users/destroy', 'AreaUserController@massDestroy')->name('area-users.massDestroy');
     Route::resource('area-users', 'AreaUserController');

    // Classification Incidents
    Route::delete('classification-incidents/destroy', 'ClassificationIncidentController@massDestroy')->name('classification-incidents.massDestroy');
    Route::resource('classification-incidents', 'ClassificationIncidentController');

    // Classification Incidents
    Route::get('investigation-details/{investigation_detail}/actionByExecutor',  'InvestigationDetailController@actionByExecutor')->name('investigation-details.actionByExecutor');
    Route::delete('investigation-details/destroy', 'InvestigationDetailController@massDestroy')->name('investigation-details.massDestroy');
    Route::resource('investigation-details', 'InvestigationDetailController');

    // Classification Details
    Route::delete('classification-details/destroy', 'ClassificationDetailController@massDestroy')->name('classification-details.massDestroy');
    Route::post('classification-details/media', 'ClassificationDetailController@storeMedia')->name('classification-details.storeMedia');
    Route::post('classification-details/ckmedia', 'ClassificationDetailController@storeCKEditorImages')->name('classification-details.storeCKEditorImages');
    Route::resource('classification-details', 'ClassificationDetailController');

    // Designation Departments
    Route::delete('designation-departments/destroy', 'DesignationDepartmentController@massDestroy')->name('designation-departments.massDestroy');
    Route::resource('designation-departments', 'DesignationDepartmentController');

    // Origin Departments
    Route::delete('origin-departments/destroy', 'OriginDepartmentController@massDestroy')->name('origin-departments.massDestroy');
    Route::resource('origin-departments', 'OriginDepartmentController');

    // Job Titles
    Route::delete('job-titles/destroy', 'JobTitleController@massDestroy')->name('job-titles.massDestroy');
    Route::resource('job-titles', 'JobTitleController');

    // Incident Reports
    Route::delete('incident-reports/destroy', 'IncidentReportController@massDestroy')->name('incident-reports.massDestroy');
    Route::post('incident-reports/media', 'IncidentReportController@storeMedia')->name('incident-reports.storeMedia');
    Route::post('incident-reports/ckmedia', 'IncidentReportController@storeCKEditorImages')->name('incident-reports.storeCKEditorImages');
    Route::post('incident-reports/parse-csv-import', 'IncidentReportController@parseCsvImport')->name('incident-reports.parseCsvImport');
    Route::post('incident-reports/process-csv-import', 'IncidentReportController@processCsvImport')->name('incident-reports.processCsvImport');
    Route::resource('incident-reports', 'IncidentReportController');


// My Incident Reports
Route::delete('my-incident-reports/destroy', 'MyIncidentReportController@massDestroy')->name('my-incident-reports.massDestroy');
Route::post('my-incident-reports/media', 'MyIncidentReportController@storeMedia')->name('my-incident-reports.storeMedia');
Route::post('my-incident-reports/ckmedia', 'MyIncidentReportController@storeCKEditorImages')->name('my-incident-reports.storeCKEditorImages');
Route::post('my-incident-reports/parse-csv-import', 'MyIncidentReportController@parseCsvImport')->name('my-incident-reports.parseCsvImport');
Route::post('my-incident-reports/process-csv-import', 'MyIncidentReportController@processCsvImport')->name('my-incident-reports.processCsvImport');
Route::resource('my-incident-reports', 'MyIncidentReportController');

// Task Incident Reports
Route::get('task-incident-reports/{task_incident_report}/actionByExecutor',  'TaskIncidentReportController@actionByExecutor')->name('task-incident-reports.actionByExecutor');
Route::delete('task-incident-reports/destroy', 'TaskIncidentReportController@massDestroy')->name('task-incident-reports.massDestroy');
Route::post('task-incident-reports/media', 'TaskIncidentReportController@storeMedia')->name('task-incident-reports.storeMedia');
Route::post('task-incident-reports/ckmedia', 'TaskIncidentReportController@storeCKEditorImages')->name('task-incident-reports.storeCKEditorImages');
Route::post('task-incident-reports/parse-csv-import', 'TaskIncidentReportController@parseCsvImport')->name('task-incident-reports.parseCsvImport');
Route::post('task-incident-reports/process-csv-import', 'TaskIncidentReportController@processCsvImport')->name('task-incident-reports.processCsvImport');
Route::resource('task-incident-reports', 'TaskIncidentReportController');



    // Time Work Types
    Route::delete('time-work-types/destroy', 'TimeWorkTypeController@massDestroy')->name('time-work-types.massDestroy');
    Route::resource('time-work-types', 'TimeWorkTypeController');

    // Time Projects
    Route::delete('time-projects/destroy', 'TimeProjectController@massDestroy')->name('time-projects.massDestroy');
    Route::resource('time-projects', 'TimeProjectController');

    // Time Entries
    Route::delete('time-entries/destroy', 'TimeEntryController@massDestroy')->name('time-entries.massDestroy');
    Route::resource('time-entries', 'TimeEntryController');

    // Time Reports
    Route::delete('time-reports/destroy', 'TimeReportController@massDestroy')->name('time-reports.massDestroy');
    Route::resource('time-reports', 'TimeReportController');

    // Asset Categories
    Route::delete('asset-categories/destroy', 'AssetCategoryController@massDestroy')->name('asset-categories.massDestroy');
    Route::resource('asset-categories', 'AssetCategoryController');

    // Asset Locations
    Route::delete('asset-locations/destroy', 'AssetLocationController@massDestroy')->name('asset-locations.massDestroy');
    Route::resource('asset-locations', 'AssetLocationController');

    // Asset Statuses
    Route::delete('asset-statuses/destroy', 'AssetStatusController@massDestroy')->name('asset-statuses.massDestroy');
    Route::resource('asset-statuses', 'AssetStatusController');

    // Assets
    Route::delete('assets/destroy', 'AssetController@massDestroy')->name('assets.massDestroy');
    Route::post('assets/media', 'AssetController@storeMedia')->name('assets.storeMedia');
    Route::post('assets/ckmedia', 'AssetController@storeCKEditorImages')->name('assets.storeCKEditorImages');
    Route::resource('assets', 'AssetController');

    // Assets Histories
    Route::resource('assets-histories', 'AssetsHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');


     //Profiles
     Route::resource('profiles','ProfileController');
     Route::patch('profiles/{id}', 'ProfileController@update');

     Route::post('postChangePassword','ProfileController@postChangePassword')->name('postChangePassword');
     Route::post('changePassword','ProfileController@changePassword')->name('changePassword');
     Route::post('updatePassword','ProfileController@updatePassword')->name('updatePassword');

     //Approval
     #ini Fix (coba 1)
    Route::get('my-incident-reports/{incidentReport_id}/approve',  'MyIncidentReportController@approve')->name('my-incident-reports.approve');

    #ini untuk Superintendent()
    Route::get('my-incident-reports/{my_incident_report}/approveBySuperintendent',  'MyIncidentReportController@approveBySuperintendent')->name('my-incident-reports.approveBySuperintendent');
    Route::get('my-incident-reports/{my_incident_report}/rejectBySuperintendent',  'MyIncidentReportController@rejectBySuperintendent')->name('my-incident-reports.rejectBySuperintendent');
    #ini untuk Manager()
    Route::get('my-incident-reports/{my_incident_report}/approveByManager',  'MyIncidentReportController@approveByManager')->name('my-incident-reports.approveByManager');
    Route::get('my-incident-reports/{my_incident_report}/rejectByManager',  'MyIncidentReportController@rejectByManager')->name('my-incident-reports.rejectByManager');


    Route::post('my-incident-reports/approve1/{id}',  'MyIncidentReportController@approve1')->name('my-incident-reports.approve1');

    //History My Incident Reports
    Route::delete('history-my-incident-reports/destroy', 'HistoryMyIncidentReportController@massDestroy')->name('history-my-incident-reports.massDestroy');
    Route::resource('history-my-incident-reports', 'HistoryMyIncidentReportController');

   //History Task Incident Reports
   Route::delete('history-task-incident-reports/destroy', 'HistoryTaskIncidentReportController@massDestroy')->name('history-task-incident-reports.massDestroy');
   Route::resource('history-task-incident-reports', 'HistoryTaskIncidentReportController');

    // User Parents
    Route::delete('user-parents/destroy', 'UserParentController@massDestroy')->name('user-parents.massDestroy');
    Route::resource('user-parents', 'UserParentController');

    //Incident Report Notifications
    Route::delete('incident-report-notifications/destroy', 'IncidentReportNotificationController@massDestroy')->name('incident-report-notifications.massDestroy');
    Route::resource('incident-report-notifications', 'IncidentReportNotificationController');

     // Locations
     Route::delete('locations/destroy', 'LocationController@massDestroy')->name('locations.massDestroy');
     Route::resource('locations', 'LocationController');


     // Non Plant Locations
     Route::delete('nonplant-locations/destroy', 'NonPlantLocationController@massDestroy')->name('nonplant-locations.massDestroy');
     Route::resource('nonplant-locations', 'NonPlantLocationController');

     // Entitys
     Route::delete('entitys/destroy', 'EntityController@massDestroy')->name('entitys.massDestroy');
     Route::resource('entitys', 'EntityController');

      // Region NCR
    Route::delete('region-ncrs/destroy', 'RegionNcrController@massDestroy')->name('region-ncrs.massDestroy');
    Route::resource('region-ncrs', 'RegionNcrController');


    // Non Conformity Reports
    Route::delete('nonconformity-reports/destroy', 'NonConformityController@massDestroy')->name('nonconformity-reports.massDestroy');
    Route::get('nonconformity-reports/getLocationList', 'NonConformityController@getRegionLocations')->name('nonconformity-reports.getLocationList');

    Route::get('nonconformity-reports/getFilterReports', 'NonConformityController@getFilterReports')->name('nonconformity-reports.getFilterReports');
    Route::post('nonconformity-reports/media', 'NonConformityController@storeMedia')->name('nonconformity-reports.storeMedia');
    Route::get('nonconformity-reports/{nonconformity_report}/approvalByAdministrator',  'NonConformityController@approvalByAdministrator')->name('nonconformity-reports.approvalByAdministrator');
    Route::get('nonconformity-reports/{nonconformity_report}/rejectByAdministrator',  'NonConformityController@rejectByAdministrator')->name('nonconformity-reports.rejectByAdministrator');
    Route::get('nonconformity-reports/{nonconformity_report}/rejectByAdministratorVerification',  'NonConformityController@rejectByAdministratorVerification')->name('nonconformity-reports.rejectByAdministratorVerification');
    Route::resource('nonconformity-reports', 'NonConformityController');

    // Task Non Conformity Reports
    Route::get('task-nonconformity-reports/{task_nonconformity_report}/actionByExecutor',  'TaskNonConformityController@actionByExecutor')->name('task-nonconformity-reports.actionByExecutor');
    Route::get('task-nonconformity-reports/{task_nonconformity_report}/approvalByManager',  'TaskNonConformityController@approvalByManager')->name('task-nonconformity-reports.approvalByManager');
    Route::get('task-nonconformity-reports/{task_nonconformity_report}/rejectByManager',  'TaskNonConformityController@rejectByManager')->name('task-nonconformity-reports.rejectByManager');
    Route::post('task-nonconformity-reports/media', 'TaskNonConformityController@storeMedia')->name('task-nonconformity-reports.storeMedia');
    Route::resource('task-nonconformity-reports', 'TaskNonConformityController');

});
