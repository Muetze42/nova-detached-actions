<?php

namespace NormanHuth\NovaDetachedActions;

use Laravel\Nova\Actions\Action;
use NormanHuth\NovaBasePackage\HasIcons;

class DetachedAction extends Action
{
    use HasIcons;

    /**
     * Indicates if this action is only available on the resource index view.
     *
     * @var bool
     */
    public $onlyOnIndex = true;

    /**
     * Indicates if this action is only available on the resource detail view.
     *
     * @var bool
     */
    public $onlyOnDetail = false;

    /**
     * Indicates if this action is available on the resource index view.
     *
     * @var bool
     */
    public $showOnIndex = true;

    /**
     * Indicates if this action is available on the resource detail view.
     *
     * @var bool
     */
    public $showOnDetail = false;

    /**
     * Indicates if this action is available on the resource's table row.
     *
     * @var bool
     */
    public $showInline = false;

    /**
     * Indicates if this action is available on the resource's table row.
     */
    public bool $showDetached = true;

    /**
     * Indicates if this action is a destructive action.
     */
    public bool $isDestructive = false;

    /**
     * Classes for the button element.
     */
    protected array $buttonClasses;

    /**
     * Styles for the button element.
     */
    protected array $buttonStyles = [];

    public function __construct()
    {
        $this->buttonClasses = array_merge(
            (array) config('nova-detached-actions.base_button_style'),
            (array) config('nova-detached-actions.button_styles.primary'),
        );
        $this->icons['height'] = 11;
    }

    /**
     * Determine if this action is a destructive action.
     */
    public function isDestructive(bool $state = true): static
    {
        $this->isDestructive = $state;

        return $this;
    }

    /**
     * Set Button style.
     */
    public function setButtonStyle(string $style): static
    {
        $this->buttonClasses = array_merge(
            (array) config('nova-detached-actions.base_button_style'),
            (array) config('nova-detached-actions.button_styles.' . $style),
        );

        return $this;
    }

    /**
     * Add classes to the button.
     */
    public function addButtonClasses(string|array $classes): static
    {
        if (is_string($classes)) {
            $classes = array_filter(explode(' ', $classes));
        }

        $this->buttonClasses = array_unique(array_merge(
            $this->buttonClasses,
            $classes
        ));

        return $this;
    }

    /**
     * Set classes of the button.
     */
    public function setButtonClasses(string|array $classes): static
    {
        if (is_string($classes)) {
            $classes = array_filter(explode(' ', $classes));
        }

        $this->buttonClasses = $classes;

        return $this;
    }

    public function setButtonStyles(string|array $styles): static
    {
        if (is_string($styles)) {
            $styles = array_filter(explode(' ', $styles));
        }

        $this->buttonStyles = $styles;

        return $this;
    }

    /**
     * Prepare the action for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return array_merge([
            'icons' => array_merge($this->icons, [
                'classes' => $this->classes,
            ]),
            'showDetached' => $this->showDetached,
            'buttonClasses' => $this->buttonClasses,
            'buttonStyles' => $this->buttonStyles,
            'standalone' => false,
        ], parent::jsonSerialize(), [
            'destructive' => $this->isDestructive,
        ]);
    }
}
