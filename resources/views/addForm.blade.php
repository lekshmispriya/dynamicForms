<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h4>Choose form elements</h4>
                <form method="POST" action="{{ route('register') }}" id="addElementForm">
                  @csrf

            <!-- label -->
            <div class="mt-4">
                <x-label for="label" :value="__('Label')" />

                <x-input id="label" class="block mt-1 w-full" type="text" name="label" :value="old('name')" required  autocomplete="off"/>
            </div>

            <!-- type -->
            <div class="mt-4">
                <x-label for="type" :value="__('Type')" />
                <select class="block mt-1 w-full" id="type" required>
                    <option value="">Select</option>
                    @foreach ($elements as $row)
                    <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                    @endforeach
                </select>
               
            </div>

            <!-- custome value -->
            <div class="mt-4" style="display:none" id="custom_div">
                <x-label for="password" :value="__('Custom Value')" />

                <x-input id="custome_value" class="block mt-1 w-full" type="text" name="custome_value"   autocomplete="off"/>
                  <span style="color:red">eg:value1,value2,value3...etc</span>
            </div>

            

            <div class="flex items-center justify-end mt-4">
               
                <x-button class="ml-4" id="add_element"> 
                    {{ __('Add') }}
                </x-button>
            </div>
        </form>
        <h1>Custom Form</h1>
        <form method="POST" id="saveForm">
            @csrf
            <input type="hidden" value="0" id="count" name="count"/>
            <div id="append_form"></div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4" id="save">
                    {{ __('Save Form') }}
                </x-button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

