<x-app-layout>
    <div class="px-4 py-6 w-full">

        <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                   Schedule List
                </span>

            <a href="{{ route('schedule-form') }}" class=" w-max bg-white/90 rounded-[3px] text-primaryDark px-4 py-1 font-semibold text-sm border-[1px] border-white/90 hover:bg-white transition ease-in duration-2000">
                New Schedule
            </a>
        </div>
        <div class="p-4 bg-white">
            <livewire:schedule-table/>

        </div>
    </div>

</x-app-layout>



