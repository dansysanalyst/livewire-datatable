@if(filled($select))

        <div wire:ignore class="@if(!$inline) col-md-6 col-lg-3 @endif {!! (isset($select['class'])? $select['class']: '') !!} pt-2">

                    @if(!$inline)
                        <label for="input_{!! $select['field'] !!}">{{$select['label']}}</label>
                    @endif

                    <select id="input_{!! $select['field'] !!}"
                            class="livewire_datatables_select selectpicker_{!! $date['field'] !!}
                                form-control active
{{ (isset($class_attr)) ? $class_attr: '' }}"

                            wire:model="filters.select.{!! $select['field'] !!}"
                            wire:ignore
                            data-live-search="{{ (isset($select['live-search']))? $select['live-search']: false }}">

                        <option value="">{{ __('Todos') }}</option>
                        @foreach($select['data_source'] as $relation)
                            <option value="{{ $relation['id'] }}">{{ $relation[$select['display_field']] }}</option>
                        @endforeach
                    </select>

                </div>

                @push('datatable_scripts')
                    <script>
                        $('.selectpicker_{!! $select['field'] !!}.input_select').selectpicker();
                        $('select.selectpicker_{!! $select['field'] !!}.input_select').on('change', function () {
                            let data = [];
                            data.push({
                                selected: $('.selectpicker_{!! $select['field'] !!} option:selected').val(),
                                field: "{!! $select['field'] !!}"
                            })
                            $('.selectpicker_{!! $select['field'] !!}.input_select').selectpicker('refresh');

                            $('.spinner').html('<div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>')

                        });
                    </script>
        @endpush
    @endif
