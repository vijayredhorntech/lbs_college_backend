<div class="w-full">
    <div class="px-4 py-6 w-full">

        <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                   Add Class
                </span>

        </div>
        <div class="">
            <form wire:submit.prevent="save" class="w-full p-4 bg-white rounded-md shadow-lg shadow-gray-400/50">
                @if($isEditMode)
                    <input type="hidden" wire:model="facultyClassId">
                @endif

                <div class="w-full grid lg:grid-cols-3 md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-4">
                    <div class="w-full flex flex-col gap-1">
                        <label for="faculty" class="font-semibold text-sm text-black">Faculty</label>
                        <select id="faculty" wire:model="facultyId" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark" wire:change="updateSubjects()">
                            <option value="">Select Faculty</option>
                            @foreach($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                            @endforeach
                        </select>
                        @error('facultyId') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label for="subject" class="font-semibold text-sm text-black">Subject</label>
                        <select id="subject" wire:model="subjectId" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            <option value="">Select Subject</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @error('subjectId') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label for="classTimeStart" class="font-semibold text-sm text-black">Class Time Start</label>
                        <input id="classTimeStart" type="time" wire:model="classTimeStart" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label for="classTimeEnd" class="font-semibold text-sm text-black">Class Time End</label>
                        <input id="classTimeEnd" type="time" wire:model="classTimeEnd" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        @error('classTimeEnd') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label class="font-semibold text-sm text-black">Class Days</label>
                        <div class="flex flex-wrap gap-1">
                            <label class="text-sm font-semibold text-black/70">
                                <input type="checkbox" value="Monday" wire:model="classDays" class="rounded-sm border-primaryDark text-primaryDark shadow-sm focus:border-primaryDark focus:ring-0 focus:outline-none disabled:opacity-50 mr-2" />
                                Monday
                            </label>
                            <label class="text-sm font-semibold text-black/70">
                                <input type="checkbox" value="Tuesday" wire:model="classDays" class="rounded-sm border-primaryDark text-primaryDark shadow-sm focus:border-primaryDark focus:ring-0 focus:outline-none disabled:opacity-50 mr-2" />
                                Tuesday
                            </label>
                            <label class="text-sm font-semibold text-black/70">
                                <input type="checkbox" value="Wednesday" wire:model="classDays" class="rounded-sm border-primaryDark text-primaryDark shadow-sm focus:border-primaryDark focus:ring-0 focus:outline-none disabled:opacity-50 mr-2" />
                                Wednesday
                            </label>
                            <label class="text-sm font-semibold text-black/70">
                                <input type="checkbox" value="Thursday" wire:model="classDays" class="rounded-sm border-primaryDark text-primaryDark shadow-sm focus:border-primaryDark focus:ring-0 focus:outline-none disabled:opacity-50 mr-2" />
                                Thursday
                            </label>
                            <label class="text-sm font-semibold text-black/70">
                                <input type="checkbox" value="Friday" wire:model="classDays" class="rounded-sm border-primaryDark text-primaryDark shadow-sm focus:border-primaryDark focus:ring-0 focus:outline-none disabled:opacity-50 mr-2" />
                                Friday
                            </label>
                            <label class="text-sm font-semibold text-black/70">
                                <input type="checkbox" value="Saturday" wire:model="classDays" class="rounded-sm border-primaryDark text-primaryDark shadow-sm focus:border-primaryDark focus:ring-0 focus:outline-none disabled:opacity-50 mr-2" />
                                Saturday
                            </label>
                            <label class="text-sm font-semibold text-black/70">
                                <input type="checkbox" value="Sunday" wire:model="classDays" class="rounded-sm border-primaryDark text-primaryDark shadow-sm focus:border-primaryDark focus:ring-0 focus:outline-none disabled:opacity-50 mr-2" />
                                Sunday
                            </label>
                        </div>
                        @error('classDays') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror
                    </div>

                </div>
                    <div class="w-full flex items-end justify-end">
                        <button type="submit" class="w-max bg-primaryDark/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000">{{ $isEditMode ? 'Update Class' : 'Create Class' }}</button>
                    </div>

            </form>

        </div>
    </div>
</div>
