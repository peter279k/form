<?php

declare(strict_types=1);

namespace Brick\Form\Attribute;

/**
 * Provides the checked attribute to inputs.
 */
trait CheckedAttribute
{
    use IsElement;

    /**
     * @param bool $checked
     *
     * @return static
     */
    public function setChecked(bool $checked)
    {
        if ($checked) {
            $this->getTag()->setAttribute('checked', 'checked');
        } else {
            $this->getTag()->removeAttribute('checked');
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isChecked() : bool
    {
        return $this->getTag()->hasAttribute('checked');
    }
}
