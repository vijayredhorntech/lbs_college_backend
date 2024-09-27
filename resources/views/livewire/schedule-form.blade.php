<div class="w-full">
    <div class="px-4 py-6 w-full">

        <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                    New Schedule
                </span>

        </div>
        <div class="bg-white p-4">
            <form wire:submit.prevent="save" class="flex flex-col" enctype="multipart/form-data">

                    <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-2">
                        <div class="w-full flex flex-col gap-1">
                            <label for="courseId" class="font-semibold text-sm text-black">Course</label>
                            <select id="courseId" wire:model="form.course_id" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course['id'] }}">{{ $course['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="academicYearId" class="font-semibold text-sm text-black">Academic Year</label>
                            <select id="academicYearId" wire:model="form.academic_year_id" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                <option value="">Select Academic Year</option>
                                @foreach($academicYears as $year)
                                    <option value="{{ $year['id'] }}">{{ $year['name'] }}</option>
                                @endforeach
                            </select>
                            {{-- @error('form.academic_year_id') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror --}}
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="year" class="font-semibold text-sm text-black">Select Year</label>
                            <select id="year" wire:model="form.year" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                <option value="">Select Year</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            {{-- @error('form.year') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror --}}
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="submissionFrom" class="font-semibold text-sm text-black">Submission From</label>
                            <input id="submissionFrom" type="date"  wire:model="form.submission_from" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="submissionTill" class="font-semibold text-sm text-black">Submission Till</label>
                            <input id="submissionTill" type="date"  wire:model="form.submission_till" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="feeDepositeStart" class="font-semibold text-sm text-black">Fee Deposit Start</label>
                            <input id="feeDepositeStart" type="date"   wire:model="form.fee_deposit_start" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="feeDepositeEnd" class="font-semibold text-sm text-black">Fee Deposit End</label>
                            <input id="feeDepositeEnd" type="date"  wire:model="form.fee_deposit_end" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="lateFeeFrom" class="font-semibold text-sm text-black">Late Fee Starts From</label>
                            <input id="lateFeeFrom" type="date"  wire:model="form.late_fee_starts_from" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                        </div>
                        <div class="w-full flex flex-col gap-1 lg:col-span-4 md:col-span-2 sm:col-span-2">
                            <label class="font-semibold text-sm text-black">Core Subjects</label>
                            <div class="flex flex-wrap gap-2">
                                @foreach($subjects as $subject)
                                    <div class="flex items-center gap-2">
                                        <input type="checkbox" id="subject_{{ $subject['id'] }}" value="{{ $subject['id'] }}"
                                               wire:model="form.subjects"
                                               class="text-primaryDark border-primaryDark/60 rounded focus:ring-0 focus:outline-none">
                                        <label for="subject_{{ $subject['id'] }}" class="text-sm text-black">{{ $subject['name'] }}</label>
                                    </div>
                                @endforeach
                            </div>
                            {{-- @error('form.subjects') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror --}}
                        </div>
                    </div>



                <div class="flex flex-col gap-2 mt-4">
                    <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                            <span class="text-xl text-white/90 font-bold mb-1">
                                 Subject Groups
                            </span>
                            <span wire:click="addGroup" class="w-max bg-white/90 rounded-[3px] text-primaryDark px-4 py-1 font-semibold text-sm border-[1px] border-white/90 hover:bg-white transition ease-in duration-2000">
                                Add Group
                            </span>

                    </div>

                    <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-2">
                        @foreach($form['groups'] as $key => $group)
                            <div>
                                <span wire:click="removeGroup({{ $key }})" class="w-max bg-red/90 rounded-[3px] text-white px-4 py-1 font-semibold text-sm border-[1px] border-red/90 hover:bg-red transition ease-in duration-2000">
                                   Remove
                                </span>

                                <div class="flex flex-col bg-gray-100 p-2 rounded-[3px] mt-2">
                                    <div class="w-full flex flex-col gap-1">
                                        <label for="group_{{ $key }}" class="font-semibold text-sm text-black">Group</label>
                                        <select id="group_{{ $key }}" wire:model="form.groups.{{ $key }}.name" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                            <option value="">Select Group</option>
                                            <option value="Group A">Group A</option>
                                            <option value="Group B">Group B</option>
                                            <option value="Group C">Group C</option>
                                            <option value="Group D">Group D</option>
                                        </select>
                                        {{-- @error('form.groups.{{ $key }}.name') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror --}}
                                    </div>
                                    <div class="w-full flex flex-col gap-1">
                                        <label for="subject_{{ $key }}" class="font-semibold text-sm text-black">Subject</label>
                                        <select id="subject_{{ $key }}" wire:model="form.groups.{{ $key }}.course_subjects_id" multiple class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                            <option value="">Select Subject</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject['id'] }}">{{ $subject['name'] }}</option>
                                            @endforeach
                                        </select>
                                        {{-- @error('form.groups.{{ $key }}.course_subjects_id') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror --}}
                                    </div>




                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="w-full flex items-end justify-end mt-4">
                    <button type="submit" class="w-max bg-primaryDark/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>




