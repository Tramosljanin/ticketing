<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket:
            {{ $ticket->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div>
                            Ticket:
                            {{ $ticket->name }}
                        </div>

                        <div>
                            Description:
                            {{ $ticket->description }}
                        </div>

                        <div>
                            Status:
                            {{ $ticket->status->name }}
                        </div>

                        <div>
                            Assigned to:
                            {{ $ticket->user->name }}
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
                            <div>
                                Created:
                                {{ $ticket->created_at }}
                            </div>

                            <div>
                                Closed:
                                {{ $ticket->closed_at }}
                            </div>

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

