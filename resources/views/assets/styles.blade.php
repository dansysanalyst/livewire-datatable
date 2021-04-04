<link rel="stylesheet" href="{{ config('livewire-datatables.plugins.flat_piker.css') }}">
<style>
    table {
        width: 100%;
    }
    .table .checkbox-column {
        width: 50px !important;
        max-width: 50px !important;
        text-align: center;
    }
    .form-control:disabled, .form-control[readonly] {
        opacity: 1;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
    }
    .accordion-button {
        padding: 0.7rem 0.7rem;
    }
    .livewire_datatables_input, .livewire_datatables_select,.btn-light {
        background: #e5e7eb !important;
        border: 1px solid #e5e7eb !important;
    }
    .has-search .form-control {
        padding-left: 2.375rem;
    }
    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }

    .new-control{position:relative;display:-ms-inline-flexbox;display:inline-flex;padding-left:1.5rem;margin-right:1rem;font-weight:100;font-size:14px}.new-control-input{position:absolute;z-index:-1;opacity:0}.new-control.new-checkbox{cursor:pointer}.new-control.new-checkbox .new-control-indicator{position:absolute;top:2px;left:0;display:block;width:17px;height:17px;pointer-events:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-color:#e0e6ed;background-repeat:no-repeat;background-position:center center;background-size:50% 50%;border-radius:4px}.new-control.new-checkbox>input:checked~span.new-control-indicator{background:#888ea8}.new-control.new-checkbox>input:checked~span.new-control-indicator:after{display:block}.new-control.new-checkbox span.new-control-indicator:after{border:solid #fff;top:50%;left:50%;margin-left:-2px;margin-top:-5px;width:4px;height:8px;border-width:0 2px 2px 0!important;transform:rotate(45deg);content:'';position:absolute;display:none;margin-left:-2px;margin-top:-5px;width:4px;height:8px;height:8px}.new-checkbox-rounded span.new-control-indicator{border-radius:50%!important}.new-control.new-checkbox.new-checkbox-text.checkbox-outline-default>input:checked~span.new-chk-content,.new-control.new-checkbox.new-checkbox-text>input:checked~span.new-chk-content{color:#888ea8}.new-control.new-checkbox.new-checkbox-text.checkbox-outline-primary>input:checked~span.new-chk-content,.new-control.new-checkbox.new-checkbox-text.checkbox-primary>input:checked~span.new-chk-content{color:#4361ee}.new-control.new-checkbox.new-checkbox-text.checkbox-outline-success>input:checked~span.new-chk-content,.new-control.new-checkbox.new-checkbox-text.checkbox-success>input:checked~span.new-chk-content{color:#1abc9c}.new-control.new-checkbox.new-checkbox-text.checkbox-info>input:checked~span.new-chk-content,.new-control.new-checkbox.new-checkbox-text.checkbox-outline-info>input:checked~span.new-chk-content{color:#2196f3}.new-control.new-checkbox.new-checkbox-text.checkbox-outline-warning>input:checked~span.new-chk-content,.new-control.new-checkbox.new-checkbox-text.checkbox-warning>input:checked~span.new-chk-content{color:#e2a03f}.new-control.new-checkbox.new-checkbox-text.checkbox-danger>input:checked~span.new-chk-content,.new-control.new-checkbox.new-checkbox-text.checkbox-outline-danger>input:checked~span.new-chk-content{color:#e7515a}.new-control.new-checkbox.new-checkbox-text.checkbox-outline-secondary>input:checked~span.new-chk-content,.new-control.new-checkbox.new-checkbox-text.checkbox-secondary>input:checked~span.new-chk-content{color:#805dca}.new-control.new-checkbox.new-checkbox-text.checkbox-dark>input:checked~span.new-chk-content,.new-control.new-checkbox.new-checkbox-text.checkbox-outline-dark>input:checked~span.new-chk-content{color:#3b3f5c}.new-control.new-checkbox.checkbox-primary>input:checked~span.new-control-indicator{background:#4361ee}.new-control.new-checkbox.checkbox-success>input:checked~span.new-control-indicator{background:#1abc9c}.new-control.new-checkbox.checkbox-info>input:checked~span.new-control-indicator{background:#2196f3}.new-control.new-checkbox.checkbox-warning>input:checked~span.new-control-indicator{background:#e2a03f}.new-control.new-checkbox.checkbox-danger>input:checked~span.new-control-indicator{background:#e7515a}.new-control.new-checkbox.checkbox-secondary>input:checked~span.new-control-indicator{background:#805dca}.new-control.new-checkbox.checkbox-dark>input:checked~span.new-control-indicator{background:#3b3f5c}.new-control.new-checkbox[class*=checkbox-outline-]>input:checked~span.new-control-indicator{background-color:transparent}.new-control.new-checkbox.checkbox-outline-default>input:checked~span.new-control-indicator{border:2px solid #888ea8}.new-control.new-checkbox.checkbox-outline-primary>input:checked~span.new-control-indicator{border:2px solid #4361ee}.new-control.new-checkbox.checkbox-outline-success>input:checked~span.new-control-indicator{border:2px solid #1abc9c}.new-control.new-checkbox.checkbox-outline-info>input:checked~span.new-control-indicator{border:2px solid #2196f3}.new-control.new-checkbox.checkbox-outline-warning>input:checked~span.new-control-indicator{border:2px solid #e2a03f}.new-control.new-checkbox.checkbox-outline-danger>input:checked~span.new-control-indicator{border:2px solid #e7515a}.new-control.new-checkbox.checkbox-outline-secondary>input:checked~span.new-control-indicator{border:2px solid #805dca}.new-control.new-checkbox.checkbox-outline-dark>input:checked~span.new-control-indicator{border:2px solid #3b3f5c}.new-control.new-checkbox.checkbox-outline-default>input:checked~span.new-control-indicator:after{border-color:#888ea8}.new-control.new-checkbox.checkbox-outline-primary>input:checked~span.new-control-indicator:after{border-color:#4361ee}.new-control.new-checkbox.checkbox-outline-success>input:checked~span.new-control-indicator:after{border-color:#1abc9c}.new-control.new-checkbox.checkbox-outline-info>input:checked~span.new-control-indicator:after{border-color:#2196f3}.new-control.new-checkbox.checkbox-outline-warning>input:checked~span.new-control-indicator:after{border-color:#e2a03f}.new-control.new-checkbox.checkbox-outline-danger>input:checked~span.new-control-indicator:after{border-color:#e7515a}.new-control.new-checkbox.checkbox-outline-secondary>input:checked~span.new-control-indicator:after{border-color:#805dca}.new-control.new-checkbox.checkbox-outline-dark>input:checked~span.new-control-indicator:after{border-color:#3b3f5c}.new-control.new-radio{cursor:pointer}.new-control.new-radio .new-control-indicator{position:absolute;top:2px;left:0;display:block;width:16px;height:16px;pointer-events:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-color:#e0e6ed;background-repeat:no-repeat;background-position:center center;background-size:50% 50%;border-radius:50%}.new-control.new-radio>input:checked~span.new-control-indicator{background:#888ea8}.new-control.new-radio span.new-control-indicator:after{top:50%;left:50%;margin-left:-3px;margin-top:-3px;content:'';position:absolute;display:none;border-radius:50%;height:6px;width:6px;background-color:#fff}.new-control.new-radio.square-radio .new-control-indicator,.new-control.new-radio.square-radio span.new-control-indicator:after{border-radius:0}.new-control.new-radio.radio-primary>input:checked~span.new-control-indicator{background:#4361ee}.new-control.new-radio.radio-success>input:checked~span.new-control-indicator{background:#1abc9c}.new-control.new-radio.radio-info>input:checked~span.new-control-indicator{background:#2196f3}.new-control.new-radio.radio-warning>input:checked~span.new-control-indicator{background:#e2a03f}.new-control.new-radio.radio-danger>input:checked~span.new-control-indicator{background:#e7515a}.new-control.new-radio.radio-secondary>input:checked~span.new-control-indicator{background:#805dca}.new-control.new-radio.radio-dark>input:checked~span.new-control-indicator{background:#3b3f5c}.new-control.new-radio[class*=radio-classic-]>input:checked~span.new-control-indicator{background-color:transparent}.new-control.new-radio.radio-classic-default>input:checked~span.new-control-indicator{border:3px solid #888ea8}.new-control.new-radio.radio-classic-primary>input:checked~span.new-control-indicator{border:3px solid #4361ee}.new-control.new-radio.radio-classic-success>input:checked~span.new-control-indicator{border:3px solid #1abc9c}.new-control.new-radio.radio-classic-info>input:checked~span.new-control-indicator{border:3px solid #2196f3}.new-control.new-radio.radio-classic-warning>input:checked~span.new-control-indicator{border:3px solid #e2a03f}.new-control.new-radio.radio-classic-danger>input:checked~span.new-control-indicator{border:3px solid #e7515a}.new-control.new-radio.radio-classic-secondary>input:checked~span.new-control-indicator{border:3px solid #805dca}.new-control.new-radio.radio-classic-dark>input:checked~span.new-control-indicator{border:3px solid #3b3f5c}.new-control.new-radio.radio-classic-default>input:checked~span.new-control-indicator:after{background-color:#888ea8}.new-control.new-radio.radio-classic-primary>input:checked~span.new-control-indicator:after{background-color:#4361ee}.new-control.new-radio.radio-classic-success>input:checked~span.new-control-indicator:after{background-color:#1abc9c}.new-control.new-radio.radio-classic-info>input:checked~span.new-control-indicator:after{background-color:#2196f3}.new-control.new-radio.radio-classic-warning>input:checked~span.new-control-indicator:after{background-color:#e2a03f}.new-control.new-radio.radio-classic-danger>input:checked~span.new-control-indicator:after{background-color:#e7515a}.new-control.new-radio.radio-classic-secondary>input:checked~span.new-control-indicator:after{background-color:#805dca}.new-control.new-radio.radio-classic-dark>input:checked~span.new-control-indicator:after{background-color:#3b3f5c}.new-control.new-radio.new-radio-text.radio-classic-default>input:checked~span.new-radio-content,.new-control.new-radio.new-radio-text>input:checked~span.new-radio-content{color:#888ea8}.new-control.new-radio.new-radio-text.radio-classic-primary>input:checked~span.new-radio-content,.new-control.new-radio.new-radio-text.radio-primary>input:checked~span.new-radio-content{color:#4361ee}.new-control.new-radio.new-radio-text.radio-classic-success>input:checked~span.new-radio-content,.new-control.new-radio.new-radio-text.radio-success>input:checked~span.new-radio-content{color:#1abc9c}.new-control.new-radio.new-radio-text.radio-classic-info>input:checked~span.new-radio-content,.new-control.new-radio.new-radio-text.radio-info>input:checked~span.new-radio-content{color:#2196f3}.new-control.new-radio.new-radio-text.radio-classic-warning>input:checked~span.new-radio-content,.new-control.new-radio.new-radio-text.radio-warning>input:checked~span.new-radio-content{color:#e2a03f}.new-control.new-radio.new-radio-text.radio-classic-danger>input:checked~span.new-radio-content,.new-control.new-radio.new-radio-text.radio-danger>input:checked~span.new-radio-content{color:#e7515a}.new-control.new-radio.new-radio-text.radio-classic-secondary>input:checked~span.new-radio-content,.new-control.new-radio.new-radio-text.radio-secondary>input:checked~span.new-radio-content{color:#805dca}.new-control.new-radio.new-radio-text.radio-classic-dark>input:checked~span.new-radio-content,.new-control.new-radio.new-radio-text.radio-dark>input:checked~span.new-radio-content{color:#3b3f5c}.table-controls{padding:0;margin:0;list-style:none}.table-controls>li{display:inline-block;margin:0 2px;line-height:1}.table-controls>li>a{display:inline-block}.table-controls>li>a i{margin:0;color:#555;font-size:16px;display:block}.table-controls>li>a i:hover{text-decoration:none}.table .progress{margin-bottom:0}.contextual-table.table>tbody>tr>td,.contextual-table.table>thead>tr>th{border:none}.table-default>td,.table-default>th{background-color:#f1f2f3;color:#3b3f5c}.table-primary>td,.table-primary>th{background-color:#c7d8fd;color:#2196f3}.table-secondary>td,.table-secondary>th{background-color:#e0d4f9;color:#805dca}.table-success>td,.table-success>th{background-color:#cbfdf3;color:#1abc9c}.table-danger>td,.table-danger>th{background-color:#fff5f5;color:#e7515a}.table-warning>td,.table-warning>th{background-color:#fdefd5;color:#e2a03f}.table-info>td,.table-info>th{background-color:#e7f7ff;color:#2196f3}.table-light>td,.table-light>th{background-color:#fff;color:#888ea8}.table-dark>td,.table-dark>th{background-color:#e3e4eb;color:#515365;border-color:#fff!important}

    /* purgecss start ignore */
    .livewire-pagination {
        @apply inline-block w-auto ml-auto float-right;
    }
    ul.pagination {
        @apply flex border border-gray-200 rounded font-mono;
    }
    .page-link {
        @apply block bg-white text-blue-800 border-r border-gray-200 outline-none py-2 w-12 text-sm text-center;
    }
    .page-link:last-child {
        @apply border-0;
    }
    .page-link:hover {
        @apply bg-blue-700 text-white border-blue-700;
    }
    .page-item.active .page-link {
        @apply bg-blue-700 text-white border-blue-700;
    }
    .page-item.disabled .page-link {
        @apply bg-white text-gray-300 border-gray-200;
    }
    .livewire-datatables {
        background-color: rgba(129, 140, 248, 1) !important;
        border-color: rgba(129, 140, 248, 1) !important;
        color: white !important;
        border-radius: 6px;
    }
    .page-link {
        color: rgba(129, 140, 248, 1) !important;
    }
    .page-item.active .page-link {
        color: white !important;
        background-color: rgba(129, 140, 248, 1);
        border-color: rgba(129, 140, 248, 1);
    }
</style>

