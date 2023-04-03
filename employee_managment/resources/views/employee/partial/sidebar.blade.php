 <aside class="admin-sidebar">
            <div class="admin-sidebar-brand">
                <!-- begin sidebar branding-->
                <img class="admin-brand-logo" src="{{asset('console/assets/img/logo.svg')}}" width="40" alt="hci Logo" />
                <span class="admin-brand-content"><a href="index.html"> hci</a></span>
                <!-- end sidebar branding-->
                <div class="ml-auto">
                    <!-- sidebar pin-->
                    <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
                    <!-- sidebar close for mobile device-->
                    <a href="#" class="admin-close-sidebar"></a>
                </div>
            </div>
            <div class="admin-sidebar-wrapper js-scrollbar">
                <!-- Menu List Begins-->
                <ul class="menu">
                    <!--list item begins-->
                    <li class="menu-item active">
                        <a href="{{route('employee.dashboard')}}" class="menu-link">
                            <span class="menu-label">
                                <span class="menu-name">Dashboard </span>
                            </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-view-dashboard"></i>
                            </span>
                        </a>
                    </li>
                    <!--list item ends-->

                    <!--list item begins-->
                    <li class="menu-item">
                        <a href="#" class="open-dropdown menu-link">
                            <span class="menu-label">
                                <span class="menu-name">
                                    Employees
                                    <span class="menu-arrow"></span>
                                </span>
                            </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-account"></i>
                            </span>
                        </a>
                        <!--submenu-->
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="all-employees.html" class="menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">Employees List</span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-format-list-bulleted"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="department.index" class="menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">View Employees</span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-eye-outline"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('employee.create')}}" class="menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">Add Employees</span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-account-plus"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--list item ends-->
                    

                    <!--list item begins-->
                    <li class="menu-item">
                        <a href="#" class="open-dropdown menu-link">
                            <span class="menu-label">
                                <span class="menu-name">
                                    Attendance
                                    <span class="menu-arrow"></span>
                                </span>
                                <!-- <span class="menu-info">Contains submenu</span> -->
                            </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-calendar"></i>
                            </span>
                        </a>
                        <!--submenu-->
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="attendance-list.html" class="menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">Attendance List</span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-calendar-text"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="attendance-list.html" class="menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">
                                            Attendance By User
                                        </span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-account-box-outline"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="attendance-view.html" class="menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">
                                            Attendance View
                                        </span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-calendar-check"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--list item ends-->

                    <!--list item begins-->
                    <li class="menu-item">
                        <a href="#" class="open-dropdown menu-link">
                            <span class="menu-label">
                                <span class="menu-name">
                                    Leave
                                    <span class="menu-arrow"></span>
                                </span>
                                <!-- <span class="menu-info">Contains submenu</span> -->
                            </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-calendar"></i>
                            </span>
                        </a>
                        <!--submenu-->
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="leave-settings.html" class="menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">Leave Setting</span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-calendar-text"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="leave-applications.html" class="menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">
                                            Leave Applications
                                        </span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-account-box-outline"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="recent-reave-applications.html" class="menu-link">
                                    <span class="menu-label">
                                        <span class="menu-name">
                                            Recent Leaves
                                        </span>
                                    </span>
                                    <span class="menu-icon">
                                        <i class="icon-placeholder mdi mdi-calendar-check"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--list item ends-->

                    <!--list item begins-->
                    <li class="menu-item">
                        <a href="list-holidays.html" class="menu-link">
                            <span class="menu-label">
                                <span class="menu-name">
                                    Holidays
                                </span>
                            </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-account"></i>
                            </span>
                        </a>
                    </li>
                    <!--list item ends-->

                </ul>
                <!-- Menu List Ends-->
            </div>
        </aside>