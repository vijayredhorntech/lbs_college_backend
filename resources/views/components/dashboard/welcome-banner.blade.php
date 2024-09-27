<div class="relative bg-primaryDark px-4 py-2 rounded-sm overflow-hidden border-[1px] border-primaryDark">
    <div class="relative">
        <h1 class="text-2xl md:text-3xl text-white/90 font-bold mb-1">
            Hello, {{ Auth::user()->name }} 👋</h1>

        @role('student')
        @if(!Auth()->user()->student)
            <p class="text-white text-sm">Your profile is incomplete, complete the form below to proceed.</p>
        @endif
        @endrole

        @if(!Auth()->user()->student?->enrollment->count() && Auth()->user()->student)
            <p class="text-white text-sm">You have not enrolled in any course yet. Choose one of the following
                course to enroll</p>
        @endif
    </div>
</div>

@role('student')
    @if(!Auth()->user()->student)
        <livewire:student-enrollment-form/>
    @endif
@endrole


@if(!Auth()->user()->student?->enrollment->count() && Auth()->user()->student)
    <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 border-[1px] border-primaryDark bg-white p-4 gap-4">
        @foreach(App\Models\CourseSchedule::all() as $schedule)
            <div class=" flex flex-col bg-gray-100 shadow-md shadow-gray-300 text-center  rounded-[3px]">
                <div class="w-full bg-primaryDark text-white p-2 rounded-t-[3px]">
                      <span class="font-semibold">{{ $schedule->course->name }}({{ $schedule->year }} Year) </span>
                </div>
                <div class="border-b-[1px] border-primaryDark p-2">
                    <span class="font-semibold text-primaryDark">Submission Date:</span>
                    <div class="text-black/80">{{ $schedule->submission_from->format('d-m-Y') }} to {{ $schedule->submission_till->format('d-m-Y') }}</div>
                </div>
                <div class="border-b-[1px] border-primaryDark p-2">
                    <span class="font-semibold text-primaryDark">Late Fee From:</span>
                    <div class="text-black/80">{{ $schedule->late_fee_starts_from->format('d-m-Y') }}</div>
                </div>
                @php
                    $student = auth()->user()->student;
                @endphp

                <div class="p-2 bg-{{$student->documents()->count() && $student->education()->count()?'green':'red'}}/60 rounded-b-[3px] w-full">
                    @if($student->documents()->count() && $student->education()->count())
                        <a href="{{ route('student-enrollment',[auth()->user()->student, $schedule]) }}" class="mt-4 w-full bg-primaryDark/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000">
                            <i class="fa fa-arrow-right"></i> Enroll Now
                        </a>
                    @else
                        <span class="  text-sm text-red font-semibold">Add All the Documents and Education Details to Enroll</span>
                    @endif
                </div>



            </div>
        @endforeach
    </div>
@endif
