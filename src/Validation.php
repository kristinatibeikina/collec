<?php

namespace Validation;

use Illuminate\Database\Capsule\Manager as Capsule;

class Validator
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function rule($ruleName): bool
    {
        switch ($ruleName) {
            case 'required':
                return $this->checkRequired();
            case 'unique':
                return $this->checkCyrillic();
            // Добавьте другие правила валидации по мере необходимости
            default:
                return true; // По умолчанию считаем, что правило прошло валидацию
        }
    }

    protected function checkRequired(): bool
    {
        return !empty($this->value);
    }

    protected function checkCyrillic(): bool
    {
        return preg_match('/^[\p{Cyrillic}]+$/u', ($this->value));

    }
}