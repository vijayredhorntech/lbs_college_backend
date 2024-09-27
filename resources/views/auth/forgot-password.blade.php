<x-authentication-layout>
    <div class="w-full absolute top-0 left-0 w-full h-full grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 lg:bg-gradient-to-r md:bg-gradient-to-r from-black/90 to-black/20 bg-black/40">
        <div class="w-full h-full flex flex-col justify-center items-center lg:px-4 md:px-4 sm:px-32 px-4">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Form -->
            <form method="POST" action="{{ route('password.email') }}" class="lg:w-max md:w-max w-full bg-white p-6 rounded-[5px] shadow-lg shadow-gray-600 flex flex-col items-center w-full">
                <img src="{{asset('assets/images/logo2.jpg')}}" alt="" class="h-[100px] w-auto">
                <div class="w-full flex flex-col items-center py-4">
                    <span class="text-primaryDark font-semibold lg:text-lg md:text-lg sm:text-lg text-sm text-center">Lal Bahadur Shastri Government Degree</span>
                    <span class="text-primaryDark font-semibold lg:text-lg md:text-lg sm:text-lg text-sm text-center">College Saraswati Nagar</span>
                </div>
                @csrf
                <div class="w-full mt-4 flex flex-col gap-4">
                    <div class="lg:w-[400px] md:w-[350px] w-full flex flex-col gap-1">
                        <label for="email" class="font-semibold text-sm text-primaryDark">Email</label>
                        <x-input class="px-4 py-2.5 text-primaryDark .placeholder-primaryDark rounded-[3px] border-[1px] border-primaryDark/80 focus:ring-0 focus:outline-none focus:border-primaryDark hover:border-primaryDark" id="email" name="email" :value="old('email')" required placeholder="Enter your email....."/>
                    </div>
                </div>
                <div class="mt-2 w-full">
                    @if (Route::has('password.request'))
                        <div class="mr-1">
                            <a class="text-sm underline hover:no-underline" href="{{ route('login') }}">
                                {{ __('Back to login?') }}
                            </a>
                        </div>
                    @endif
                    <x-button class=" mt-4 w-full bg-primaryDark/80 text-white px-4 py-3 font-semibold text-md border-[1px] border-primaryDark hover:bg-primaryDark transition ease-in duration-2000" type="submit">
                        {{ __('Send password reset link') }}
                    </x-button>
                </div>
            </form>
            <x-validation-errors class="mt-4" />
        </div>
        <div class="w-full lg:flex md:flex hidden">

        </div>
    </div>

</x-authentication-layout>




