<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '18',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '19',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '20',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '21',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '22',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '23',
                'title' => 'incident_report_setting_access',
            ],
            [
                'id'    => '24',
                'title' => 'result_create',
            ],
            [
                'id'    => '25',
                'title' => 'result_edit',
            ],
            [
                'id'    => '26',
                'title' => 'result_show',
            ],
            [
                'id'    => '27',
                'title' => 'result_delete',
            ],
            [
                'id'    => '28',
                'title' => 'result_access',
            ],
            [
                'id'    => '29',
                'title' => 'root_cause_create',
            ],
            [
                'id'    => '30',
                'title' => 'root_cause_edit',
            ],
            [
                'id'    => '31',
                'title' => 'root_cause_show',
            ],
            [
                'id'    => '32',
                'title' => 'root_cause_delete',
            ],
            [
                'id'    => '33',
                'title' => 'root_cause_access',
            ],
            [
                'id'    => '34',
                'title' => 'category_incident_create',
            ],
            [
                'id'    => '35',
                'title' => 'category_incident_edit',
            ],
            [
                'id'    => '36',
                'title' => 'category_incident_show',
            ],
            [
                'id'    => '37',
                'title' => 'category_incident_delete',
            ],
            [
                'id'    => '38',
                'title' => 'category_incident_access',
            ],
            [
                'id'    => '39',
                'title' => 'classification_incident_create',
            ],
            [
                'id'    => '40',
                'title' => 'classification_incident_edit',
            ],
            [
                'id'    => '41',
                'title' => 'classification_incident_show',
            ],
            [
                'id'    => '42',
                'title' => 'classification_incident_delete',
            ],
            [
                'id'    => '43',
                'title' => 'classification_incident_access',
            ],
            [
                'id'    => '44',
                'title' => 'classification_detail_create',
            ],
            [
                'id'    => '45',
                'title' => 'classification_detail_edit',
            ],
            [
                'id'    => '46',
                'title' => 'classification_detail_show',
            ],
            [
                'id'    => '47',
                'title' => 'classification_detail_delete',
            ],
            [
                'id'    => '48',
                'title' => 'classification_detail_access',
            ],
            [
                'id'    => '49',
                'title' => 'designation_department_create',
            ],
            [
                'id'    => '50',
                'title' => 'designation_department_edit',
            ],
            [
                'id'    => '51',
                'title' => 'designation_department_show',
            ],
            [
                'id'    => '52',
                'title' => 'designation_department_delete',
            ],
            [
                'id'    => '53',
                'title' => 'designation_department_access',
            ],
            [
                'id'    => '54',
                'title' => 'origin_department_create',
            ],
            [
                'id'    => '55',
                'title' => 'origin_department_edit',
            ],
            [
                'id'    => '56',
                'title' => 'origin_department_show',
            ],
            [
                'id'    => '57',
                'title' => 'origin_department_delete',
            ],
            [
                'id'    => '58',
                'title' => 'origin_department_access',
            ],
            [
                'id'    => '59',
                'title' => 'job_title_create',
            ],
            [
                'id'    => '60',
                'title' => 'job_title_edit',
            ],
            [
                'id'    => '61',
                'title' => 'job_title_show',
            ],
            [
                'id'    => '62',
                'title' => 'job_title_delete',
            ],
            [
                'id'    => '63',
                'title' => 'job_title_access',
            ],
            [
                'id'    => '64',
                'title' => 'incident_report_create',
            ],
            [
                'id'    => '65',
                'title' => 'incident_report_edit',
            ],
            [
                'id'    => '66',
                'title' => 'incident_report_show',
            ],
            [
                'id'    => '67',
                'title' => 'incident_report_delete',
            ],
            [
                'id'    => '68',
                'title' => 'incident_report_access',
            ],
            [
                'id'    => '69',
                'title' => 'time_management_access',
            ],
            [
                'id'    => '70',
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => '71',
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => '72',
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => '73',
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => '74',
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => '75',
                'title' => 'time_project_create',
            ],
            [
                'id'    => '76',
                'title' => 'time_project_edit',
            ],
            [
                'id'    => '77',
                'title' => 'time_project_show',
            ],
            [
                'id'    => '78',
                'title' => 'time_project_delete',
            ],
            [
                'id'    => '79',
                'title' => 'time_project_access',
            ],
            [
                'id'    => '80',
                'title' => 'time_entry_create',
            ],
            [
                'id'    => '81',
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => '82',
                'title' => 'time_entry_show',
            ],
            [
                'id'    => '83',
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => '84',
                'title' => 'time_entry_access',
            ],
            [
                'id'    => '85',
                'title' => 'time_report_create',
            ],
            [
                'id'    => '86',
                'title' => 'time_report_edit',
            ],
            [
                'id'    => '87',
                'title' => 'time_report_show',
            ],
            [
                'id'    => '88',
                'title' => 'time_report_delete',
            ],
            [
                'id'    => '89',
                'title' => 'time_report_access',
            ],
            [
                'id'    => '90',
                'title' => 'asset_management_access',
            ],
            [
                'id'    => '91',
                'title' => 'asset_category_create',
            ],
            [
                'id'    => '92',
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => '93',
                'title' => 'asset_category_show',
            ],
            [
                'id'    => '94',
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => '95',
                'title' => 'asset_category_access',
            ],
            [
                'id'    => '96',
                'title' => 'asset_location_create',
            ],
            [
                'id'    => '97',
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => '98',
                'title' => 'asset_location_show',
            ],
            [
                'id'    => '99',
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => '100',
                'title' => 'asset_location_access',
            ],
            [
                'id'    => '101',
                'title' => 'asset_status_create',
            ],
            [
                'id'    => '102',
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => '103',
                'title' => 'asset_status_show',
            ],
            [
                'id'    => '104',
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => '105',
                'title' => 'asset_status_access',
            ],
            [
                'id'    => '106',
                'title' => 'asset_create',
            ],
            [
                'id'    => '107',
                'title' => 'asset_edit',
            ],
            [
                'id'    => '108',
                'title' => 'asset_show',
            ],
            [
                'id'    => '109',
                'title' => 'asset_delete',
            ],
            [
                'id'    => '110',
                'title' => 'asset_access',
            ],
            [
                'id'    => '111',
                'title' => 'assets_history_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
