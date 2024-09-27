<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div
        class="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <header class="flex justify-between items-center px-5 py-4 border-b border-slate-100 dark:border-slate-700">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100">
                {{ $student->fullName }}'s Profile
            </h2>
            <h2>
                <a href="{{ route('student-profile-print',$student) }}" class="bg-blue-500 text-xs hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fa fa-print"></i> Print
                </a>
            </h2>
        </header>
        <x-student-details :student="$student" />
</div>
</div>
