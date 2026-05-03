<?php namespace RainLab\Location\ContentFields;

use RainLab\Location\Models\Country;
use Tailor\Classes\ContentFieldBase;
use October\Contracts\Element\FormElement;
use October\Contracts\Element\ListElement;
use October\Contracts\Element\FilterElement;

/**
 * CountryField provides a country dropdown for Tailor blueprints.
 *
 * Usage in blueprint:
 *
 *   country:
 *       label: Country
 *       type: country
 *       placeholder: -- select country --
 *
 * @package rainlab\location
 * @author Alexey Bobkov, Samuel Georges
 */
class CountryField extends ContentFieldBase
{
    /**
     * defineFormField will define how a field is displayed in a form.
     */
    public function defineFormField(FormElement $form, $context = null)
    {
        $config = $this->config + ['placeholder' => '-- select country --'];

        $form->addFormField($this->fieldName, $this->label)
            ->useConfig($config)
            ->displayAs('dropdown');
    }

    /**
     * defineListColumn will define how a field is displayed in a list.
     */
    public function defineListColumn(ListElement $list, $context = null)
    {
        $column = $list->defineColumn($this->fieldName, $this->label)
            ->shortLabel($this->shortLabel)
            ->relation($this->fieldName)
            ->sqlSelect('name');

        if (is_array($this->column)) {
            $column->useConfig($this->column);
        }
        else {
            $column->invisible();
        }
    }

    /**
     * defineFilterScope will define how a field is displayed in a filter.
     */
    public function defineFilterScope(FilterElement $filter, $context = null)
    {
        $filter->defineScope($this->fieldName, $this->label)
            ->displayAs('group')
            ->nameFrom('name')
            ->shortLabel($this->shortLabel)
            ->useConfig($this->scope ?: []);
    }

    /**
     * extendModelObject will extend the record model.
     */
    public function extendModelObject($model)
    {
        $model->belongsTo[$this->fieldName] = [
            Country::class,
            'key' => $this->fieldName.'_id',
            'replicate' => false
        ];

        $model->addDynamicMethod('get'.studly_case($this->fieldName).'Options', function () {
            return Country::getNameList();
        });
    }

    /**
     * extendDatabaseTable adds the country foreign key column.
     */
    public function extendDatabaseTable($table)
    {
        $table->integer($this->fieldName.'_id')->unsigned()->nullable();
    }
}