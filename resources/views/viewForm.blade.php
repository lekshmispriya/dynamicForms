<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
        
        <h1>Edit Custom Form </h1>
        <form method="POST" id="updateForm">
            @csrf
            @php
                 $count = count($form_contents);          
            @endphp
            <input type="hidden" value="{{$count}}" id="count" name="count"/>
            <input type="hidden" value="{{ $edit_id }}"  name="edit_id"/>
            <div id="append_form">
            @foreach ($form_contents as $key=>$row)
            @if($row['type'] == '1')
            <div class="mt-4"  id="div_{{ $key }}">
                <label for="label">{{ $row['label'] }}</label>
                <input type="hidden" name="label[]" value="{{ $row['label'] }}"/>
                <input type="hidden" name="element[]" value="{{ $row['type'] }}"/>
                <input type="hidden" name="custom_value[]" value=""/>
                <x-input id="label" class="block mt-1 w-full" type="text" name="{{ $row['label'] }}"/>
               
            </div>
            @elseif($row['type'] == '2')
            <div class="mt-4"  id="div_{{ $key }}">
                <label for="label">{{ $row['label'] }}</label>
                <input type="hidden" name="label[]" value="{{ $row['label'] }}"/>
                <input type="hidden" name="element[]" value="{{ $row['type'] }}"/>
                <input type="hidden" name="custom_value[]" value=""/>
                <x-input id="label" class="block mt-1 w-full" type="number" name="{{ $row['label'] }}"/>
               
            </div>
            @elseif($row['type'] == '3')
            <div class="mt-4" id="div_{{ $key }}">
                <label for="label">{{ $row['label'] }}</label>
                <input type="hidden" name="label[]" value="{{ $row['label'] }}"/>
                <input type="hidden" name="element[]" value="{{ $row['type'] }}"/>
                <input type="hidden" name="custom_value[]" value="{{ $row['custom_values'] }}"/>
                <select class="block mt-1 w-full"  name="{{ $row['label'] }}">
                    <option value="">Select</option>
                        @php
                            $obj =json_decode($row['custom_values'])
                        @endphp
                    @foreach ($obj as $val)
                    <option value="{{ $val }}">{{ $val }}</option>
                    @endforeach
                </select>
              
            </div>
            @endif
            @endforeach
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4" id="update">
                    {{ __('Save') }}
                </x-button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

