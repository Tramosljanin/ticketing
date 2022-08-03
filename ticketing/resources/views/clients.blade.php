<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            {{ __('Client list') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        @foreach($clients as $client)
                            <ul>
                                <li style="margin-bottom: 15px; margin-top: 15px">
                                    {{ $client->name }}
                                    <x-button type="button" class="ml-4" style="display: block; float: right; background-color: mediumseagreen; margin-bottom: 5px">
                                        <a href="/clients/{{ $client -> id }}/edit">
                                            {{ __('Edit') }}
                                        </a>
                                    </x-button>

                                    <x-button type="button" class="ml-4" style="display: block; float: right; background-color: cornflowerblue; margin-bottom: 5px">
                                        <a href="/clients/{{ $client -> id }}">
                                            {{ __('View') }}
                                        </a>
                                    </x-button>


                                    <!--
                                    <button type="button" style="display: block; float: right; padding-right: 5px; padding-left: 5px; text-decoration: underline">Edit</button>
                                    <button type="button" style="display: block; float: right; padding-right: 5px; padding-left: 5px; text-decoration: underline">View</button>
                                    -->
                                </li>
                                <hr>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
