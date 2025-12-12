<?php

declare(strict_types=1);

namespace model\form;

use model\Input;

final class Hidden extends Input {
    protected string $type = 'hidden'; 
}
