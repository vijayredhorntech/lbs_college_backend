
<div class="w-full">
    <div class="px-4 py-6 w-full">

        <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                    New Course
                </span>

        </div>
        <div class="bg-white p-4">
            <form wire:submit.prevent="save" class="flex flex-col" enctype="multipart/form-data">
               <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-2">
                   <div class="w-full flex flex-col gap-1">
                       <label for="courseName" class="font-semibold text-sm text-black">Course Name</label>
                       <input id="courseName" placeholder="Course Name" type="text"  wire:model="form.name" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                       {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                   </div>

                   <div class="w-full flex flex-col gap-1">
                       <label for="courseDescription" class="font-semibold text-sm text-black">Course Description</label>
                       <textarea id="courseDescription" placeholder="Course Description" type="time" rows="1"  wire:model="form.description" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        </textarea>
                       {{--                    @error('classTimeStart') <span class="text-red/70 text-sm">{{ $message }}</span> @enderror--}}
                   </div>
               </div>


                <div class="w-full flex items-end justify-end mt-4">
                    <button type="submit" class="w-max bg-primaryDark/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000">Create Course</button>
                </div>
            </form>

        </div>
    </div>
</div>


