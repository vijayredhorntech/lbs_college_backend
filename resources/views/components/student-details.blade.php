<div id="pdfContent" class="print-only border-b border-slate-100 dark:border-slate-700">
    <div class="flex flex-col p-1 gap-2">
        <div class="text-xs justify-between flex">
            <div>
                <span class="font-bold ">Application Status:</span> <span class="font-bold">{{ $student->status }}</span>
            </div>
            <div>
                <span class="font-bold ">Generated On: </span> <span class="font-bold">{{ now()->format('d M Y h:i A') }}</span>
            </div>
        </div>

        <div class="text-center items-center flex flex-col">
            <x-application-logo/>

            <span class="text-xl font-bold">{{ config('app.name', 'Laravel') }}</span>
            <span class="font-semibold">{{ env('ADDRESS')  }}</span>
        </div>

        <div class="justify-between flex border-b-2 border-gray-800">
            <div>
                <span class="font-bold ">Application Number:</span> <span class="font-bold">24778541</span>
            </div> <div>
                <span class="font-bold bg-gray-200 p-1 rounded-sm">Admission Form</span>
            </div>
            <div>
                @php
                    $latestEnrollment = $student->enrollment()->latest()->first();
                @endphp
                <span class="font-bold ">Session Year: </span> <span class="font-bold">{{ $latestEnrollment->courseSchedule->academicYear->year_start->format('Y') . ' - ' . $latestEnrollment->courseSchedule->academicYear->year_end->format('Y') }}</span>
            </div>
        </div>

        <div class="flex font-bold">
            {{ $latestEnrollment->courseSchedule->course->name }}({{ $latestEnrollment->courseSchedule->year }})
        </div>
        <div class="flex gap-2 justify-between bg-gray-200 p-2">
            <div class="flex flex-col">
                                <span class="font-semibold border-b-2 border-gray-800 ">
                                    Personal Details
                                </span>
                <div class="flex flex-col">
                    <div class="justify-between">
                        <span class="font-bold">Name:</span> <span>{{ $student->fullName }}</span>
                    </div>
                    <div class="justify-between"><span class="font-bold">Email:</span> <span>{{ $student->email }}</span></div>
                    <div class="justify-between"><span class="font-bold">Date of Birth:</span> <span>{{ $student->date_of_birth->format('d M Y') }}</span></div>
                    <div>
                        {{ $student->date_of_birth->diff(now())->y . " years, " . $student->date_of_birth->diff(now())->m . " months, " . $student->date_of_birth->diff(now())->d . " days"}}
                    </div>
                    <div>
                        (Age as on {{now()->format('d F Y')}})
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-col">
                    <div class="justify-between">
                        <span class="font-bold">Applicant Status:</span> <span>{{ __('Active Student') }}</span>
                    </div>
                    <div class="justify-between"><span class="font-bold">Gender:</span> <span>{{ $student->gender }}</span></div>
                    <div class="justify-between"><span class="font-bold">Religion: </span> <span>{{ $student->religion }}</span></div>
                    <div class="justify-between"><span class="font-bold">Mobile: </span> <span>{{ $student->phone }}</span></div>
                    <div class="justify-between"><span class="font-bold">Aadhar: </span> <span>{{ $student->aadhar_number }}</span></div>

                </div>
            </div>
            <div>
                <img alt="" src="{{$student->profilePhoto}}" class="shrink-0 object-cover object-center rounded-md w-28 h-28">
            </div>

        </div>
        <div class="flex gap-2 justify-between">
            <div class="flex flex-col">
                                <span class="font-semibold border-b-2 border-gray-800 ">
                                    Academic Details
                                </span>
                <div class="flex flex-col">
                    <div class="flex justify-between">
                        <span class="font-bold">Assigned Subject Group:</span> <span>{{ $latestEnrollment->courseSchedule->course->name }}</span>
                    </div>
                    <div class="flex justify-between"><span class="font-bold">Club:</span> <span>{{ $student->club_name }}</span></div>
                    <div class="flex justify-between"><span class="font-bold">Latest Percentage:</span> <span>{{ $student->education()?->latest()?->first()->percentage }}</span></div>
                    <div class="flex justify-between"><span class="font-bold">Category:</span> <span>{{ __('General') }}</span></div>

                </div>
            </div>

                                        <div>
                                            <img alt="" src="{{$student->signaturePhoto}}" class="shrink-0 object-cover object-center rounded-md w-28 h-28">
                                        </div>

        </div>
        <div class="">
            <table class="table-auto bordered">
                <thead class="text-semibold bg-gray-200 border-[1px] border-gray-400">
                <tr>
                    <th>Examination</th>
                    <th>Result</th>
                    <th>Year & month of passing</th>
                    <th>Roll No</th>
                    <th>Univ/Board</th>
                    <th>Name Of Institution</th>
                    <th>Obtained/Total Marks</th>
                    <th>CGPA</th>
                    <th>Percentage</th>
                    <th>Subjects</th>
                </tr>
                </thead>
                <tbody>
                @foreach($student->education as $education)
                    <tr class="font-xs border-[1px] border-gray-400 hover:bg-gray-100 text-center">
                        <td>{{ $education->examination_name }}</td>
                        <td>{{ $education->result }}</td>
                        <td>{{ $education->year_month_of_passing }}</td>
                        <td>{{ $education->roll_number }}</td>
                        <td>{{ $education->board_university }}</td>
                        <td>{{ $education->name_of_institution }}</td>
                        <td>{{ $education->obtained_total_marks }}</td>
                        <td>{{ $education->cgpa }}</td>
                        <td>{{ $education->percentage }}</td>
                        <td>{{ $education->subjects }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="flex gap-2 justify-between">
            <div class="flex flex-col">
                                <span class="font-semibold border-b-2 border-gray-800 ">
                                    Family Details
                                </span>
                <div class="flex flex-col">
                    <div class="justify-between">
                        <span class="font-bold">Father's Name:</span> <span>{{ $student->guardian_father_name }}</span>
                    </div>
                    <div class="justify-between"><span class="font-bold">Occupation:</span> <span>{{ $student->father_occupation }}</span></div>
                    <div class="justify-between"><span class="font-bold">Mother's Name:</span> <span>{{ $student->mother_name }}</span></div>

                </div>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-col">
                    <div class="justify-between">
                        <span class="font-bold">Yearly Income:</span> <span>{{ $student->yearly_income }}</span>
                    </div>
                    <div class="justify-between"><span class="font-bold">Mobile:</span> <span>{{ $student->father_phone }}</span></div>

                </div>
            </div>
        </div>
        <div class="flex gap-2 justify-between">
            <div class="flex flex-col">
                                <span class="font-semibold border-b-2 border-gray-800 ">
                                    Address Details
                                </span>
                <div class="flex flex-col">
                    <div class="justify-between">
                        <span class="font-bold">Domicile:</span> <span>{{ $student->domicile }}</span>
                    </div>
                    <div class="justify-between"><span class="font-bold">Permanent Address:</span> <span>{{ $student->permanent_address }}</span></div>

                </div>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-col">
                    <div class="justify-between">
                        <span class="font-bold">Yearly Nationality</span> <span>{{ $student->nationality }}</span>
                    </div>
                    <div class="justify-between"><span class="font-bold">Correspondence Address:</span> <span>{{ $student->temp_address }}</span></div>

                </div>
            </div>
        </div>



        <div class="flex flex-col p-6 border-2 border-black text-black page-break">
            <div class="text-center"><span class="font-bold">DECLARATION BY THE STUDENT</span></div>
            <ol class="list-decimal text-xs">
                <li> I _______________________, declare that I have carefully read the instructions and state that the entries made by me in this form are correct to the
                    best of my knowledge and nothing has been concealed. I understand that my admission is provisional and liable to be cancelled if any of the statements
                    made by me is found incorrect.</li>
                <li> I undertake to observe proper standards of academic conduct and will not indulge in any activity that goes against the discipline of the
                    college.</li>
                <li> I shall abide by the rules and regulations of the College and Himachal Pradesh University.</li>
                <li> I will be responsible for the timely payment of fees and all other dues.</li>
                <li> I am fully aware that ragging, smoking and drinking liquor is strictly prohibited in the College and the Hostel. If I am found guilty of indulging in these
                    activities, I shall be liable for punishment, disciplinary actions and expulsion from the Hostel and the College.</li>
                <li> I solemnly undertake that I am not facing any disciplinary proceedings and have not been disqualified by any Board/University.</li>
                <li> I hereby declare that the particulars/entry made in the form and documents uploaded are from the original certificates. In case any of them found
                    incorrect or fake, I may be summoned to present my case in the presence of the Principal/Committee, failing which my candidature may be cancelled
                    without further notice.</li>
            </ol>
            <div class="flex justify-between mt-8 text-xs">
                                <span>
                                    Date
                                </span>
                <span class="border-t-2 border-black">
                                    (Full signature of the candidate in presence of committee)
                                </span>
            </div>
        </div>
        <div class="flex flex-col p-6 border-2 border-black text-black">
            <div class="text-center"><span class="font-bold">DECLARATION BY THE PARENT / GUARDIAN</span></div>
            <p class="text-xs">I _____________________________ (parent/guardian) hold myself responsible for the good conduct and behaviour of my ward
                ______________________________ as a student of the college and for payment of all his/her dues during his/her stay in the College. I undertake
                responsibility that my ward will attend the classes regularly and punctually to complete the required percentage of attendance as per the Himachal Pradsh
                University Rules, failing which he/she will be rendered ineligible for the final examinations</p>
            <div class="flex justify-end mt-8 text-xs">

                                <span class="border-t-2 border-black">
                                    (Full signature of the Parent/ Guardian)
                                </span>
            </div>
        </div>
        <div class="flex flex-col p-6 border-2 border-black text-black">
            <div class="text-center"><span class="font-bold">DOCUMENTS UPLOADED</span></div>
            <div class="grid grid-cols-2 gap-2 justify-between">
                @php
                    $documents = [
        'National ID',
        'Aadhar Card',
        'PAN Card',
        'Voter ID',
        'Passport',
        'Birth Certificate',
        'Other',
        "Matric Marks Sheet",
        "10+2 Marks Sheet",
        "Character certificate in original of the institution last attended",
        "Original migration certificate if other than HP board",
        "Bonafide Certificate",
        "Category Certificate (SC/ST/OBC/EWS/Minority Community)",
        "Certificate of IRDP/BPL/PH/WFF/ExMan/WES & Others",
        "Physical Challenged if yes attach certificates",
        "Certificate of Single Girl Child"
    ];
                @endphp
                @foreach($documents as $document)
                    <div class="flex justify-between text-xs">
                        <span>{{ $document }}</span>
                        <span >
                                            <input type="checkbox" @if(in_array($document, $student->documents->pluck('document_name')->toArray())) checked @endif>
                                        </span>
                    </div>

                @endforeach
            </div>
        </div>
        <div class="flex flex-col p-6 border-2 border-black text-black">
            <div class="text-center"><span class="font-bold">FOR THE USE OF ADMISSION COMMITTEE</span></div>
            <div class="flex justify-between mt-8 text-xs">
                <div class="flex flex-col border-t-2 border-black">
                    <span>Signature of Applicant</span>
                    <span>(In the presence of Admission Committee)</span>
                </div>
                <div class="flex flex-col border-t-2 border-black">
                    <span>Signature</span>
                    <span>(Member)</span>
                </div>
                <div class="flex flex-col border-t-2 border-black">
                    <span>Signature</span>
                    <span>(Member)</span>
                </div>
                <div class="flex flex-col border-t-2 border-black">
                    <span>Signature and Date</span>
                    <span>(Convener)</span>
                </div>

            </div>
        </div>
        <div class="flex flex-col p-6 border-2 border-black text-black page-break">
            <div class="text-center"><span class="font-bold">RECOMMENDATION FOR ADMISSION BY Admission Committee</span></div>
            <div class="text-center"><span class="font-bold">{{ $latestEnrollment->courseSchedule->course->name }}({{ $latestEnrollment->courseSchedule->year }})</span></div>
            <div class="flex justify-between mt-8 text-xs">
                <div class="flex flex-col border-t-2 border-black">
                    <span>Signature</span>
                    <span>Dean</span>
                </div>


                <div class="flex flex-col border-t-2 border-black">
                    <span>Signature</span>
                    <span>Principal</span>
                </div>

            </div>
        </div>

        <div class="flex flex-col p-6  text-black">
            <div class="text-center"><span class="font-bold">FOR THE USE OF PRINCIPAL</span></div>
            <div class="text-center"><span class="font-bold text-xs">ADMISSION GRANTED as per the recommendation of the Admission Committee</span></div>
            <div class="text-center"><span class="font-bold text-xs">Admission regularised on Roll-on-system as per recommendation of the Admission Committee Admission Committee</span></div>

        </div>


    </div>
    <div class="flex justify-between p-6 text-black ">
        <div>

        </div>
        <div class="flex flex-col text-xs">
            <span>Principal</span>
            <span>Saraswati Nagar College</span>
            <span>Lal Bahadur Shashtri</span>
            <span>Government Degree College,</span>
            <span>Saraswati Nagar Shimla</span>
            <span>Shimla Himachal Pradesh</span>
            <span>171206</span>
            </span>
        </div>
    </div>
</div>
