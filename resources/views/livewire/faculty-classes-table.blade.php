<div>
    <div class="table-container w-full overflow-x-auto bg-white px-4 py-8 shadow-lg shadow-black/10">
      <table class="w-[1500px] border-[1px] border-primaryDark border-collapse mx-auto">
        <tr class="bg-gradient-to-b from-primaryLight/30 from-10% via-primaryLight/80 via-60% to-primaryLight/30 to-90%">
            <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5" >SR. NO.</th>
            <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5" >SUBJECT</th>
            <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5" >FACULTY</th>
            <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5" >START TIME</th>
            <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5" >END TIME</th>
            <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5" >DAYS</th>
            <th class="border-[1px] border-primaryDark text-[15px] px-4 text-left py-1.5" >ACTION</th>
        </tr>
        @forelse($classes as $class)
            <tr>
                <td class="border-[1px] border-primaryDark px-4" style="width: 100px">{{ $loop->iteration }}</td>
                <td class="border-[1px] border-primaryDark px-4" style="width: 200px">{{ $class->subject->name }}</td>
                <td class="border-[1px] border-primaryDark px-4" style="width: 150px">{{ $class->faculty->name }}</td>
                <td class="border-[1px] border-primaryDark px-4" style="width: 150px">{{ $class->class_time_start->format('H:i') }}</td>
                <td class="border-[1px] border-primaryDark px-4" style="width: 150px">{{ $class->class_time_end->format('H:i') }}</td>
                <td class="border-[1px] border-primaryDark px-4" style="width: 500px">{{ implode(', ', $class->class_days) }}</td>
                <td class="border-[1px] border-primaryDark px-4" style="width: 150px">
                    <a href="{{ route('faculty-attendance-report',$class->id) }}" class="w-max bg-yellow/80 rounded-[3px] text-black px-2 py-1 font-semibold text-md border-[1px] border-yellow hover:bg-yellow transition ease-in duration-2000"><i class="fa fa-file"></i>Report</a>
                    <a href="{{ route('faculty-mark-attendance',$class->id) }}" class="w-max bg-green/80 rounded-[3px] text-white px-2 py-1 font-semibold text-md border-[1px] border-green hover:bg-green transition ease-in duration-2000"><i class="fa fa-file-pen"></i></a>
                    <a href="{{ route('faculty-class-form',$class->id) }}" class="w-max bg-blue/80 rounded-[3px] text-white px-2 py-1 font-semibold text-md border-[1px] border-blue hover:bg-blue transition ease-in duration-2000"><i class="fa fa-pencil"></i></a>
                    <button wire:click="delete({{ $class->id }})" class="w-max bg-red/80 rounded-[3px] text-white px-2 py-1 font-semibold text-md border-[1px] border-red hover:bg-red transition ease-in duration-2000"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @empty
            <tr>
                <td class="border-[1px] border-primaryDark px-4" colspan="6">No classes found.</td>
            </tr>
        @endforelse
    </table>
    </div>

    <div class="mt-4">
        {{ $classes->links() }}
    </div>
</div>
