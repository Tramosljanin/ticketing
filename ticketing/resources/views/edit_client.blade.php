<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            Edit ticket: {{ $client->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <main>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                        <form action="{{ route('client', $client) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div>
                                <x-label for="name" :value="__('Name')"/>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $client -> name }}" required autofocus/>
                            </div>

                            <br>

                            <div>
                                <x-label for="email" :value="__('Email')"/>
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $client -> email }}" required autofocus/>
                            </div>

                            <br>

                            <div>
                                <x-label for="phone" :value="__('Phone number')"/>
                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{ $client -> phone }}" required autofocus/>
                            </div>

                            <br>

                            <div>
                                <x-button type="submit" class="ml-4" style="background-color: mediumseagreen">
                                    {{ __('Update') }}
                                </x-button>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

