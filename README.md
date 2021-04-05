# Livewire DataTables

A [Laravel Livewire](https://laravel-livewire.com) table component with searching, sorting, checkboxes, pagination and export data.

With the component you can quickly generate a table from an entity or a collection.

Bootstrap version
![Laravel Livewire Tables](examples/bootstrap.png)

Tailwind version
![Laravel Livewire Tables](examples/tailwind.png)

Exported example with selected data

![Laravel Livewire Tables](examples/export.png)

[See these other examples!](examples)

- [Support](https://github.com/luanfreitasdev/livewire-datatable/issues)
- [Contributions](https://github.com/luanfreitasdev/livewire-datatable/pulls)

---
# Installation

Installing this package via composer:

```bash
    composer require luanfreitasdev/livewire-datatable
```

Add Providers

```php
    'providers' => [        
        LuanFreitasDev\LivewireDataTables\Providers\DataTableServiceProvider::class        
    ];
```

Be sure to enter livewire policies

```html
    @livewireStyle and @livewireScripts
```

You can use either tailwind or bootstrap

[Install Tailwindcss](https://tailwindcss.com/docs/guides/laravel)

[Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)

---
# Making Table Components

Component generated for an entity

Using the `make` command:

```bash
    php artisan make:table --name=ProductTable --model=App\Models\Product
```

### Options

| Option | Description | Example | 
|----|----|----|
|**--name**| Model name | ```--name=ProductTable``` |
|**--model**| Full model path | ```--model=App\Models\Product``` |
|**--publish**| Publish stubs file into the path 'stubs' | ```--publish``` |
|**--template**| Sometimes you can use ready-made templates for creating different types of tables | ```php artisan make:table --template=stubs/table.sub or php artisan make:table --template=stubs/table_with_buttons.sub``` |

This creates your new table component in the `app/Http/Livewire` folder.

---

### Column Methods

| Method | Arguments | Result | Example |
|----|----|----|----|
|**add**| |Add new column |```Column::add()```|
|**title**| *String* $title |Column title representing a field |```add()->title('Name')```|
|**field**| *String* $field | Field name| ```->field('name')```|
|**searchable**| |Includes the column in the global search | ```->searchable()``` |
|**sortable**| |Includes column in the sortable list | ```->sortable()``` |
|**headerAttribute**|[*String* $class default: ''], [*String* $style default: '']|Add the class and style elements to the column header|```->headerAttribute('text-center', 'color:red')```|
|**bodyAttribute**|[*String* $class default: ''], [*String* $style default: '']|Add the column lines the class and style elements|```->bodyAttribute('text-center', 'color:red')```|
|**html**| |When the field has any changes within the scope using Collection|```->html()```|
|**visibleInExport**| |When true it will be invisible in the table and will show the column in the exported file|```->visibleInExport(true)```|
|**hidden**| |hides the column in the table|```->hidden()```|
|**filterDateBetween**| [*String* $class default: 'col-3'] |Include a specific field on the page to filter between the specific date in the column|```Column::add()->filterDateBetween()```|
|**makeInputSelect**| [*Array* $data_source, *String* $display_field, *String* $relation_id, *Array* $settings] |Include a specific field on the page to filter a hasOne relation in the column|```Column::add()->makeInputSelect(Group::all(), 'name', 'group_id', ['live_search' => true ,'class' => ''])```|
---


### Action Methods

Coming soon

---

### Filters

To use a filter, you must declare the ```@datatableFilter``` directive before </body>

---

# Using Table Components

After making a component, you may want to edit the `setUp`, `dataSource`, `columns` and `actions` methods:

```php
    class ProductTable extends DataTableComponent
    {
        use ActionButton;

        public function setUp()
        {
            $this->showCheckBox()->showPerPage()->showSearchInput();
        }
    
        public function dataSource(): array
        {
            $model = Product::query()->with('group')->get();
            return DataTable::eloquent($model)
                ->addColumn('id', function(Product $model) {
                    return $model->id;
                })
                ->addColumn('name', function(Product $model) {
                    return $model->name;
                })
                ->addColumn('group_id', function(Product $model) {
                    return $model->group_id;
                })
                ->addColumn('group_name', function(Product $model) {
                    return $model->group->name;
                })
                ->addColumn('created_at', function(Product $model) {
                    return $model->created_at;
                })
                ->addColumn('created_at_format', function(Product $model) {
                    return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
                })
                ->make();
        }
    
        public function columns(): array
        {
            return [
                Column::add()
                    ->title('ID')
                    ->field('id')
                    ->searchable()
                    ->sortable()
                    ->make(),
    
                Column::add()
                    ->title('Descrição')
                    ->field('name')
                    ->searchable()
                    ->sortable()
                    ->make(),
    
                Column::add()
                    ->title('GrupoID')
                    ->field('group_id')
                    ->hidden()
                    ->make(),
    
                Column::add()
                    ->title('Grupo')
                    ->field('group_name')
                    ->makeInputSelect(Group::all(), 'name', 'group_id', ['live_search' => true ,'class' => ''])
                    ->searchable()
                    ->sortable()
                    ->make(),
    
                Column::add()
                    ->title('Criado em')
                    ->field('created_at')
                    ->hidden()
                    ->make(),
    
                Column::add()
                    ->title('Criado em')
                    ->field('created_at_format')
                    ->makeInputDatePicker('created_at')
                    ->searchable()
                    ->make(),
            ];
        }
    
        public function actions(): array
        {
            return [
                Button::add('edit')
                    ->caption('Editar')
                    ->class('btn btn-primary')
                    ->route('user.edit', ['id' => 'id'])
                    ->make(),
    
                Button::add('delete')
                    ->caption('Excluir')
                    ->class('btn btn-danger')
                    ->route('user.delete', ['id' => 'id'])
                    ->make(),
            ];
        }
    }
```

### `->route(string, array)`

string = route name
array = route parameters, for example route resource: `Route::resource('products', 'ProductController');`

    array example:
        [
            'id' => 'id'
        ] 
    represents:
        [
            'parameter_name' => 'field' (to get value from this column) 
        ]
    in this case we will have:
        [
            'id' => 1
        ]

And then call him:

```html
    <livewire:product-table/> or @livewire('product-table')
```
# Publishing Files

Publishing files is optional.

Publishing the table view files:

```bash
    php artisan vendor:publish --tag=datatable-views
```
