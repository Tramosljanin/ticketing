<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            {{ $client->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg" style="padding-bottom: 10px; padding-top: 10px">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Client Information</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and tickets.</p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <br>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Full name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $client->name }} </dd>
                        </div>
                        <br>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email address</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $client->email }} </dd>
                        </div>
                        <br>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Phone number</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"> {{ $client->phone }}</dd>
                        </div>
                        <br>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Tickets</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                @foreach($client->ticket as $tick)
                                    <ul role="list">
                                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                            <div class="w-0 flex-1 flex items-center">
                                                <span class="ml-2 flex-1 w-0 truncate"> {{ $tick->name }} </span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <a href="/tickets/{{ $tick->id }}"
                                                   class="font-medium text-indigo-600 hover:text-indigo-500">
                                                    {{ __('View') }}
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

