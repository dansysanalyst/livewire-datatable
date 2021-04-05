<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full w-full sm:px-6 lg:px-8">

            <button
                class="mb-1 bg-indigo-400 text-white focus:bg-indigo-200 focus:outline-none text-sm py-2.5 px-5 rounded-lg items-center inline-flex"
                wire:click="exportToExcel()"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"></path>
                </svg>
                <span style="padding-left: 6px">
                   {!! (count($checkbox_values)) ? trans('livewire-datatables::datatable.buttons.export_selected') :
                    trans('livewire-datatables::datatable.buttons.export') !!}
                </span>
            </button>

            @include('livewire-datatables::tailwind.2.search-per-page')

            @if(config('livewire-datatables.filter') === 'outside')
                @if(count($make_filters) > 0)
                    <div>
                        @include('livewire-datatables::tailwind.2.filter')
                    </div>
                @endif
            @endif

            <div
                class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>

                        @include('livewire-datatables::tailwind.2.checkbox-all')

                        @foreach($columns as $column)
                            @if(!isset($column['hidden']))
                                <th @if(isset($column['sortable']) === true) wire:click="setOrder('{{$column['field']}}')"
                                    @endif
                                    class="@if(isset($column['sortable'])) align-middle cursor-pointer hover:text-black hover:text-current @endif px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    style="cursor:pointer;{{(isset($column['header_style'])? $column['header_style']: "")}}"
                                >
                                    @if(isset($column['sortable']) === true)
                                        <svg style="display: inline-block;" xmlns="http://www.w3.org/2000/svg"
                                             width="16"
                                             height="16" fill="currentColor" class="bi bi-sort-up"
                                             viewBox="0 0 16 16">
                                            <path d="{{$icon_sort[$column['field']]}}"/>
                                        </svg>
                                    @endif
                                    {{$column['title']}}
                                </th>
                            @endif
                        @endforeach
                        @if(isset($actionBtns) && count($actionBtns))
                            <th scope="col" colspan="{{count($actionBtns)}}"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ações
                            </th>
                        @endif

                    </tr>
                    </thead>
                    <tbody class="text-gray-800">

                    @if(config('livewire-datatables.filter') === 'inline')
                        <tr class="border-b border-gray-200 hover:bg-gray-100">

                            @if($checkbox)
                                <td></td>
                            @endif
                            @foreach($columns as $column)
                                @if(!isset($column['hidden']))
                                    <td>
                                        @if(isset($make_filters['date_picker']))
                                            @foreach($make_filters['date_picker'] as $field => $date)
                                                @if($date['field'] === $column['field'])
                                                    @include('livewire-datatables::tailwind.2.components.date_picker', [
                                                        'date' => $date,
                                                        'inline' => true
                                                    ])
                                                @endif
                                            @endforeach
                                        @endif
                                        @if(isset($make_filters['select']))
                                            @foreach($make_filters['select'] as $field => $select)
                                                @if($select['field'] === $column['field'])
                                                    @include('livewire-datatables::tailwind.2.components.select', [
                                                        'select' => $select,
                                                        'inline' => true
                                                    ])
                                                @endif
                                            @endforeach
                                        @endif

                                    </td>
                                @endif
                            @endforeach
                            @if(isset($actionBtns) && count($actionBtns))
                                <td></td>
                            @endif

                        </tr>

                    @endif

                    @if(count($data) === 0)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 ">
                            <td class="text-center p-2" colspan="{{ (($checkbox) ? 1:0)
                                        + ((isset($actionBtns)) ? 1: 0)
                                        + (count($columns))
                                    }}">
                                <span>Nenhum registro encontrado</span>
                                <span wire:click.prevent="clearFilter()" style="font-weight: bold; cursor: pointer">
                                        Limpar filtro
                                </span>
                            </td>
                        </tr>
                    @endif

                    @foreach($data as $row)
                        <tr class="border-b border-gray-200 hover:bg-gray-100"
                            onclick="$('.child_{{$row->id}}').toggle()">

                            @include('livewire-datatables::tailwind.2.checkbox-row')

                            @foreach($columns as $column)

                                @php
                                    $field = $column['field'];
                                @endphp

                                @if(!isset($column['hidden']))
                                    <td class="{{(isset($column['body_class'])? $column['body_class']: "px-6 py-4 whitespace-nowrap")}}"
                                        style="{{(isset($column['body_style'])? $column['body_style']: "")}}"
                                    >
                                        @if(isset($column['html']))
                                            {!! $row->$field !!}

                                        @elseif(!isset($column['html']))

                                            {{ $row->$field }}
                                        @endif
                                    </td>

                                @endif

                            @endforeach

                            @include('livewire-datatables::tailwind.2.actions')

                        </tr>
                        <tr class="child_{{ $row->id }} hidden">

                        </tr>
                    @endforeach

                    </tbody>
                </table>

                @if(!is_array($data))
                    <div class="">
                        @if(method_exists($data, 'links'))
                            {!! $data->links('livewire-datatables::tailwind.2.pagination') !!}
                        @endif
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
