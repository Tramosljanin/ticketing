<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket:
            @foreach($tickets as $ticket)
            {{ $ticket->name }}
            @endforeach
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        @foreach($tickets as $ticket)
                            <div>
                                Ticket:
                                {{ $ticket->name }}
                            </div>

                            <div>
                                Description:
                                {{ $ticket->description }}
                            </div>
                        @endforeach

                        @foreach($statuses as $status)
                            <div>
                                Status:
                                {{ $status->name }}
                            </div>
                        @endforeach

                        <br>
                        CLIENT
                        <br>
                        @foreach($clients as $client)
                            <div>
                                Name:
                                {{ $client->name }}
                                <br>

                                E-mail:
                                {{ $client->email }}
                                <br>

                                Phone number:
                                {{ $client->phone }}
                                <br>
                            </div>
                        @endforeach

                        <br>
                        @foreach($users as $user)
                                <div>
                                    Assigned to:
                                    {{ $user->name }}
                                </div>
                        @endforeach

                        <br>
                        @foreach($tickets as $ticket)
                            <div>
                                Created:
                                {{ $ticket->created_at }}
                            </div>


                            <div>
                                Closed:
                                {{ $ticket->closed_at }}
                            </div>
                        @endforeach

                        <br>
                        <div>
                            <x-button type="button" class="ml-4" style="display: block; background-color: cornflowerblue; margin-bottom: 5px">
                                <a href="/all_tickets">
                                    {{ __('Back') }}
                                </a>
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

