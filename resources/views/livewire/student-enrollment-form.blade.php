


    <div class="px-4 py-6 w-full">

        <div class="relative bg-primaryDark px-4 py-2 rounded-sm  border-[1px] border-primaryDark flex justify-between items-center">
                <span class="text-xl text-white/90 font-bold mb-1">
                   @if($student != null)
                        {{ __('Editing - '. $student->fullName . '\'s form') }}
                    @else
                        {{ __('Student Enrollment Form') }}
                    @endif
                </span>
        </div>
        <div class="p-4 bg-white">
            <form wire:submit.prevent="submit">
                <div class="shadow overflow-hidden">
                    <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1   justify-start gap-4 py-4 lg:px-8 md:px-8 px-4 bg-white">
                        <div class="w-full flex flex-col justify-center items-center">
                            <div class="mt-4">
                                <img id='preview_img' class="h-16 w-16 object-cover rounded-full" src="{{ $student ? $student->profilePhoto : ($form['photo'] ? $form['photo']->temporaryUrl() : asset('images/user.png')) }}" alt="Current profile photo"/>
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="photo" class="font-semibold text-sm text-black">Profile Photo</label>
                                <input type="file" placeholder="Profile Photo" wire:model="form.photo"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark" />

                                @error('form.photo') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="w-full flex flex-col justify-center items-center">

                            <div class="mt-4">
                                <img id='preview_img' class="h-16 w-16 object-cover rounded-full" src="{{ $student ? $student->signaturePhoto : ($form['signature'] ? $form['signature']->temporaryUrl() : asset('images/signature.png')) }}" alt="Signature photo"/>
                            </div>

                            <div class="w-full  flex flex-col gap-1">
                                <label for="photo" class="font-semibold text-sm text-black">Signature</label>
                                <input type="file" placeholder="Signature" wire:model="form.signature"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark" />

                                @error('form.signature') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="py-4 lg:px-8 md:px-8 px-4 bg-white">
                        <div class=" grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                            <div class="w-full flex flex-col gap-1">
                                <label for="first_name" class="font-semibold text-sm text-black">First Name</label>
                                <input placeholder="First Name" wire:model="form.first_name" type="text" id="first_name" autocomplete="given-name"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.first_name') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="last_name" class="font-semibold text-sm text-black">Last Name</label>
                                <input placeholder="Last Name" wire:model="form.last_name" type="text" id="last_name" autocomplete="family-name"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.last_name') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="email" class="font-semibold text-sm text-black">Email Address</label>
                                <input placeholder="Email" wire:model="form.email" type="email" id="email" autocomplete="email"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.email') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="phone" class="font-semibold text-sm text-black">Phone Number</label>
                                <input placeholder="Phone Number" wire:model="form.phone" type="tel" id="phone" autocomplete="tel"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.phone') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="mother_name" class="font-semibold text-sm text-black">Mother's Name</label>
                                <input placeholder="Mother's Name" wire:model="form.mother_name" type="text" id="mother_name"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.mother_name') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="guardian_father_name" class="font-semibold text-sm text-black">Guardian/Father's
                                    Name</label>
                                <input placeholder="Guardian/Father Name" wire:model="form.guardian_father_name" type="text" id="guardian_father_name"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.guardian_father_name') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="uni_roll_number" class="font-semibold text-sm text-black">University Roll
                                    Number</label>
                                <input placeholder="University Roll Number" wire:model="form.uni_roll_number" type="text" id="uni_roll_number"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.uni_roll_number') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="uni_registration_no" class="font-semibold text-sm text-black">University
                                    Registration Number</label>
                                <input placeholder="University Registration Number" wire:model="form.uni_registration_no" type="text" id="uni_registration_no"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.uni_registration_no') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="date_of_birth" class="font-semibold text-sm text-black">Date of Birth</label>
                                <input placeholder="Date of Birth" wire:model="form.date_of_birth" type="date" id="date_of_birth"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.date_of_birth') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="gender" class="font-semibold text-sm text-black">Gender</label>
                                <select id="gender" wire:model="form.gender"
                                        class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                                @error('form.gender') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="alt_phone" class="font-semibold text-sm text-black">Alternate Phone
                                    Number</label>
                                <input placeholder="Alternate Phone Number" wire:model="form.alt_phone" type="tel" id="alt_phone" autocomplete="tel"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.alt_phone') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="address" class="font-semibold text-sm text-black">Permanent Address</label>
                                <input placeholder="Permanent Address" wire:model="form.permanent_address" type="text" id="address" autocomplete="address"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.permanent_address') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="temp_address" class="font-semibold text-sm text-black">Temporary
                                    Address</label>
                                <input placeholder="Temporary Address" wire:model="form.temp_address" type="text" id="temp_address" autocomplete="address"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.temp_address') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="father_phone" class="font-semibold text-sm text-black">Guardian/Father's
                                    Phone
                                    Number</label>
                                <input placeholder="Guardian/Father Phone Number" wire:model="form.father_phone" type="tel" id="father_phone" autocomplete="tel"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.father_phone') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="club_name" class="font-semibold text-sm text-black">Club Name</label>
                                <input placeholder="Club Name" wire:model="form.club_name" type="text" id="club_name"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.club_name') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="domicile" class="font-semibold text-sm text-black">Domicile</label>
                                <input placeholder="Domicile" wire:model="form.domicile" type="text" id="domicile"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.domicile') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="aadhar_number" class="font-semibold text-sm text-black">Aadhar Number</label>
                                <input placeholder="Aadhar Number" wire:model="form.aadhar_number" type="text" id="aadhar_number"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.aadhar_number') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="pan_number" class="font-semibold text-sm text-black">PAN Number</label>
                                <input placeholder="PAN Number" wire:model="form.pan_number" type="text" id="pan_number"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.pan_number') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="nationality" class="font-semibold text-sm text-black">Nationality</label>
                                <input placeholder="Nationality" wire:model="form.nationality" type="text" id="nationality"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.nationality') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="religion" class="font-semibold text-sm text-black">Religion</label>
                                <input placeholder="Religion" wire:model="form.religion" type="text" id="religion"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.religion') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="father_occupation" class="font-semibold text-sm text-black">Father's
                                    Occupation</label>
                                <input placeholder="Father's Occupation" wire:model="form.father_occupation" type="text" id="father_occupation"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.father_occupation') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="yearly_income" class="font-semibold text-sm text-black">Yearly Income</label>
                                <input placeholder="Yearly Income" wire:model="form.yearly_income" type="text" id="yearly_income"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.yearly_income') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="is_expelled_before" class="font-semibold text-sm text-black">Is Expelled
                                    Before</label>
                                <select id="gender" wire:model="form.is_expelled_before"
                                        class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                    <option value="">Select</option>
                                    <option value="0">no</option>
                                    <option value="1">Yes</option>
                                </select>
                                @error('form.is_expelled_before') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full flex flex-col gap-1">
                                <label for="expulsion_reason" class="font-semibold text-sm text-black">Expulsion
                                    Reason</label>
                                <input placeholder="Expulsion Reason" wire:model="form.expulsion_reason" type="text" id="expulsion_reason"
                                       class="px-4 py-2.5 text-primaryDark placeholder-primaryDark/60 rounded-[3px] border-[1px] border-primaryDark/60 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark">
                                @error('form.expulsion_reason') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class=" bg-white flex w-full justify-end">
                            <button type="submit"
                                    class="mt-4 w-max bg-primaryDark/80 rounded-[3px] text-white px-4 py-2 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>












