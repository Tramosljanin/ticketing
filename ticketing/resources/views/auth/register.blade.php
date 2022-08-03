<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <p style="font-family: 'Nunito', sans-serif; font-size: 25pt; color: mediumseagreen">
                    e-Ticketing
                </p>
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- User type -->
            <div class="mt-4">
                <x-label for="user_type_id" :value="__('User type')"/>

                <select id="user_type_id" name="user_type_id"
                        class="mt-1 block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($userTypes as $userType)
                        <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4" style="background-color: mediumseagreen">
                    {{ __('Register') }}
                </x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
