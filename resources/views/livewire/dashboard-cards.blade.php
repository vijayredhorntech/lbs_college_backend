<div class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 bg-white border-[1px] border-primaryDark/50 p-4">
    <div class="bg-gradient-to-r from-pink-800 to-pink-200 p-6 rounded-lg shadow-lg flex items-center justify-between text-white">
        <div>
            <div class="text-xs font-semibold uppercase tracking-wider">Students</div>
            <div class="text-3xl font-bold">{{ $studentCount }}</div>
        </div>
        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
           <i class="fa fa-user text-pink-900 text-3xl"></i>
        </div>
    </div>

    <div class="bg-gradient-to-r from-yellow-800 to-yellow-200 p-6 rounded-lg shadow-lg flex items-center justify-between text-white">
        <div>
            <div class="text-xs font-semibold uppercase tracking-wider">Faculty</div>
            <div class="text-3xl font-bold">{{ $facultyCount }}</div>
        </div>
        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
            <i class="fa fa-person text-yellow-900 text-3xl"></i>
        </div>
    </div>

    <div class="bg-gradient-to-r from-primaryDark to-primaryLight p-6 rounded-lg shadow-lg flex items-center justify-between text-white">
        <div>
            <div class="text-xs font-semibold uppercase tracking-wider">Courses</div>
            <div class="text-3xl font-bold">{{ $courseCount }}</div>
        </div>
        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
            <i class="fa fa-file-pen text-primaryDark text-3xl"></i>
        </div>
    </div>

    <div class="bg-gradient-to-r from-yellow-800 to-yellow-200 p-6 rounded-lg shadow-lg flex items-center justify-between text-white">
        <div>
            <div class="text-xs font-semibold uppercase tracking-wider">Subjects</div>
            <div class="text-3xl font-bold">{{ $subjectCount }}</div>
        </div>
        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
            <i class="fa fa-book text-yellow-900 text-3xl"></i>
        </div>
    </div>

    <div class="bg-gradient-to-r from-pink-800 to-pink-200 p-6 rounded-lg shadow-lg flex items-center justify-between text-white">
        <div>
            <div class="text-xs font-semibold uppercase tracking-wider">Enrollments</div>
            <div class="text-3xl font-bold">{{ $enrollmentCount }}</div>
        </div>
        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
            <i class="fa fa-file text-pink-900 text-3xl"></i>
        </div>
    </div>

</div>
