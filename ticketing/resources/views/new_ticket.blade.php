<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            {{ __('Create new ticket') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <main>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                        <form action="{{ route('new_ticket') }}" method="post">
                            @csrf

                            <div>
                                <x-label for="title" :value="__('Ticket')"/>
                                <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus/>
                            </div>

                            <div>
                                <x-label for="description" :value="__('Description')"/>
                                <x-input id="description" class="block mt-1 w-full" type="text" name="description" required autofocus/>
                            </div>

                            <div>
                                <x-label for="name" :value="__('Client')"/>

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required
                                         autofocus/>
                            </div>

                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')"/>

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"/>
                            </div>

                            <div>
                                <x-label for="phone" :value="__('Phone')"/>

                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" required
                                         autofocus/>
                            </div>

                            <div class="mt-4">
                                <x-label for="status_id" :value="__('Status')"/>

                                <select name="status_id" id="status_id" style="border-color: lightgrey">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Technician -->
                            <div class="mt-4">
                                <x-label for="user_id" :value="__('Technician')"/>

                                <select name="user_id" id="user_id" style="display: block; hover:bg-gray-100; focus:outline-none; focus:bg-gray-100 transition duration-150 ease-in-out">
                                    @foreach($technicians as $technician)
                                        <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br>
                            <div>
                                <x-button type="submit" class="ml-4" style="background-color: seagreen">
                                    {{ __('Create') }}
                                </x-button>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
