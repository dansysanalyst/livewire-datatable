@if(filled($select))

    @if(!$inline)
        <div wire:ignore class="{!! (isset($select['class'])? $select['class']: '') !!} pt-2 p-2">
            @else
                <div class="pr-6">
                    @endif

                    @if(!$inline)
                        <label for="input_{!! $select['relation_id'] !!}">{{$select['label']}}</label>
                    @endif

                    <div class="relative">
                        <select id="input_{!! $select['relation_id'] !!}"
                                class="livewire_datatables_input
                                    block appearance-none w-full bg-gray-200 border mt-2 mb-2
                                    border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight
                                    focus:outline-none focus:bg-white focus:border-gray-500
{{ (isset($class_attr)) ? $class_attr: 'w-9/12' }}"
                                wire:model="filters.select.{!! $select['relation_id'] !!}"
                                wire:ignore
                                data-live-search="{{ (isset($select['live-search']))? $select['live-search']: false }}">

                            <option value="">{{ __('Todos') }}</option>
                            @foreach($select['data_source'] as $relation)
                                <option value="{{ $relation['id'] }}">{{ $relation[$select['display_field']] }}</option>
                            @endforeach
                        </select>

                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path
                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                            </svg>
                        </div>
                    </div>
                    </div>

    @endif
