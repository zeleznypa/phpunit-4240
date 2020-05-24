<?php

declare(strict_types=1);

namespace Zeleznypa\Phpunit4240;

use RuntimeException;

use function array_key_exists;

/**
 * @method Fluent from($table, ...$args = null)
 */
class Fluent
{
    /** @var string */
    protected $from;

    /**
     * Appends new argument to the clause.
     */
    public function __call(string $clause, array $args): self
    {
        if (($clause === 'from') && (array_key_exists(0, $args) === true)) {
            $this->from = $args[0];
        } else {
            throw new RuntimeException('Unsupported operation');
        }
        return $this;
    }

    /**
     * From getter
     *
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

}
