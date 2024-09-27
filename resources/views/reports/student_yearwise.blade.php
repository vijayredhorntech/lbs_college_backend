
<x-app-layout>
    <div class="px-4 py-6 w-full">
        <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                    Students Year Wise List
                </span>
        </div>
        <div class="p-4 bg-white">
            <form method="GET" action="{{ route('students_yearwise') }}" class="flex gap-4 flex-wrap">
                <div class=" flex flex-col">
                    <label for="year" class="font-semibold text-sm text-primaryDark">Session Year:</label>
                    <select id="year" name="year" class="text-sm px-6 py-1 border-[1px] border-primaryDark rounded-sm focus:outline-none focus:ring-0 focus:border-[1px] focus:border-primaryDark">
                        <option value="">-- Select Year --</option>
                        <option value="2021" {{ $year == 2021 ? 'selected' : '' }}>2021</option>
                        <option value="2022" {{ $year == 2022 ? 'selected' : '' }}>2022</option>
                        <option value="2023" {{ $year == 2023 ? 'selected' : '' }}>2023</option>
                        <option value="2024" {{ $year == 2024 ? 'selected' : '' }}>2024</option>
                    </select>
                </div >
                <div class="flex flex-col justify-end">
                    <button type="submit" class=" submit font-semibold w-max h-max text-sm px-6 py-1 bg-gradient-to-b from-primaryLight/30 from-10% via-primaryLight/80 via-60% to-primaryLight/30 to-90% border-[1px] border-primaryDark rounded-sm shadow-lg shadow-black/10">
                        Get Student
                    </button>
                </div>
            </form>




            <div class="table-container w-full overflow-x-auto mt-6">
                <table class="w-full border-[1px] border-primaryDark border-collapse ">
                    <tr class="bg-gradient-to-b from-primaryLight/30 from-10% via-primaryLight/80 via-60% to-primaryLight/30 to-90%  ">
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 30px;"> ID</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 70px;"> Photo</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 150px;"> Name</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 100px;"> Date of Birth</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 60px;"> Gender</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 100%;"> Email</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 150px;"> Phone</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 100%;"> Guardian/Father's Name</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 120px;"> Aadhar Number</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 120px;"> PAN Number</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 80px;"> Nationality</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 80px;"> Religion</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 300px;"> Permanent Address</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 140px;"> Father's Phone</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 100px;"> University Roll No.</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 110px;"> University Reg. No.</div>
                        </th>
                        <th class="w-full border-[1px] border-primaryDark text-[15px] px-4">
                            <div style="width: 140px;"> Club Name</div>
                        </th>

                    </tr>
                    @foreach ($StudentList as $student)
                        <tr>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->id }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4"><img
                                    src="{{ $student->profile_photo }}" alt="Photo"
                                    class="rounded-full h-[50px] w-[50px] object-cover"></td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d/m/Y') }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->gender }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->email }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->phone }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->guardian_father_name }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->aadhar_number }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->pan_number }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->nationality }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->religion }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->permanent_address }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->father_phone }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->uni_roll_number }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->uni_registration_no }}</td>
                            <td class="w-full border-[1px] border-primaryDark px-4">{{ $student->club_name }}</td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</x-app-layout>



