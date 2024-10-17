<div class="p-6">
    <form wire:submit.prevent="store" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="name" class="text-sm font-semibold text-gray-600">Name</label>
                <input type="text" wire:model="name" id="name" name="name" placeholder="Enter student name"
                       class="border border-gray-300 rounded px-4 py-2 text-sm text-gray-700 w-full focus:ring focus:ring-primaryDark transition duration-150 ease-in-out"/>
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="roll_number" class="text-sm font-semibold text-gray-600">Roll Number</label>
                <input type="text" wire:model="roll_number" id="roll_number" name="roll_number"
                       placeholder="Enter student roll number"
                       class="border border-gray-300 rounded px-4 py-2 text-sm text-gray-700 w-full focus:ring focus:ring-primaryDark transition duration-150 ease-in-out"/>
                @error('roll_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit"
                class="bg-primaryDark text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-primaryDark/80 transition duration-150 ease-in-out">
            Submit
        </button>
    </form>

    <!-- Success Message -->
    @if ($successMessage)
        <div class="mt-4 p-3 bg-green-100 text-green-800 rounded-md">
            {{ $successMessage }}
        </div>
    @endif

    <!-- Excel File Upload Section -->
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-700">Upload Students Excel</h3>
        <input type="file" wire:model="excelFile" accept=".xlsx,.xls"
               class="border border-gray-300 rounded px-4 py-2 text-sm text-gray-700 w-full focus:ring focus:ring-primaryDark transition duration-150 ease-in-out"/>
        @error('excelFile') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <button wire:click="upload"
                class="mt-2 bg-primaryDark text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-primaryDark/80 transition duration-150 ease-in-out">
            Upload
        </button>
    </div>
</div>
