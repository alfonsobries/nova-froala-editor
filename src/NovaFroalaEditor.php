<?php

namespace Vexilo\NovaFroalaEditor;

use Laravel\Nova\Fields\Field;

class NovaFroalaEditor extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'froala-editor';

    public function __construct(string $name, ?string $attribute = null, ?mixed $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'options' => [
                'toolbarButtons' => ['bold', 'italic', 'underline', '|', 'formatOL', 'formatUL', '|', 'insertImage', 'insertLink', 'insertVideo', '|', 'html'],
                'toolbarButtonsXS' => ['bold', 'italic', 'underline', '|', 'formatOL', 'formatUL'],
                'heightMin' => 200,
            ]
        ]);
    }

    /**
     * Allow to pass any existing Froala option to the editor.
     * Consult the Froala documentation [https://www.froala.com/wysiwyg-editor/docs/options]
     * to view the list of all the available options:
     *
     * @param  array  $options
     * @return self
     */
    public function options(array $options)
    {
        $currentOptions = $this->meta['options'];
        
        return $this->withMeta([
            'options' => array_merge($currentOptions, $options)
        ]);
    }
}
