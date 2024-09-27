<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div
            class="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
            <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100">
                    @if($student != null)
                        {{ __('Editing - '. $student->fullName . '\'s form') }}
                    @else
                        {{ __('Student Enrollment Form') }}
                    @endif
                </h2>
            </header>
            <div class="grow px-5 border-b border-slate-100 dark:border-slate-700">
                <livewire:student-enrollment-form :student="$student"/>
            </div>
        </div>
    </div>
</x-app-layout>
