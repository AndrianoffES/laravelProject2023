<?php

namespace App\Enums\News;

enum StatusEnum: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case  BLOCKED = 'blocked';
    case DELETED = 'deleted';

    public static function getStatus(): array
    {
        return [
            self::DRAFT->value,
            self::BLOCKED->value,
            self::DELETED->value,
            self::PUBLISHED->value
        ];
    }
}
