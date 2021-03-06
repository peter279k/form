<?php

declare(strict_types=1);

namespace Brick\Form\Element;

use Brick\Form\Attribute\ValueAttribute;
use Brick\Form\Element;
use Brick\Html\Tag;

/**
 * Represents a button element.
 */
abstract class Button extends Element
{
    use ValueAttribute;

    /**
     * @var Tag|null
     */
    private $tag;

    /**
     * {@inheritdoc}
     */
    protected function getTag() : Tag
    {
        if ($this->tag === null) {
            $this->tag = new Tag('button', [
                'type' => $this->getType()
            ]);
        }

        return $this->tag;
    }

    /**
     * @param string $text
     *
     * @return static
     */
    public function setTextContent(string $text) : Button
    {
        $this->tag->setTextContent($text);

        return $this;
    }

    /**
     * @param string $html
     *
     * @return static
     */
    public function setHtmlContent(string $html) : Button
    {
        $this->tag->setHtmlContent($html);

        return $this;
    }

    /**
     * Renders the opening tag.
     *
     * @return string
     */
    public function open() : string
    {
        return $this->getTag()->renderOpeningTag();
    }

    /**
     * Renders the closing tag.
     *
     * @return string
     */
    public function close() : string
    {
        return $this->getTag()->renderClosingTag();
    }

    /**
     * Returns the type of this button.
     *
     * @return string
     */
    abstract protected function getType() : string;
}
