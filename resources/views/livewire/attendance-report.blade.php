<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Attendance Report ({{ $facultyClass->subject->name }} | {{ $facultyClass->faculty->name }}) </h1>

    <!-- Month Selector -->
    <div class="mb-4">
        <label for="month" class="block mb-2">Select Month</label>
        <select wire:model="selectedMonth" class="border rounded px-4 py-2 w-full">
            <option value="">All Months</option>
            @foreach(range(1, 12) as $month)
                <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->format('F') }}</option>
            @endforeach
        </select>
    </div>

    <!-- Search Box -->
    <div class="mb-4 flex">
        <input type="text" wire:model="searchTerm" placeholder="Search by student name or roll number" class="border rounded-l px-4 py-2 w-full" />
        <button wire:click="searchAttendance" class="bg-primaryDark text-white rounded-r px-4 py-2">Search</button>
    </div>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
        <tr>
            <th class="border px-4 py-2">Student Name</th>
            <th class="border px-4 py-2">Student Roll Number</th>
            @foreach($uniqueDays as $day)
                <th class="border px-4 py-2">{{ \Carbon\Carbon::parse($day)->format('d M, Y') }}</th>
            @endforeach
            <th class="border px-4 py-2">Total</th>
            <th class="border px-4 py-2">Fine</th>
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
                <td class="border px-4 py-2">{{ $student->full_name }}</td>
                <td class="border px-4 py-2">{{ $student->uni_roll_number }}</td>
                @foreach($uniqueDays as $day)
                    @php
                        $attendance = $attendances->firstWhere('lecture_date', \Carbon\Carbon::parse($day));
                    @endphp
                    <td class="border px-4 py-2 text-center">
                        @if($attendance)
                            @if($attendance->attended)
                                @php
                                    $presentCount++;
                                @endphp
                                <span class="text-green font-bold">P</span>
                            @else
                                @php
                                    $absentCount++;
                                @endphp
                                <span class="text-red font-bold">A</span>
                            @endif
                        @else
                            @php
                                $presentCount++;
                            @endphp
                            <span class="text-green font-bold">P</span>
                        @endif
                    </td>
                @endforeach
                <td class="border px-4 py-2 text-center">
                    <div class="flex flex-col">
                        <span>
                            Total: <span class="font-bold">{{ $presentCount + $absentCount }}</span>
                        </span>
                        <span>
                            Present: <span class="text-green font-bold">{{ $presentCount }}</span>
                        </span>
                        <span>
                            Absent: <span class="text-red font-bold">{{ $absentCount }}</span>
                        </span>
                    </div>
                </td>
                <td class="border px-4 py-2 text-center">{{ $absentCount * 150 }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
