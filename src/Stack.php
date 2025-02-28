<?php

namespace Train\Tests\Stack;

function make()
{
    return [];
}

function isEmpty($stack)
{
    return empty($stack);
}

function push(&$stack, $item)
{
    array_push($stack, $item);
}

function pop(&$stack)
{
    if (isEmpty($stack)) {
        throw new \Exception('Нечего удалять из пустого стека');
    }
    return array_pop($stack);
}
