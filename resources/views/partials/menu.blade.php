<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route('admin.home') }}">
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
                            <li
                                class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.permissions.index') }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.roles.index') }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.users.index') }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li
                                class="{{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.audit-logs.index') }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('area_user_access')
                            <li
                                class="{{ request()->is('admin/area-users') || request()->is('admin/area-users/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.area-users.index') }}">
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
                <li
                    class="{{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.user-alerts.index') }}">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span>{{ trans('cruds.userAlert.title') }}</span>
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
                            <li
                                class="{{ request()->is('admin/time-work-types') || request()->is('admin/time-work-types/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.time-work-types.index') }}">
                                    <i class="fa-fw fas fa-th">

                                    </i>
                                    <span>{{ trans('cruds.timeWorkType.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('time_project_access')
                            <li
                                class="{{ request()->is('admin/time-projects') || request()->is('admin/time-projects/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.time-projects.index') }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.timeProject.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('time_entry_access')
                            <li
                                class="{{ request()->is('admin/time-entries') || request()->is('admin/time-entries/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.time-entries.index') }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.timeEntry.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('time_report_access')
                            <li
                                class="{{ request()->is('admin/time-reports') || request()->is('admin/time-reports/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.time-reports.index') }}">
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
                            <li
                                class="{{ request()->is('admin/asset-categories') || request()->is('admin/asset-categories/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.asset-categories.index') }}">
                                    <i class="fa-fw fas fa-tags">

                                    </i>
                                    <span>{{ trans('cruds.assetCategory.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('asset_location_access')
                            <li
                                class="{{ request()->is('admin/asset-locations') || request()->is('admin/asset-locations/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.asset-locations.index') }}">
                                    <i class="fa-fw fas fa-map-marker">

                                    </i>
                                    <span>{{ trans('cruds.assetLocation.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('asset_status_access')
                            <li
                                class="{{ request()->is('admin/asset-statuses') || request()->is('admin/asset-statuses/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.asset-statuses.index') }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.assetStatus.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('asset_access')
                            <li
                                class="{{ request()->is('admin/assets') || request()->is('admin/assets/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.assets.index') }}">
                                    <i class="fa-fw fas fa-book">

                                    </i>
                                    <span>{{ trans('cruds.asset.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('assets_history_access')
                            <li
                                class="{{ request()->is('admin/assets-histories') || request()->is('admin/assets-histories/*') ? 'active' : '' }}">
                                <a href="{{ route('admin.assets-histories.index') }}">
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
                        @if ($unread > 0)
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
