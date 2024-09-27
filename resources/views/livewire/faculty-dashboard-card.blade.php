<div class="w-full p-4 border-[1px] border-primaryDark/60 grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 bg-white">
    <div class="w-full rounded-[3px] bg-gray-100 shadow-lg shadow-black/10">
        <div class="flex items-center bg-primaryDark p-2 rounded-t-[3px]">
            <div class="text-xl font-bold text-white">{{ $faculty->name ?? 'Faculty Name' }}</div>
            <div class="ml-4 text-white/90 italic text-md">({{ $faculty->designation ?? 'Designation' }})</div>
        </div>

        <div class="p-2 rounded-b-[3px]">
            <div class="text-lg font-semibold text-primaryDark">Subjects:</div>
            <ul class="list-inside mt-2 pl-4">
                @forelse ($subjects as $subject)
                    <li class="text-sm font-medium italic text-red/60"> <i class="fa fa-angles-right"></i> {{ $subject->name }} ({{ $subject->code }})</li>
                @empty
                    <li class="text-sm font-medium italic text-red/60">No subjects assigned</li>
                @endforelse
            </ul>
        </div>

    </div>

</div>
