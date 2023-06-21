<?php

namespace Dingo\Support\Builder\Contacts;

interface CaseProcessor
{
    public function case(): self;

    public function when(): self;

    public function then(): self;

    public function else(): self;

    public function end(): string;
}