<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            Edit ticket: {{ $ticket->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <main>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                        <form action="{{ route('ticket', $ticket) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div>
                                <x-label for="name" :value="__('Ticket')"/>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $ticket -> name }}" required autofocus/>
                            </div>

                            <br>

                            <div>
                                <x-label for="description" :value="__('Description')"/>
                                <x-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $ticket -> description }}" required autofocus/>
                            </div>

                            <br>

                            CLIENT
                            <br>
                            <div>
                                Name:
                                {{ $ticket->client->name }}
                                <br>

                                E-mail:
                                {{ $ticket->client->email }}
                                <br>

                                Phone number:
                                {{ $ticket->client->phone }}
                                <br>
                            </div>

                            <br>

                            <!--Status-->
                            <div class="mt-4">
                                <x-label for="status_id" :value="__('Status')"/>

                                <select name="status_id" id="status_id" value="{{ $ticket -> status -> name }}" style="border-color: lightgrey">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" >{{ $status->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <br>

                            <!--Assigned to/user-->
                            <div class="mt-4">
                                <x-label for="user_id" :value="__('Assigned to')"/>

                                <select name="user_id" id="user_id" style="border-color: lightgrey">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
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

