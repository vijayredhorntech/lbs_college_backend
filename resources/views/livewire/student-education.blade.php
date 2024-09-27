<div class="px-4 py-6 w-full">
        <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                  Education Details
                </span>

            <span  wire:click="addForm" class=" w-max bg-white/90 rounded-[3px] text-primaryDark px-4 py-1 font-semibold text-sm border-[1px] border-white/90 hover:bg-white transition ease-in duration-2000">
                Add More
            </span>
        </div>
        <div class="p-4 bg-white">
            <form wire:submit.prevent="submitForm" class="">
                @foreach($form as $index => $item)
                    <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-2">

                        <div class="w-full flex flex-col gap-1">
                            <label for="examination_name_{{ $index }}" class="font-semibold text-sm text-black">Examination Name</label>
                            <input type="text" placeholder="Examination Name" id="examination_name_{{ $index }}" wire:model="form.{{ $index }}.examination_name" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            @error('form.'.$index.'.examination_name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="result_{{ $index }}" class="font-semibold text-sm text-black">Result</label>
                            <input type="text" placeholder="Result" id="result_{{ $index }}" wire:model="form.{{ $index }}.result" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            @error('form.'.$index.'.result') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="year_month_of_passing_{{ $index }}" class="font-semibold text-sm text-black">Year/Month of Passing</label>
                            <input type="text" placeholder="Year of passing" id="year_month_of_passing_{{ $index }}" wire:model="form.{{ $index }}.year_month_of_passing" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            @error('form.'.$index.'.year_month_of_passing') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="roll_number_{{ $index }}" class="font-semibold text-sm text-black">Roll Number</label>
                            <input type="text" placeholder="Roll No" id="roll_number_{{ $index }}" wire:model="form.{{ $index }}.roll_number" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            @error('form.'.$index.'.roll_number') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="board_university_{{ $index }}" class="font-semibold text-sm text-black">Board/ University</label>
                            <input type="text" placeholder="Board/ University" id="board_university_{{ $index }}" wire:model="form.{{ $index }}.board_university" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            @error('form.'.$index.'.board_university') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="name_of_institution_{{ $index }}" class="font-semibold text-sm text-black">Name of Institute</label>
                            <input type="text" placeholder="Name of institute" id="name_of_institution_{{ $index }}" wire:model="form.{{ $index }}.name_of_institution" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            @error('form.'.$index.'.name_of_institution') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="obtained_total_marks_{{ $index }}" class="font-semibold text-sm text-black">Total Marks Obtained</label>
                            <input type="text" placeholder="Total marks obtained" id="obtained_total_marks_{{ $index }}" wire:model="form.{{ $index }}.obtained_total_marks" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            @error('form.'.$index.'.obtained_total_marks') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="cgpa_{{ $index }}" class="font-semibold text-sm text-black">CGPA</label>
                            <input type="text" placeholder="CGPA" id="cgpa_{{ $index }}" wire:model="form.{{ $index }}.cgpa" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            @error('form.'.$index.'.cgpa') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="percentage_{{ $index }}" class="font-semibold text-sm text-black">Percentage</label>
                            <input type="text" placeholder="Percentage" id="percentage_{{ $index }}" wire:model="form.{{ $index }}.percentage" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            @error('form.'.$index.'.percentage') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full flex flex-col gap-1">
                            <label for="subjects_{{ $index }}" class="font-semibold text-sm text-black">Subjects</label>
                            <input type="text" placeholder="Subjects" id="subjects_{{ $index }}" wire:model="form.{{ $index }}.subjects" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            @error('form.'.$index.'.subjects') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full flex items-end gap-1 ">
                            <span
                                wire:click="removeForm({{ $index }})"
                                class="w-max bg-red/90 rounded-[3px] text-white px-4 py-1 font-semibold text-sm border-[1px] border-red/90 hover:bg-red transition ease-in duration-2000"
                            >Remove</span>
                        </div>

                    </div>
                @endforeach
                <div class="mt-4 w-full flex justify-end">
                    <button type="submit" class="w-max bg-primaryDark/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000">
                        Save
                    </button>
                </div>
            </form>

        </div>
    </div>










