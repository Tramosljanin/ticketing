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
                                <x-label for="title" :value="__('Ticket title')"/>
                                <x-input id="title" class="block mt-1" type="text" name="title" required
                                         autofocus/>
                            </div>

                            <br>

                            <div>
                                <x-label for="description" :value="__('Description')"/>
                                <textarea id="description" name="description" rows="3"
                                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block sm:text-sm border border-gray-300 rounded-md w-full">
                                </textarea>
                            </div>

                            <br>

                            <div>
                                <x-label for="name" :value="__('Client')"/>

                                <x-input id="name" class="block mt-1" type="text" name="name" required
                                         autofocus/>
                            </div>

                            <div class="mt-4">
                                <x-label for="email" :value="__('Email address')"/>

                                <x-input id="email" class="block mt-1" type="email" name="email"
                                         placeholder="example@mail.com"/>
                            </div>

                            <div>
                                <x-label for="phone" :value="__('Phone number')"/>

                                <x-input id="phone" class="block mt-1" type="text" name="phone" required
                                         autofocus/>
                            </div>

                            <br>

                            <!-- Status -->
                            <div class="mt-4">
                                <x-label for="status_id" :value="__('Status')"/>
                                <select id="status_id" name="status_id"
                                        class="mt-1 block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Technician -->
                            <div class="mt-4">
                                <x-label for="user_id" :value="__('Technician')"/>

                                <select id="user_id" name="user_id"
                                        class="mt-1 block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach($technicians as $technician)
                                        <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br><br>

                            <div>
                                <x-button type="submit" class="ml-4" style="background-color: mediumseagreen">
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
