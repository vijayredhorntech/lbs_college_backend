<!-- resources/views/livewire/mark-attendance.blade.php -->
<div class="w-full">
    <div class="px-4 py-6 w-full">

        <div
            class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                   Student Attendance
                </span>

        </div>
        <div class="w-full bg-white p-4">
            <!-- Top section for class details and date selection -->
            <div class="w-full grid lg:grid-cols-4 bg-primaryDark/80 rounded-[3px]">
                 <div class="w-full flex items-center  p-2">
                        <span class="font-semibold text-white text-md  pr-2">Subject Name:
                          <span class="font-normal text-white/90 italic ">{{ $facultyClass->subject->name }}</span>
                        </span>
                 </div>
                <div class="w-full flex items-center  p-2">
                    <span class="font-semibold text-white text-md pr-2">Faculty Name:
                         <span class="font-normal text-white/90 italic ">{{ $facultyClass->faculty->name }}</span>
                       </span>
                </div>
                <div class="w-full flex items-center  p-2">
                    <span class="font-semibold text-white text-md pr-2">Time:
                       <span class="font-normal text-white/90 italic ">{{ now()->format('h:i A') }}</span>
                     </span>
                </div>
                <div class="w-full flex items-center  p-2">
                <form wire:submit.prevent="">
                <span class="font-semibold text-white text-md ">Date:
                    <input type="date" wire:model="attendanceDate"
                           class="ml-2 border border-gray-300 rounded px-2 py-1 text-sm text-primaryDark italic"/>
                </span>
                    <button wire:click="fetchStudents()"
                            class=" w-max bg-white/90 rounded-[3px] text-primaryDark px-2 py-0.5 font-semibold text-md border-[1px] border-white/90 hover:bg-white transition ease-in duration-2000">
                        Search
                    </button>
                </form>
                </div>
            </div>





            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2 py-4">
                <!-- Students Card -->
                <div class="bg-gradient-to-r from-primaryDark/80 to-primaryDark/20 p-6 rounded-lg shadow-lg flex items-center justify-between text-white">
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wider">Students</div>
                        <div class="text-3xl font-bold">{{ count($students) }}</div>
                    </div>
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
                        <i class="fa fa-users text-primaryDark text-3xl"></i>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-green/80 to-green/20 p-6 rounded-lg shadow-lg flex items-center justify-between text-white">
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wider">Present</div>
                        <div class="text-3xl font-bold">{{ $presentCount }}</div>
                    </div>
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
                        <i class="fa fa-check text-green text-3xl"></i>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-red/80 to-red/20 p-6 rounded-lg shadow-lg flex items-center justify-between text-white">
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wider">Absent</div>
                        <div class="text-3xl font-bold">{{ $absentCount }}</div>
                    </div>
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
                        <i class="fa fa-xmark text-red text-3xl"></i>
                    </div>
                </div>
            </div>


            <!-- Bulk actions -->
            <div class="w-full flex justify-end lg:flex-row md:flex-row sm:flex-row flex-col lg:gap-4 md:gap-4 sm:gap-4 gap-2 mt-4">
                <div class="w-full flex justify-between items-center mb-4">
                    <div class="flex items-center gap-2">
                        <input type="text" wire:model="search" placeholder="Search by student name or roll number"
                               class="border border-gray-300 rounded px-4 py-2 text-sm text-primaryDark italic w-64">
                        <button wire:click="searchStudents"
                                class="bg-primaryDark text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-primaryDark/80 transition duration-150 ease-in-out">
                            Search
                        </button>
                    </div>
                </div>
                <button wire:click="markAllExceptSelected('Present')"
                        class=" lg:w-max md:w-max sm:w-max w-full bg-blue/80 rounded-[3px] text-white px-2 py-0.5 font-semibold text-md border-[1px] border-blue hover:bg-blue transition ease-in duration-2000">
                    Mark All Present Except Selected
                </button>
                <button wire:click="markSelected('Present')"
                        class="lg:w-max md:w-max sm:w-max w-full bg-green/80 rounded-[3px] text-white px-2 py-0.5 font-semibold text-md border-[1px] border-green hover:bg-green transition ease-in duration-2000">Mark
                    Selected as Present
                </button>
                <button wire:click="markSelected('Absent')"
                        class="lg:w-max md:w-max sm:w-max w-full bg-red/80 rounded-[3px] text-white px-2 py-0.5 font-semibold text-md border-[1px] border-red hover:bg-red transition ease-in duration-2000">Mark
                    Selected as Absent
                </button>
            </div>



            <!-- Attendance table -->
            <table class="lg:w-[70%] md:w-[80%] w-full border-[1px] border-primaryDark border-collapse mx-auto mt-4">
                <tr class="bg-gradient-to-b from-primaryLight/30 from-10% via-primaryLight/80 via-60% to-primaryLight/30 to-90%">
                    <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5">
                        #
                    </th>
                    <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5">
                        Student
                    </th> <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5">
                        Roll No
                    </th>
                    <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5">
                        Attendance
                    </th>
                </tr>
                @foreach($students as $student)
                    <tr>
                        <td class="border-[1px] border-primaryDark px-4 py-1.5">
                            <input type="checkbox" wire:model="selectedStudents" value="{{ $student->id }}">
                        </td>
                        <td class="border-[1px] border-primaryDark px-4 py-1.5">{{ $student->full_name }}</td>
                        <td class="border-[1px] border-primaryDark px-4 py-1.5">{{ $student->uni_roll_number }}</td>
                        <td class=" text-{{ $attendance[$student->id] === 'Present' ? 'green' : 'red' }} border-[1px] border-primaryDark px-4 py-1.5 font-semibold">
                            {{ $attendance[$student->id] }}
                            <div class="flex gap-2">
                                <button wire:click="markAttendance({{ $student->id }}, 'Present')"
                                        class=" bg-green/80 rounded-[3px] text-white h-8 w-8 flex justify-center items-center rounded-full font-semibold text-md border-[1px] border-green hover:bg-green transition ease-in duration-2000">
                                    <i class="fa fa-check"></i>
                                </button>
                                <button wire:click="markAttendance({{ $student->id }}, 'Absent')"
                                        class=" bg-red/80 rounded-[3px] text-white h-8 w-8 flex justify-center items-center rounded-full font-semibold text-md border-[1px] border-red hover:bg-red transition ease-in duration-2000">
                                    <i class="fa fa-xmark"></i>
                                </button>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </table>
        </div>

    </div>
</div>
