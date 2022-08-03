<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket:
            {{ $ticket->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg" style="padding-bottom: 10px; padding-top: 10px">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Ticket Information</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <!-- Ticket general information -->
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Ticket:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $ticket->name }} </dd>
                        </div>
                        <br>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Description:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $ticket->description }} </dd>
                        </div>
                        <br>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Status:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $ticket->status->name }} </dd>
                        </div>
                        <br>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Assigned to:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $ticket->user->name }}</dd>
                        </div>

                        <br><br>

                        <!-- Client infromation -->
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-small text-gray-900">Client Information</h3>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-t border-gray-200">
                            <dt class="text-sm font-medium text-gray-500">Full name:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $ticket->client->name }} </dd>
                        </div>
                        <br>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email address:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $ticket->client->email }} </dd>
                        </div>
                        <br>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Phone number:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $ticket->client->phone }}</dd>
                        </div>
                        <br>
                        <hr style="color: lightgray">
                        <br>
                        <!-- Timestamps -->
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Created at:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $ticket->created_at }} </dd>
                        </div>
                        <br>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Closed at:</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $ticket->closed_at }} </dd>
                        </div>

                        <br>

                        <div>
                            <x-button type="button" class="ml-4"
                                      style="display: block; background-color: cornflowerblue; margin-bottom: 5px">
                                <a href="/all_tickets">
                                    {{ __('Back') }}
                                </a>
                            </x-button>
                        </div>

                    </dl>
                </div>
            </div>
        </div>
    </div>


    <!--
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
-->


</x-app-layout>

