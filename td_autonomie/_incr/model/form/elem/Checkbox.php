<?php

declare(strict_types=1);

namespace model\form\elem;

use model\form\Input;

final class Checkbox extends Input 
{
    protected string $type = 'checkbox'; 

    public function render(): string
    {
        return sprintf(
            '<div>
                <input type="%s" %s value="%s" name="form[%s][]" id="%s"/>
                <label for="%s">%s</label>
            </div>', 
            $this->type,
            $this->isRequired() ? 'required="required"' : '',
            $this->getValue(),
            $this->getName(),
            $this->getId(),
            $this->getId(),
            $this->getLabel()
        );
    }
}