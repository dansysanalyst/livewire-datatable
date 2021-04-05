<?php


namespace LuanFreitasDev\LivewireDataTables\Traits;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use LuanFreitasDev\LivewireDataTables\DataTableComponent;

trait Checkbox
{

    /**
     * @var bool
     */
    public bool $checkbox = false;
    /**
     * @var bool
     */
    public bool $checkbox_all = false;
    /**
     * @var array
     */
    public array $checkbox_values = [];
    /**
     * @var string
     */
    public string $checkbox_attribute;

    /**
     * @param string $attribute
     * @return DataTableComponent
     */
    public function showCheckBox(string $attribute = 'id'): DataTableComponent
    {
        $this->checkbox = true;
        $this->checkbox_attribute = $attribute;
        return $this;
    }

    public function updatedCheckboxAll()
    {
        $this->checkbox_values = [];

        if ($this->checkbox_all) {
            $this->dataSource()->each(function ($model) {
                $this->checkbox_values[] = (string)$model->{$this->checkbox_attribute};
            });
        }
    }

}
