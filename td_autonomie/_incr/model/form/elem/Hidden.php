<?php

declare(strict_types=1);

namespace model\form\elem;

use model\form\Input;

final class Hidden extends Input {
    protected string $type = 'hidden'; 
}
