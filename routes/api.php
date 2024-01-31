
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Results
    Route::apiResource('results', 'ResultApiController');

    // Root Causes
    Route::apiResource('root-causes', 'RootCauseApiController');

    // Category Incidents
    Route::apiResource('category-incidents', 'CategoryIncidentApiController');

    // Classification Incidents
    Route::apiResource('classification-incidents', 'ClassificationIncidentApiController');

    // Classification Details
    Route::post('classification-details/media', 'ClassificationDetailApiController@storeMedia')->name('classification-details.storeMedia');
    Route::apiResource('classification-details', 'ClassificationDetailApiController');

    // Designation Departments
    Route::apiResource('designation-departments', 'DesignationDepartmentApiController');

    // Origin Departments
    Route::apiResource('origin-departments', 'OriginDepartmentApiController');

    // Job Titles
    Route::apiResource('job-titles', 'JobTitleApiController');

    // Incident Reports
    Route::post('incident-reports/media', 'IncidentReportApiController@storeMedia')->name('incident-reports.storeMedia');
    Route::apiResource('incident-reports', 'IncidentReportApiController');

    // Time Work Types
    Route::apiResource('time-work-types', 'TimeWorkTypeApiController');

    // Time Projects
    Route::apiResource('time-projects', 'TimeProjectApiController');

    // Time Entries
    Route::apiResource('time-entries', 'TimeEntryApiController');

    // Asset Categories
    Route::apiResource('asset-categories', 'AssetCategoryApiController');

    // Asset Locations
    Route::apiResource('asset-locations', 'AssetLocationApiController');

    // Asset Statuses
    Route::apiResource('asset-statuses', 'AssetStatusApiController');

    // Assets
    Route::post('assets/media', 'AssetApiController@storeMedia')->name('assets.storeMedia');
    Route::apiResource('assets', 'AssetApiController');
});
