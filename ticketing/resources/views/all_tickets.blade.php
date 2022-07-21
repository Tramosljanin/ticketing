<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        @foreach($tickets as $ticket)
                            <ul>
                                <li style="margin-bottom: 15px; margin-top: 15px">
                                    {{ $ticket->name }}

                                    <!-- <x-button type="button" class="ml-4" style="display: block; float: right; background-color: darkred; margin-bottom: 5px">
                                        <a href="/tickets/{{ $ticket -> id }}/edit">
                                            {{ __('Delete') }}
                                        </a>
                                    </x-button> -->
                                    <form method="post" action="/tickets/{{ $ticket -> id }}/delete" class="ml-4" style="display: block; float: right; background-color: transparent">
                                        @csrf
                                        @method('DELETE')

                                        <x-button type="button" class="ml-4" style="background-color: darkred">
                                            {{ __('Delete') }}
                                        </x-button>
                                    </form>


                                    <x-button type="button" class="ml-4" style="display: block; float: right; background-color: seagreen; margin-bottom: 5px">
                                        <a href="/tickets/{{ $ticket -> id }}/edit">
                                            {{ __('Edit') }}
                                        </a>
                                    </x-button>

                                    <x-button type="button" class="ml-4" style="display: block; float: right; background-color: cornflowerblue; margin-bottom: 5px">
                                        <a href="/tickets/{{ $ticket -> id }}">
                                            {{ __('View') }}
                                        </a>
                                    </x-button>
                                </li>

                                <hr>

                            </ul>
                        @endforeach

                        {{ $tickets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
