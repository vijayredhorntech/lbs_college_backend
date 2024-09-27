<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-primaryDark bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-primaryDark  transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
        x-cloak="lg">

        <!-- Sidebar header -->
        <div class="flex lg:justify-center justify-start items-center px-2 py-4 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-white mr-2" @click.stop="sidebarOpen = !sidebarOpen"
                    aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                  <i class="fa fa-arrow-left"></i>
            </button>
            <!-- Logo -->
            <a class="block flex items-center" href="{{ route('dashboard') }}">
                <x-application-logo/>
            </a>
        </div>

        <!-- Links -->
        <div class="p-2">
            <!-- Pages group -->
            <div>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    <h3 class="text-xs uppercase text-white/60 font-semibold mb-2">
                            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                                  aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    dashboard
                                </span>
                    </h3>
                    <li class="{{Route::currentRouteName()==='dashboard'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('dashboard') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-tachometer"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                                </div>
                            </div>
                        </a>
                    </li>

                    @role('admin')
                   {{--Students--}}
                    <h3 class="text-xs uppercase text-white/60 font-semibold mb-2 mt-4">
                            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                                  aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    Students
                                </span>
                    </h3>
                    <li class="{{Route::currentRouteName()==='student-list'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('student-list') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-users"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Students List</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="{{Route::currentRouteName()==='student-form'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('student-form') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-file"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Enroll New</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="{{Route::currentRouteName()==='enrollment-list'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('enrollment-list') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-database"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Enrollments</span>
                                </div>
                            </div>
                        </a>
                    </li>

                    {{--Managements--}}
                    <h3 class="text-xs uppercase text-white/60 font-semibold mb-2 mt-4">
                            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                                  aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    Managements
                                </span>
                    </h3>
                    <li class="{{Route::currentRouteName()==='course-list'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('course-list') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-file-pen"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Courses</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="{{Route::currentRouteName()==='subject-list'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('subject-list') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-book"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Subjects</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="{{Route::currentRouteName()==='schedule-list'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('schedule-list') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-calendar-days"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Schedule</span>
                                </div>
                            </div>
                        </a>
                    </li>


                    {{--Faculty--}}
                    <h3 class="text-xs uppercase text-white/60 font-semibold mb-2 mt-4">
                            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                                  aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    Faculty
                                </span>
                    </h3>
                    <li class="{{Route::currentRouteName()==='faculty-list'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('faculty-list') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-person"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Faculty List</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="{{Route::currentRouteName()==='faculty-form'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('faculty-form') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-circle-plus"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Add New</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="{{Route::currentRouteName()==='faculty-classes-list'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('faculty-classes-list') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-school"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Classes</span>
                                </div>
                            </div>
                        </a>
                    </li>

                    {{--Reports--}}
                    <h3 class="text-xs uppercase text-white/60 font-semibold mb-2 mt-4">
                            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                                  aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    Reports
                                </span>
                    </h3>
                    <li class="{{Route::currentRouteName()==='students_yearwise'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('students_yearwise') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-calendar-days"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Students Year Wise</span>
                                </div>
                            </div>
                        </a>
                    </li>


                    {{--Fee Structure--}}
                    <h3 class="text-xs uppercase text-white/60 font-semibold mb-2 mt-4">
                            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                                  aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    Fee
                                </span>
                    </h3>
                    <li class="{{Route::currentRouteName()==='fee-structure'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('fee-structure') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-money-bill"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Fee Structure</span>
                                </div>
                            </div>
                        </a>
                    </li>


                    {{--Documents--}}
                    <h3 class="text-xs uppercase text-white/60 font-semibold mb-2 mt-4">
                            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                                  aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    Documents
                                </span>
                    </h3>
                    <li class="{{Route::currentRouteName()==='student_education_documents'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('student_education_documents') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-file"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Documents</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endrole

                    @role('teacher')
                    <h3 class="text-xs uppercase text-white/60 font-semibold mb-2 mt-4">
                            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                                  aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    Classes
                                </span>
                    </h3>
                    <li class="{{Route::currentRouteName()==='faculty-classes-list'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('faculty-classes-list') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-school"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Classes</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endrole

                    @role('student')
                    <h3 class="text-xs uppercase text-white/60 font-semibold mb-2 mt-4">
                            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                                  aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    My Enrollments
                                </span>
                    </h3>
                    <li class="{{Route::currentRouteName()==='enrollment-list'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('enrollment-list') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-file"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Enrollments</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="{{Route::currentRouteName()==='student-education'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('student-education') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-school"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Education Details</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="{{Route::currentRouteName()==='student-documents'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('student-documents') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-database"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Documents</span>
                                </div>
                            </div>
                        </a>
                    </li>


                    <h3 class="text-xs uppercase text-white/60 font-semibold mb-2 mt-4">
                            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                                  aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    Profile
                                </span>
                    </h3>
                    <li class="{{Route::currentRouteName()==='profile'?'bg-white text-primaryDark font-bold':'text-white'}} px-3 py-2 rounded-[3px] mb-0.5 last:mb-0 hover:bg-white hover:text-primaryDark hover:font-bold truncate transition duration-150">
                        <a href="{{ route('profile') }}" class="block" >
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fa fa-user"></i>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Profile</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>

        </div>
    </div>
</div>
