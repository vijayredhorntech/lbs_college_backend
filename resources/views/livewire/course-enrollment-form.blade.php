









<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div
            class="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
            <header class="flex justify-between items-center px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100">
                    Enroll for {{ $schedule->course->name }}({{ $schedule->year }} Year) | {{ $schedule->academicYear->year_start->format('M Y') }}-{{ $schedule->academicYear->year_end->format('M Y') }}
                </h2>
            </header>
            <div class="flex justify-between grow px-5 border-b border-slate-100 dark:border-slate-700 p-4">
               <div>
                <span class="font-bold">Submission Date:</span>
                {{ $schedule->submission_from->format('d-m-Y') }} to {{ $schedule->submission_till->format('d-m-Y') }}
               </div>
                <div>
                    <span class="font-bold">Late Fee From:</span>
                    {{ $schedule->late_fee_starts_from->format('d-m-Y') }}

                </div>
            </div>

            <div class="grow px-5 border-b border-slate-100 dark:border-slate-700 p-4">
                <span class="font-bold">Core Subjects:</span>
                @foreach($schedule->subjects as $subject)
                    {{ $subject->subject->name }}{{ $loop->last ? '' : ',' }}
                @endforeach
            </div>
            <div class="grow px-5 border-b border-slate-100 dark:border-slate-700 p-4">
                <div x-data="{
    selectedSubjects: @entangle('selectedSubjects').defer || [],
    maxSelection: 2,
    groupSelections: {},
    toggleSubject(group, subjectId) {
        if (!this.groupSelections[group]) {
            this.groupSelections[group] = null;
        }

        if (this.groupSelections[group] === subjectId) {
            this.groupSelections[group] = null;
            this.selectedSubjects = this.selectedSubjects.filter(id => id !== subjectId);
        } else {
            if (this.selectedSubjects.length < this.maxSelection) {
                if (this.groupSelections[group]) {
                    this.selectedSubjects = this.selectedSubjects.filter(id => id !== this.groupSelections[group]);
                }
                this.groupSelections[group] = subjectId;
                this.selectedSubjects.push(subjectId);
            }
        }
    },
    isDisabled(subjectId) {
        return this.selectedSubjects.length >= this.maxSelection && !this.selectedSubjects.includes(subjectId);
    }
}">
                    <form wire:submit.prevent="submit">
                        <span class="font-bold">Elective Subjects: (Only 1 from every group with a maximum of 2)</span>
                        <div class="flex flex-col">
                            @foreach($schedule->groups->groupBy('name')->sortKeys() as $groupName => $group)
                                <div class="flex flex-col border-b-2 border-gray-200">
                                    <span class="font-semibold">{{ $groupName }}:</span>
                                    <div>
                                        @foreach($group as $course)
                                            @foreach($course->course_subjects_id as $subjectId)
                                                @php
                                                    $subject = \App\Models\Subject::find($subjectId);
                                                @endphp
                                                <div class="flex items-center">
                                                    <input type="checkbox"
                                                           id="subject_{{ $groupName }}_{{ $subjectId }}"
                                                           :class="{'bg-gray-100': isDisabled({{ $subjectId }})}"
                                                           :disabled="isDisabled({{ $subjectId }})"
                                                           @change="toggleSubject('{{ $groupName }}', {{ $subjectId }})"
                                                           :checked="groupSelections['{{ $groupName }}'] === {{ $subjectId }}" />
                                                    <label for="subject_{{ $groupName }}_{{ $subjectId }}" class="ml-2">{{ $subject->name }}</label>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="mt-4 p-2 bg-blue-500 text-white">Send For Approval</button>
{{--                        <button type="submit" class="mt-4 p-2 bg-blue-500 text-white">Proceed and Pay Fee ({{ Number::currency($totalFee, 'INR') }})</button>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
