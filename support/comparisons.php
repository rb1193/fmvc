<?php

function equals($value, $compare): bool {
    return $value === $compare;
}

function notequals ($value, $compare): bool {
    return !equals($value, $compare);
}