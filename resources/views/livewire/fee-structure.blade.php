
    <div class="px-4 py-6 w-full">
        <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                    Fee Structure
                </span>

        </div>
        <div class="p-4 bg-white">
            @php
                $groupedFeeStructures = $feeStructures->groupBy('category');
            @endphp

            @foreach($groupedFeeStructures as $category => $fees)
                <div class="mb-6">
                    <div class="w-full bg-primaryDark/70 text-white p-2 rounded-t-[3px]">
                        <h2 class="text-lg font-bold">{{ $category }}</h2>
                    </div>
                   <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1">
                       @foreach($fees as $fee)
                           <div class="flex flex-col gap-1 bg-gray-100 border-[1px]  p-4">
                               <span class="font-semibold text-sm text-black">{{ $fee->fund_name }}</span>
                                   <input type="number" placeholder="{{ $fee->fund_name }}" class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark"
                                       wire:model.defer="feeModel.{{ $fee->id }}"
                                       value="{{ $feeModel[$fee->id] ?? $fee->amount }}"
                                   />
                           </div>
                       @endforeach
                   </div>
                </div>
            @endforeach

            @if($feeModel)
             <div class="flex justify-end">
                 <button class="w-max bg-primaryDark/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000" wire:loading.attr="disabled"
                         wire:click="save"
                 >
                     Save
                 </button>
             </div>
            @endif
        </div>
    </div>




