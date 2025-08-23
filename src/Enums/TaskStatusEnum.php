<?php

namespace Dmitry\Faststudy\Enums;

enum TaskStatusEnum: string
{
    case DONE = 'done';
    case IN_PROGRESS = 'in_progress';
    case OPEN = 'open';

    public function label(): string
    {
        return match ($this) {
            self::DONE => 'Выполнено',
            self::IN_PROGRESS => 'В процессе',
            self::OPEN => 'Открыто'
        };
    }
}
