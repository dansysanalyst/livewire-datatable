<div class="w-full flex pb-4 pt-2">

    @if($perPage_input)
        <div class="w-6/12 sm:w-1/12 md:w-2/12 lg:2/12 relative">
            <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                @foreach($perPageValues as $value)
                    <option>{{ $value }}</option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
    @endif

        @if($search_input)
            <div class="w-full mx-1 float-end float-right">
                <input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-10/12 sm:w-3/12 md:w-3/12 float-right bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Buscar...">
            </div>
        @endif
</div>
