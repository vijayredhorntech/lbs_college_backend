<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div
            class="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
            <header class="flex justify-between items-center px-5 py-4 border-b border-slate-100 dark:border-slate-700">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100">
                    Students Year Wise List
                </h2>
                <style>
            table {
            width: 100%;
            border-collapse: collapse;
            }
            table, th, td {
            border: 1px solid black;
            }
            th, td {
            padding: 8px;
                text-align: left;
            }
    </style>
</header>
<div class="grow px-5 border-b border-slate-100 dark:border-slate-700">
            <form method="GET" action="{{ route('religionwise') }}">
        <label for="year">Session Year:</label>
        <select id="year" name="year" >
            <option value="">-- Select Year --</option>
            <option value="2021" {{ $year == 2021 ? 'selected' : '' }}>2021</option>
            <option value="2022" {{ $year == 2022 ? 'selected' : '' }}>2022</option>
            <option value="2023" {{ $year == 2023 ? 'selected' : '' }}>2023</option>
            <option value="2024" {{ $year == 2024 ? 'selected' : '' }}>2024</option>
        </select>
        <button type="submit" class="submit bg-red-800 text-red-500">Get Student</button>
    </form>
    <div class="table-container w-full px-4 overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Photo</th>
                    <th>Signature</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mother's Name</th>
                    <th>Guardian/Father's Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>University Roll Number</th>
                    <th>University Registration Number</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Alternate Phone</th>
                    <th>Father's Phone</th>
                    <th>Club Name</th>
                    <th>Domicile</th>
                    <th>Aadhar Number</th>
                    <th>PAN Number</th>
                    <th>Nationality</th>
                    <th>Religion</th>
                    <th>Father's Occupation</th>
                    <th>Yearly Income</th>
                    <th>Permanent Address</th>
                    <th>Temporary Address</th>
                    <th>Is Expelled Before?</th>
                    <th>Expulsion Reason</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($StudentList as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->user_id }}</td>
                        <td><img src="{{ asset($student->photo) }}" alt="Photo" width="50" height="50"></td>
                        <td><img src="{{ asset($student->signature) }}" alt="Signature" width="50" height="50"></td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->mother_name }}</td>
                        <td>{{ $student->guardian_father_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->uni_roll_number }}</td>
                        <td>{{ $student->uni_registration_no }}</td>
                        <td>{{ $student->date_of_birth }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->alt_phone }}</td>
                        <td>{{ $student->father_phone }}</td>
                        <td>{{ $student->club_name }}</td>
                        <td>{{ $student->domicile }}</td>
                        <td>{{ $student->aadhar_number }}</td>
                        <td>{{ $student->pan_number }}</td>
                        <td>{{ $student->nationality }}</td>
                        <td>{{ $student->religion }}</td>
                        <td>{{ $student->father_occupation }}</td>
                        <td>{{ $student->yearly_income }}</td>
                        <td>{{ $student->permanent_address }}</td>
                        <td>{{ $student->temp_address }}</td>
                        <td>{{ $student->is_expelled_before ? 'Yes' : 'No' }}</td>
                        <td>{{ $student->expulsion_reason }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
        </div>

</x-app-layout>