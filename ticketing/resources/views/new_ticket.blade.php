<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new ticket') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        Ticket:
                        <input type="text" name="ticket" value="<?php echo 'hello' ;?>">
                        <br>

                        Description:
                        <textarea name="description" rows="5" cols="40"><?php echo 'hello';?></textarea>
                        <br>

                        Client:
                        <input type="text" name="name" value="<?php echo  'hello';?>">
                        <br>

                        E-mail:
                        <input type="text" name="email" value="<?php echo 'hello' ;?>">
                        <br>

                        Phone:
                        <input type="text" name="phone" value="<?php echo 'hello';?>">
                        <br>

                        Status:

                        <br>

                        Technician:
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
