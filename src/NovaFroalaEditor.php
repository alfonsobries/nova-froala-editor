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
                'width' => 640,
                'height' => 390,
                'mute' => true,
                'playerOptions' => []
            ]
        ]);
    }

    public function playerHeight(int $height)
    {
        return $this->options(compact('height'));
    }

    protected function options(array $options)
    {
        $currentOptions = $this->meta['options'];

        return $this->withMeta([
            'options' => array_merge($currentOptions, $options)
        ]);
    }

    public function playerWidth(int $width)
    {
        return $this->options(compact('width'));
    }

    public function mute(bool $mute)
    {
        return $this->options(compact('mute'));
    }

    public function playerOptions(array $options)
    {
        return $this->options(['playerOptions' => $options]);
    }
}
