<script src="{{ config('livewire-datatables.plugins.flat_piker.js') }}"></script>
<script src="{{ config('livewire-datatables.plugins.flat_piker.translate') }}"></script>

@if(config('livewire-datatables.theme') === 'bootstrap')

    <script src="{{ config('livewire-datatables.plugins.bootstrap-select.js') }}"
            crossorigin="anonymous"></script>
    <link rel="stylesheet"
          href="{{ config('livewire-datatables.plugins.bootstrap-select.css') }}"
          crossorigin="anonymous"/>

    <script>
        $(function () {
            $('.livewire_datatables_select').selectpicker()
        })
        document.addEventListener('DOMContentLoaded', () => {
            Livewire.hook('message.processed', (message, component) => {
                $('.livewire_datatables_select').selectpicker()
                $('.spinner').html('')
            })
        })
    </script>
@endif
@stack('datatable_scripts')

