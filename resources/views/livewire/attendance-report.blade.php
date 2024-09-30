<div>
    <div class="w-full">
        <div class="px-4 py-6 w-full">

            <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                   Attendance Report ({{ $facultyClass->subject->name }} | {{ $facultyClass->faculty->name }})
                </span>

            </div>
            <div class="">
                <div class="w-full p-4 bg-white rounded-md shadow-lg shadow-gray-400/50">
                    <div class="w-full grid lg:grid-cols-3 md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-4">
                        <div class="w-full flex flex-col gap-1">
                            <label for="subject" class="font-semibold text-sm text-black">Select Month</label>
                            <select id="subject" wire:model="selectedMonth" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                <option value="">All Months</option>
                                @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->format('F') }}</option>
                                @endforeach
                            </select>
                            @error('subjectId') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="w-full flex flex-col gap-1">
                            <label for="classTimeEnd" class="font-semibold text-sm text-black">Search by Student</label>
                            <input id="classTimeEnd" type="text" wire:model="searchTerm" placeholder="Search by student name or roll number"  class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        </div>


                    </div>
                    <div class="w-full flex items-end justify-end">
                        <button type="button" wire:click="searchAttendance" class="w-max bg-primaryDark/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000">Search</button>
                    </div>

                </div>

            </div>
        </div>
    </div>



    <div class="px-4 py-2 w-full">

        <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                   Attendance Report Table
                </span>
        </div>
        <div class="overflow-x-auto w-full">
            <table class="w-full  bg-white border border-gray-300">
                <thead>
                <tr class="bg-gradient-to-b from-primaryLight/30 from-10% via-primaryLight/80 via-60% to-primaryLight/30 to-90%">
                    <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5 text-xs">Student Name</th>
                    <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5 text-xs">Student Roll Number</th>
                    @foreach($uniqueDays as $day)
                        <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5 text-xs text-center" style="vertical-align: bottom;"> <span style="writing-mode: vertical-lr;-webkit-writing-mode: vertical-lr;
    -webkit-transform: rotate(-180deg);
    -moz-transform: rotate(-180deg);
    -o-transform: rotate(-180deg);
    transform: rotate(-180deg);">{{ \Carbon\Carbon::parse($day)->format('d M, Y') }}</span></th>
                    @endforeach
                    <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5 text-xs text-center">Total (<span class="text-green">P</span>/ <span class="text-red">A</span>)</th>
                    <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5 text-xs text-center">Fine</th>
                </tr>
                </thead>
                <tbody>
                @foreach($attendanceData->groupBy('student_id') as $studentId => $attendances)
                    @php
                        $student = $attendances->first()->student;
                        $presentCount = 0;
                        $absentCount = 0;
                    @endphp
                    <tr>
                        <td class="border-[1px] border-primaryDark px-4 text-sm" style="width: 200px">{{ $student->full_name }}</td>
                        <td class="border-[1px] border-primaryDark px-4 text-sm" style="width: 200px">{{ $student->uni_roll_number }}</td>
                        @foreach($uniqueDays as $day)
                            @php
                                $attendance = $attendances->firstWhere('lecture_date', \Carbon\Carbon::parse($day));
                            @endphp
                            <td class="border-[1px] border-primaryDark p-2 text-center" style="width: 20px">
                                @if($attendance)
                                    @if($attendance->attended)
                                        @php
                                            $presentCount++;
                                        @endphp
                                        <span class="text-green font-semibold">P</span>
                                    @else
                                        @php
                                            $absentCount++;
                                        @endphp
                                        <span class="text-red font-semibold">A</span>
                                    @endif
                                @else
                                    @php
                                        $presentCount++;
                                    @endphp
                                    <span class="text-green font-semibold">P</span>
                                @endif
                            </td>
                        @endforeach
                        <td class="border-[1px] border-primaryDark px-4 text-sm text-center" style="width: 50px">
                            <div class="flex flex-col">
                                {{--                        <span>--}}
                                {{--                            Total: <span class="font-bold">{{ $presentCount + $absentCount }}</span>--}}
                                {{--                        </span>--}}
                                <span><span class="text-green">{{ $presentCount }}</span>/<span class="text-red">{{ $absentCount }}</span></span>

                            </div>
                        </td>
                        <td class="border-[1px] border-primaryDark px-4 text-sm text-center" style="width: 100px">{{ $absentCount * 150 }} ₹</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
    </div>

</div>


