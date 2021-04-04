<?php


namespace LuanFreitasDev\LivewireDataTables;

class Column
{

    public array $column = [];

    /**
     * @return static
     */
    public static function add()
    {
        return new static();
    }

    /**
     * Column title representing a field
     *
     * @param string $title
     * @return $this
     */
    public function title(string $title): Column
    {
        $this->column['title'] = $title;
        return $this;
    }

    /**
     * Will enable the column for search
     *
     * @return $this
     */
    public function searchable(): Column
    {
        $this->column['searchable'] = true;
        return $this;
    }

    /**
     * Will enable the column for sort
     *
     * @return $this
     */
    public function sortable(): Column
    {
        $this->column['sortable'] = true;
        $this->column['html'] = false;
        return $this;
    }

    /**
     * Field name in the database
     *
     * @param string $field
     * @param string $relation_name
     * @param string $relation_field
     * @return $this
     */
    public function field(string $field, string $relation_name='', string $relation_field=''): Column
    {
        $this->column['field'] = $field;
        if (filled($relation_name) && filled($relation_field)) {
            $this->column['relation_name'] = $relation_name;
            $this->column['relation_field'] = $relation_field;
        }
        return $this;
    }

    /**
     * Class html tag header table
     *
     * @param string $class_attr
     * @param string|null $style_attr
     * @return $this
     */
    public function headerAttribute(string $class_attr, string $style_attr=null): Column
    {
        $this->column['header_class'] = $class_attr;
        $this->column['header_style'] = $style_attr;
        return $this;
    }

    /**
     * Class html tag body table
     *
     * @param string $class_attr
     * @param string|null $style_attr
     * @return $this
     */
    public function bodyAttribute(string $class_attr, string $style_attr=null): Column
    {
        $this->column['body_class'] = $class_attr;
        $this->column['body_style'] = $style_attr;
        return $this;
    }

    /**
     * When the field has any changes within the scope using Collection
     *
     * @return $this
     */
    public function html(): Column
    {
        $this->column['html'] = true;
        $this->column['sortable'] = false;
        return $this;
    }

    public function visibleInExport(bool $visible): Column
    {
        $this->column['visible_in_export'] = $visible;
        $this->column['searchable'] = false;
        return $this;
    }


    /**
     * Add the @datatableFilter directive before the body
     *
     * @param string $class_attr
     * @param array $config [
        'only_future' => true,
        'no_weekends' => true
     ]
     * @return $this
     */
    public function filterDateBetween(string $class_attr='', array $config=[]): Column
    {
        $this->column['filter_date_between'] = [
            'enabled' => true,
            'config' => $config,
            'class' => (blank($class_attr)) ? 'col-3': $class_attr
        ];
        return $this;
    }

    public function link(string $url): Column
    {
        $this->column['link'] = $url;
        return $this;
    }

    public function make(): array
    {
        return $this->column;
    }

    /**
     * @param $data_source
     * @param string $display_field
     * @param array $settings
     * @return $this
     */
    public function makeInputSelect($data_source, string $display_field, array $settings=[]): Column
    {
        $this->column['inputs']['select']['data_source'] = $data_source;
        $this->column['inputs']['select']['display_field'] = $display_field;
        $this->column['inputs']['select']['class'] = $settings['class'] ?? '';
        $this->column['inputs']['select']['live-search'] = $settings['live-search'] ?? true;

        return $this;
    }

    /**
     * @param string $class_attr
     * @param array $settings
     * @return Column
     */
    public function makeInputDatePicker(string $class_attr='', array $settings=[]): Column
    {
        $this->column['inputs']['date_picker']['enabled'] = true;
        $this->column['inputs']['date_picker']['class'] = $class_attr;
        $this->column['inputs']['date_picker']['config'] = $settings;
        return $this;
    }


}
