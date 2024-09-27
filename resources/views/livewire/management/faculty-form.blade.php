

<div class="w-full">
    <div class="px-4 py-6 w-full">

        <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                    {{ $faculty ? 'Edit Faculty' : 'New Faculty' }}
                </span>

        </div>
        <div class="bg-white p-4">
            <form wire:submit.prevent="save" class="flex flex-col" enctype="multipart/form-data">
                <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-2">
                    <div class="w-full flex flex-col gap-1">
                        <label for="facultyName" class="font-semibold text-sm text-black">Faculty Name *</label>
                        <input id="facultyName" placeholder="Faculty Name" type="text"  wire:model="form.name" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                    </div>
                    <div class="w-full flex flex-col gap-1">
                        <label for="designation" class="font-semibold text-sm text-black">Designation *</label>
                        <select wire:model="form.designation" id="designation"  class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            <option value="">Select designation</option>
                            <option value="Professor">Professor</option>
                            <option value="Associate Professor">Associate Professor</option>
                            <option value="Assistant Professor">Assistant Professor</option>
                            <option value="Lecturer">Lecturer</option>
                            <option value="Research Fellow">Research Fellow</option>
                        </select>
                    </div>
                    <div class="w-full flex flex-col gap-1">
                        <label for="phoneNumber" class="font-semibold text-sm text-black">Phone Number</label>
                        <input id="phoneNumber" placeholder="Phone Number" type="number"  wire:model="form.phone" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                    </div>
                    <div class="w-full flex flex-col gap-1">
                        <label for="emailAddress" class="font-semibold text-sm text-black">Email Address</label>
                        <input id="emailAddress" placeholder="Email Address" type="email"  wire:model="form.email" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                    </div>
                    <div class="w-full flex flex-col gap-1">
                        <label for="dateOfJoining" class="font-semibold text-sm text-black">Date of Joining</label>
                        <input id="dateOfJoining" placeholder="Date of Joining" type="date"  wire:model="form.date_of_joining" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                    </div>
                    <div class="w-full flex flex-col gap-1">
                        <label for="address" class="font-semibold text-sm text-black">Address *</label>
                        <input id="address" placeholder="Address" type="text" wire:model="form.address" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                    </div>
                    <div class="w-full flex flex-col gap-1 lg:col-span-1 md:col-span-2 sm:col-span-2">
                        <label for="photo" class="font-semibold text-sm text-black">Photo *</label>
                        <input id="photo" placeholder="Photo" type="file"  wire:model="form.photo" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                    </div>
                    <div class="w-full flex flex-col gap-1 lg:col-span-2 md:col-span-2 sm:col-span-2">
                        <label class="font-semibold text-sm text-black">Select Subjects</label>
                        <div class="flex flex-wrap gap-2">
                            @foreach($allSubjects as $subject)
                                <div class="flex items-center">
                                    <input type="checkbox" wire:model="selectedSubjects" value="{{ $subject->id }}" id="subject_{{ $subject->id }}" class="rounded-sm border-primaryDark text-primaryDark shadow-sm focus:border-primaryDark focus:ring-0 focus:outline-none disabled:opacity-50">
                                    <label for="subject_{{ $subject->id }}" class="ml-2 text-sm font-semibold text-black/70">{{ $subject->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('selectedSubjects') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>


                <div class="w-full flex items-end justify-end mt-4">
                    <button type="submit" class="w-max bg-primaryDark/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>



