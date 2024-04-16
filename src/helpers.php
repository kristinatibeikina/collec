<?php

namespace Validation;

function validator($value)
{
    return new Validator($value);
}

function required($value)
{
    return validator($value)->rule('required');
}

function cyrillic($value)
{
    return validator($value)->rule('cyrillic');
}