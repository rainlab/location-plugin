<?php namespace RainLab\Location\ContentFields;

use RainLab\Location\Models\State;
use Tailor\Classes\ContentFieldBase;
use October\Contracts\Element\FormElement;
use October\Contracts\Element\ListElement;
use October\Contracts\Element\FilterElement;

/**
 * StateField provides a state dropdown for Tailor blueprints.
 *
 * Usage in blueprint:
 *
 *   state:
 *       label: State
 *       type: state
 *       countryFrom: country
 *       placeholder: -- select state --
 *
 * The `countryFrom` property specifies the field name of the associated
 * country field. When used with `dependsOn`, the state dropdown updates
 * based on the selected country.
 *
 * @package rainlab\location
 * @author Alexey Bobkov, Samuel Georges
 */
class StateField extends ContentFieldBase
{
    /**
     * @var string countryFrom field name to source country_id from
     */
    public $countryFrom = 'country';

    /**
     * defineConfig will process the field configuration.
     */
    public function defineConfig(array $config)
    {
        if (isset($config['countryFrom'])) {
            $this->countryFrom = (string) $config['countryFrom'];
        }
    }

    /**
     * defineFormField will define how a field is displayed in a form.
     */
    public function defineFormField(FormElement $form, $context = null)
    {
        $config = $this->config + ['placeholder' => '-- select state --'];

        $field = $form->addFormField($this->fieldName, $this->label)
            ->useConfig($config)
            ->displayAs('dropdown');

        if (!isset($this->config['dependsOn'])) {
            $field->dependsOn([$this->countryFrom]);
        }
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
            State::class,
            'key' => $this->fieldName.'_id',
            'replicate' => false
        ];

        $countryFrom = $this->countryFrom;

        $model->addDynamicMethod('get'.studly_case($this->fieldName).'Options', function () use ($model, $countryFrom) {
            $countryId = $model->{$countryFrom.'_id'};
            return State::getNameList($countryId);
        });
    }

    /**
     * extendDatabaseTable adds the state foreign key column.
     */
    public function extendDatabaseTable($table)
    {
        $table->integer($this->fieldName.'_id')->unsigned()->nullable();
    }
}
