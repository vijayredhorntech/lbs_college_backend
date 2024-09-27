<div class="px-4 py-6 w-full">
    <div
        class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                     Education Details
                </span>

        <span
            wire:click="addForm"
            class=" w-max bg-white/90 rounded-[3px] text-primaryDark px-4 py-1 font-semibold text-sm border-[1px] border-white/90 hover:bg-white transition ease-in duration-2000">
                Add More
            </span>
    </div>
    <div class="p-4 bg-white">
        <form wire:submit.prevent="submitForm" class="">
            @foreach($form as $index => $item)
                <div class="grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-2">
                    <div class="w-full flex flex-col gap-1">
                        <label for="document_type_{{ $index }}" class="font-semibold text-sm text-black">Document
                            Type</label>
                        <select
                            id="document_type_{{ $index }}"
                            wire:model="form.{{ $index }}.document_name"
                            class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                            <option value="">Select Document Type</option>
                            @foreach($documentTypes as $documentType)
                                <option value="{{ $documentType }}">{{ $documentType }}</option>
                            @endforeach
                        </select>
                        @error('form.'.$index.'.document_name') <span
                            class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <label for="document_number_{{ $index }}" class="font-semibold text-sm text-black">Document
                            Number</label>
                        <input placeholder="Document Number" type="text" id="document_number_{{ $index }}"
                               wire:model="form.{{ $index }}.document_number"
                               class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        @error('form.'.$index.'.document_number') <span
                            class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-full flex flex-col gap-1">
                        <label for="document_{{ $index }}" class="font-semibold text-sm text-black">Document</label>
                        <input placeholder="Upload File" type="file" id="document_{{ $index }}"
                               wire:model="form.{{ $index }}.document"
                               class="px-4 py-2 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                        @error('form.'.$index.'.document') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4 flex items-end">
                        <button type="button" wire:click="removeForm({{ $index }})"
                                class="w-max bg-red/90 rounded-[3px] text-white px-4 py-1 font-semibold text-sm border-[1px] border-red/90 hover:bg-red transition ease-in duration-2000">
                            Remove
                        </button>
                    </div>
                </div>
            @endforeach
            <div class="mt-4 flex w-full justify-end">
                <button type="submit"
                        class="w-max bg-primaryDark/80 rounded-[3px] text-white px-4 py-1.5 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000">
                    Save
                </button>
            </div>
        </form>

    </div>
</div>

