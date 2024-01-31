<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('designation_department_access')
                            <li class="{{ request()->is('admin/designation-departments') || request()->is('admin/designation-departments/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.designation-departments.index") }}">
                                    <i class="fa-fw fas fa-users-cog">

                                    </i>
                                    <span>{{ trans('cruds.designationDepartment.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('origin_department_access')
                            <li class="{{ request()->is('admin/origin-departments') || request()->is('admin/origin-departments/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.origin-departments.index") }}">
                                    <i class="fa-fw fas fa-users">

                                    </i>
                                    <span>{{ trans('cruds.originDepartment.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('job_title_access')
                            <li class="{{ request()->is('admin/job-titles') || request()->is('admin/job-titles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.job-titles.index") }}">
                                    <i class="fa-fw fas fa-user-md">

                                    </i>
                                    <span>{{ trans('cruds.jobTitle.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('area_user_access')
                        <li
                            class="{{ request()->is('admin/area-users') || request()->is('admin/area-users/*') ? 'active' : '' }}">
                            <a href="{{ route("admin.area-users.index") }}">
                                <i class="fa-fw fas fa-users-cog">

                                </i>
                                <span>{{ trans('cruds.areaUser.title') }}</span>
                            </a>
                        </li>
                        @endcan

                        {{-- @can('user_parent_access')
                        <li class="{{ request()->is('admin/user-parents') || request()->is('admin/user-parents/*') ? 'active' : '' }}">
                            <a href="{{ route("admin.user-parents.index") }}">
                                <i class="fa-fw fas fa-users-cog">

                                </i>
                                <span>{{ trans('cruds.userParent.title') }}</span>
                            </a>
                        </li>
                    @endcan --}}
                    </ul>
                </li>
            @endcan
            @can('user_alert_access')
                <li class="{{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.user-alerts.index") }}">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span>{{ trans('cruds.userAlert.title') }}</span>
                    </a>
                </li>
            @endcan

                        @can('incident_report_access')
                        <li class="{{ request()->is('admin/incident-reports') || request()->is('admin/incident-reports/*') ? 'active' : '' }}">
                            <a href="{{ route("admin.incident-reports.index") }}">
                                <i class="fa-fw fas fa-clipboard-list">

                                </i>
                                <span>{{ trans('cruds.incidentReport.title') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('my_incident_report_access')

                    {{$countIncident = \App\IncidentReport::countMyIncident()}}
                    <li
                        class="{{ request()->is('admin/my-incident-reports') || request()->is('admin/my-incident-reports/*') ? 'active' : '' }}">
                        <a href="{{ route("admin.my-incident-reports.index") }}" class="notification">
                            <i class="fa fa-plus-circle">

                            </i>
                            <span>{{ trans('cruds.myIncidentReport.title') }}</span>
                            @if ($countIncident > 0)
                            <span class="badge badge-danger">{{$countIncident}}</span>
                            @endif

                        </a>
                    </li>

                    @endcan

                    @can('history_my_incident_report_access')
                    <li
                        class="{{ request()->is('admin/history-my-incident-reports') || request()->is('admin/history-my-incident-reports/*') ? 'active' : '' }}">
                        <a href="{{ route("admin.history-my-incident-reports.index") }}">
                            <i class="fa fa-plus-circle">

                            </i>
                            <span>{{ trans('cruds.historyMyIncidentReport.title') }}</span>
                        </a>
                    </li>
                    @can('task_incident_report_access')
                    {{$countTaskIncident = \App\IncidentReport::countTaskIncident()}}
                    <li
                        class="{{ request()->is('admin/task-incident-reports') || request()->is('admin/task-incident-reports/*') ? 'active' : '' }}">
                        <a href="{{ route("admin.task-incident-reports.index") }}" class="notification">
                            <i class="fa fa-exclamation-triangle">

                            </i>
                            <span class="pull right-container">{{ trans('cruds.taskIncidentReport.title') }}</span>
                            @if ($countTaskIncident > 0)
                            <span class="pull right-container">
                                <small class="label pull-right bg-red"> {{$countTaskIncident}}</small>
                            </span>
                            @endif
                        </a>
                    </li>
                    @endcan
                    @endcan
                    @can('history_task_incident_report_access')
                    <li
                        class="{{ request()->is('admin/history-task-incident-reports') || request()->is('admin/history-task-incident-reports/*') ? 'active' : '' }}">
                        <a href="{{ route("admin.history-task-incident-reports.index") }}">
                            <i class="fa fa-exclamation-triangle">

                            </i>
                            <span>{{ trans('cruds.historyTaskIncidentReport.title') }}</span>
                        </a>
                    </li>
                    @endcan

                    @can('result_access')
                     <li class="{{ request()->is('admin/results') || request()->is('admin/results/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.results.index") }}">
                                    <i class="fa-fw fas fa-bullhorn">

                                    </i>
                                    <span>{{ trans('cruds.result.title') }}</span>
                                </a>
                    </li>
                    @endcan

                    @can('nonconformity_report_access')
                    <li
                        class="{{ request()->is('admin/nonconformity-reports') || request()->is('admin/nonconformity-reports/*') ? 'active' : '' }}">
                        <a href="{{ route('admin.nonconformity-reports.index') }}">
                            <i class="fa-fw fas fa-clipboard-list">

                            </i>
                            <span>{{ trans('cruds.nonConformityReport.title') }}</span>
                        </a>
                    </li>
                @endcan


                @can('task_nonconformity_report_access')
                    <li
                        class="{{ request()->is('admin/task-nonconformity-reports') || request()->is('admin/task-nonconformity-reports/*') ? 'active' : '' }}">
                        <a href="{{ route('admin.task-nonconformity-reports.index') }}">
                            <i class="fa-fw fas fa-clipboard-list">

                            </i>
                            <span>{{ trans('cruds.taskNonConformityReport.title') }}</span>
                        </a>
                    </li>
                @endcan

                @can('region_ncr_access')
                    <li
                        class="{{ request()->is('admin/region-ncrs') || request()->is('admin/region-ncrs/*') ? 'active' : '' }}">
                        <a href="{{ route('admin.region-ncrs.index') }}">
                            <i class="fa fa-map-marker">

                            </i>
                            <span>{{ trans('cruds.regionNcr.title') }}</span>
                        </a>
                    </li>
                @endcan

                @can('location_access')
                    <li class="{{ request()->is('admin/locations') || request()->is('admin/locations/*') ? 'active' : '' }}">
                        <a href="{{ route('admin.locations.index') }}">
                            <i class="fa-fw fas fa-clipboard-list">

                            </i>
                            <span>{{ trans('cruds.location.title') }}</span>
                        </a>
                    </li>
                @endcan

                @can('entity_access')
                    <li class="{{ request()->is('admin/entitys') || request()->is('admin/entitys/*') ? 'active' : '' }}">
                        <a href="{{ route('admin.entitys.index') }}">
                            <i class="fa-fw fas fa-clipboard-list">

                            </i>
                            <span>{{ trans('cruds.entity.title') }}</span>
                        </a>
                    </li>
                @endcan


                @can('nonplant_location_access')
                    <li
                        class="{{ request()->is('admin/nonplant-locations') || request()->is('admin/nonplant-locations/*') ? 'active' : '' }}">
                        <a href="{{ route('admin.nonplant-locations.index') }}">
                            <i class="fa-fw fas fa-clipboard-list">

                            </i>
                            <span>{{ trans('cruds.nonPlantlocation.title') }}</span>
                        </a>
                    </li>
                @endcan



                @can('result_access')
                    <li class="{{ request()->is('admin/results') || request()->is('admin/results/*') ? 'active' : '' }}">
                        <a href="{{ route('admin.results.index') }}">
                            <i class="fa-fw fas fa-bullhorn">

                            </i>
                            <span>{{ trans('cruds.result.title') }}</span>
                        </a>
                    </li>
                @endcan
                    @can('root_cause_access')
                     <li class="{{ request()->is('admin/root-causes') || request()->is('admin/root-causes/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.root-causes.index") }}">
                                    <i class="fa-fw fas fa-hashtag">

                                    </i>
                                    <span>{{ trans('cruds.basicCause.title') }}</span>
                                </a>
                     </li>
                    @endcan
                    @can('category_incident_access')
                      <li class="{{ request()->is('admin/category-incidents') || request()->is('admin/category-incidents/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.category-incidents.index") }}">
                                    <i class="fa-fw fab fa-elementor">

                                    </i>
                                    <span>{{ trans('cruds.categoryIncident.title') }}</span>
                                </a>
                    </li>
                    @endcan
                    @can('classification_incident_access')
                    <li class="{{ request()->is('admin/classification-incidents') || request()->is('admin/classification-incidents/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.classification-incidents.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.classificationIncident.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('classification_detail_access')
                            <li class="{{ request()->is('admin/classification-details') || request()->is('admin/classification-details/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.classification-details.index") }}">
                                    <i class="fa-fw fab fa-cuttlefish">

                                    </i>
                                    <span>{{ trans('cruds.classificationDetail.title') }}</span>
                                </a>
                            </li>
                        @endcan

                        @can('investigation_detail_access')
                        {{ $countInvestigation = \App\InvestigationDetail::countInvestigatonDetail() }}
                            <li class="{{ request()->is('admin/investigation-details') || request()->is('admin/investigation-details/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.investigation-details.index") }}">
                                    <i class="fas fa-bell">

                                    </i>
                                    <span>{{ trans('cruds.investigationDetail.title') }}</span>
                                    @if ($countInvestigation > 0)
                                    <span class="pull right-container">
                                        <small class="label pull-right bg-red"> {{$countInvestigation}}</small>
                                    </span>
                                    @endif
                                </a>
                            </li>
                        @endcan

                        @can('chemical_release_access')
                        <li class="{{ request()->is('admin/chemical-releases') || request()->is('admin/chemical-releases/*') ? 'active' : '' }}">
                            <a href="{{ route("admin.chemical-releases.index") }}">
                                <i class="fa fa-flask">

                                </i>
                                <span>{{ trans('cruds.chemicalRelease.title') }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('area_incident_access')
                    <li
                        class="{{ request()->is('admin/area-incidents') || request()->is('admin/area-incidents/*') ? 'active' : '' }}">
                        <a href="{{ route("admin.area-incidents.index") }}">
                            <i class="fa fa-building-o">

                            </i>
                            <span>{{ trans('cruds.areaIncident.title') }}</span>
                        </a>
                    </li>
                    @endcan

                    @can('region_incident_access')
                    <li
                        class="{{ request()->is('admin/region-incidents') || request()->is('admin/region-incidents/*') ? 'active' : '' }}">
                        <a href="{{ route("admin.region-incidents.index") }}">
                            <i class="fa fa-map-marker">

                            </i>
                            <span>{{ trans('cruds.regionIncident.title') }}</span>
                        </a>
                    </li>
                    @endcan

                    @can('precortive_access')
                    <li
                        class="{{ request()->is('admin/precortives') || request()->is('admin/precortives/*') ? 'active' : '' }}">
                        <a href="{{ route("admin.precortives.index") }}">
                            <i class="fa fa-map-marker">

                            </i>
                            <span>{{ trans('cruds.precortive.title') }}</span>
                        </a>
                    </li>
                    @endcan

            @can('time_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-clock">

                        </i>
                        <span>{{ trans('cruds.timeManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('time_work_type_access')
                            <li class="{{ request()->is('admin/time-work-types') || request()->is('admin/time-work-types/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.time-work-types.index") }}">
                                    <i class="fa-fw fas fa-th">

                                    </i>
                                    <span>{{ trans('cruds.timeWorkType.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('time_project_access')
                            <li class="{{ request()->is('admin/time-projects') || request()->is('admin/time-projects/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.time-projects.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.timeProject.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('time_entry_access')
                            <li class="{{ request()->is('admin/time-entries') || request()->is('admin/time-entries/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.time-entries.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.timeEntry.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('time_report_access')
                            <li class="{{ request()->is('admin/time-reports') || request()->is('admin/time-reports/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.time-reports.index") }}">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span>{{ trans('cruds.timeReport.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('asset_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-book">

                        </i>
                        <span>{{ trans('cruds.assetManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('asset_category_access')
                            <li class="{{ request()->is('admin/asset-categories') || request()->is('admin/asset-categories/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.asset-categories.index") }}">
                                    <i class="fa-fw fas fa-tags">

                                    </i>
                                    <span>{{ trans('cruds.assetCategory.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('asset_location_access')
                            <li class="{{ request()->is('admin/asset-locations') || request()->is('admin/asset-locations/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.asset-locations.index") }}">
                                    <i class="fa-fw fas fa-map-marker">

                                    </i>
                                    <span>{{ trans('cruds.assetLocation.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('asset_status_access')
                            <li class="{{ request()->is('admin/asset-statuses') || request()->is('admin/asset-statuses/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.asset-statuses.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.assetStatus.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('asset_access')
                            <li class="{{ request()->is('admin/assets') || request()->is('admin/assets/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.assets.index") }}">
                                    <i class="fa-fw fas fa-book">

                                    </i>
                                    <span>{{ trans('cruds.asset.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('assets_history_access')
                            <li class="{{ request()->is('admin/assets-histories') || request()->is('admin/assets-histories/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.assets-histories.index") }}">
                                    <i class="fa-fw fas fa-th-list">

                                    </i>
                                    <span>{{ trans('cruds.assetsHistory.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            {{-- <li class="{{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                <a href="{{ route("admin.systemCalendar") }}">
                    <i class="fas fa-fw fa-calendar">

                    </i>
                    <span>{{ trans('global.systemCalendar') }}</span>
                </a>
            </li> --}}
            {{-- @php($unread = \App\QaTopic::unreadCount()) --}}
            {{-- {{$unread = \App\QaTopic::unreadCount()}}
                <li class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif
                    </a>
                </li> --}}

                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
        </ul>
    </section>
</aside>
