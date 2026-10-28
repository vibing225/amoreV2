<?php

declare(strict_types=1);

namespace App;

/** Cleans and checks form input. Output is escaped later, in the views, not here. */
final class Validator
{
    private array $errors = [];

    public function __construct(private array $input)
    {
    }

    /** Trim, remove control characters, cut to a maximum length. Newlines are kept. */
    public static function clean(mixed $value, int $max = 255): string
    {
        if (!is_string($value)) {
            return '';
        }
        $value = preg_replace('/[^\P{C}\n]+/u', '', trim($value)) ?? '';
        return mb_substr($value, 0, $max);
    }

    public function value(string $field, int $max = 255): string
    {
        return self::clean($this->input[$field] ?? '', $max);
    }

    public function required(string $field, string $message, int $max = 255): void
    {
        if ($this->value($field, $max) === '') {
            $this->errors[] = $message;
        }
    }

    public function email(string $field, string $message): void
    {
        $value = $this->value($field, 190);
        if ($value === '' || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = $message;
        }
    }

    public function phone(string $field, string $message): void
    {
        // Same rule as the old site: digits, spaces, dashes, brackets, optional leading +.
        if (!preg_match('/^\+?[0-9\s\-\(\)]{8,20}$/', $this->value($field, 30))) {
            $this->errors[] = $message;
        }
    }

    /** Value must be one of the allowed values (stops forged select/radio values). */
    public function in(string $field, array $allowed, string $message): void
    {
        if (!in_array($this->value($field), $allowed, true)) {
            $this->errors[] = $message;
        }
    }

    /** At least one checked box, and every checked value must be allowed. */
    public function atLeastOneOf(string $field, array $allowed, string $message): void
    {
        $values = $this->input[$field] ?? [];
        if (!is_array($values) || $values === [] || array_diff($values, $allowed) !== []) {
            $this->errors[] = $message;
        }
    }

    public function tooLong(string $field, int $max, string $message): void
    {
        $raw = $this->input[$field] ?? '';
        if (is_string($raw) && mb_strlen(trim($raw)) > $max) {
            $this->errors[] = $message;
        }
    }

    public function fails(): bool
    {
        return $this->errors !== [];
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
