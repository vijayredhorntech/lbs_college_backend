<div class="p-6 bg-white shadow-md rounded-lg">
    <form wire:submit.prevent="store" class="space-y-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Add Student</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="text-sm font-semibold text-gray-600">Name</label>
                <input type="text" wire:model="name" id="name" name="name" placeholder="Enter student name"
                       class="border border-gray-300 rounded px-4 py-3 text-sm text-gray-700 w-full focus:ring focus:ring-primaryDark transition duration-150 ease-in-out"/>
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="roll_number" class="text-sm font-semibold text-gray-600">Roll Number</label>
                <input type="text" wire:model="roll_number" id="roll_number" name="roll_number"
                       placeholder="Enter student roll number"
                       class="border border-gray-300 rounded px-4 py-3 text-sm text-gray-700 w-full focus:ring focus:ring-primaryDark transition duration-150 ease-in-out"/>
                @error('roll_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit"
                class="w-full bg-primaryDark text-white font-semibold py-3 rounded-md shadow-md hover:bg-primaryDark/80 transition duration-150 ease-in-out">
            Submit
        </button>
    </form>

    @if ($successMessage)
        <div class="mt-4 p-4 bg-green-100 text-green-800 rounded-md shadow">
            {{ $successMessage }}
        </div>
    @endif

    <button wire:click="$dispatch('closeModal')">No, do not delete</button>

    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-700">Upload Students Excel</h3>
        <input type="file" wire:model="excelFile" accept=".xlsx,.xls"
               class="border border-gray-300 rounded px-4 py-3 text-sm text-gray-700 w-full focus:ring focus:ring-primaryDark transition duration-150 ease-in-out"/>
        @error('excelFile') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <button wire:click="upload"
                class="mt-2 w-full bg-primaryDark text-white font-semibold py-3 rounded-md shadow-md hover:bg-primaryDark/80 transition duration-150 ease-in-out">
            Upload
        </button>
    </div>
</div>
