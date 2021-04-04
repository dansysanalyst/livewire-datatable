@if(filled($date))
    @php
        $customConfig = [];
        if (isset($date['config'])) {
            foreach ($date['config'] as $key => $value) {
                $customConfig[$key] = $value;
            }
        }
    @endphp

    @if(!$inline)
        <div class="{!! (isset($date['class'])? $date['class']: '') !!} pt-2 p-2">
            @else
                <div class="pr-6" wire:ignore>
            @endif

            @if(!$inline)
                <label for="input_{!! $date['field'] !!}">{!! $date['label'] !!}</label>
            @endif
            <input id="input_{!! $date['field'] !!}"
                   data-key="filters.date_picker.{!! $date['field'] !!}"
                   wire:model="filters.input_date_picker.{!! $date['field'] !!}"
                   wire:ignore
                   class="livewire_datatables_input flatpickr flatpickr-input range_input_{!! $date['field'] !!}
                       block appearance-no livewire_datatables_input
                       mt-2 mb-2 bg-gray-200 border border-gray-200
                       text-gray-700 py-3 px-4 pr-8 rounded
                       leading-tight focus:outline-none
                       focus:bg-white focus:border-gray-500
                       {{ (isset($class_attr)) ? $class_attr: 'w-full' }}"
                   type="text"
                   placeholder="Selecione o período.."
            >
        </div>
        @push('datatable_scripts')
            <script type="application/javascript">
                flatpickr(document.getElementsByClassName('range_input_{!! $date['field'] !!}'), {
                        ...@json($defaultDatePikerConfig),
                        @if(isset($customConfig['only_future']))
                        "minDate": "today",
                        @endif
                            @if(isset($customConfig['no_weekends']) === true)
                        "disable": [
                            function (date) {
                                return (date.getDay() === 0 || date.getDay() === 6);
                            }
                        ],
                        @endif
                        ...@json($customConfig),
                        onClose: function (selectedDates, dateStr, instance) {
                            let data = [];
                            data.push({
                                selectedDates: dateStr,
                                values: instance._input.attributes['data-key'].value
                            })
                            window.livewire.emit('inputDatePiker', data);
                        }
                    }
                );
            </script>
        @endpush
    @endif
