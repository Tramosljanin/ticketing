<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Client:
                {{ $client->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>

                        <div>
                            Name:
                            {{ $client->name }}
                        </div>

                        <div>
                            E-mail:
                            {{ $client->email }}
                        </div>

                        <div>
                            Phone number:
                            {{ $client->phone }}
                        </div>

                        <br>
                        <div>
                            TICKETS
                            @foreach($client->ticket as $tick)
                                <ul>
                                    <li>
                                        {{ $tick->name }}
                                    </li>
                                </ul>
                            @endforeach

                        </div>
                        <br>

                        <div>
                            <x-button type="button" class="ml-4" style="display: block; background-color: cornflowerblue; margin-bottom: 5px">
                                <a href="/all_clients">
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

