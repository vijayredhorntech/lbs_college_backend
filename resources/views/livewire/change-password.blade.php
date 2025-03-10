<div class="w-full">
    <div class="px-4 py-6 w-full">

        <div class="relative bg-primaryDark px-4 py-2 rounded-sm border-[1px] border-primaryDark flex justify-between items-center">
            <span class="text-xl text-white/90 font-bold mb-1">
                Change Password
            </span>
        </div>

        <div class="w-full bg-white p-4">
            <form wire:submit.prevent="updatePassword" class="max-w-md mx-auto">
                <div class="mb-4">
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                    <input type="password" id="current_password" wire:model="current_password" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primaryDark focus:border-primaryDark">
                    @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <input type="password" id="password" wire:model="password" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primaryDark focus:border-primaryDark">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                    <input type="password" id="password_confirmation" wire:model="password_confirmation" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primaryDark focus:border-primaryDark">
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                        class="px-4 py-2 bg-primaryDark text-white rounded-md hover:bg-primaryDark/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primaryDark">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 