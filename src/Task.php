<?php

namespace Dmitry\Faststudy;

use Dmitry\Faststudy\Enums\TaskStatusEnum;
use Stringable;
use JsonSerializable;
use Serializable;

class Task implements Stringable, JsonSerializable, Serializable
{
    protected bool $taskIsDone = false;

    public function __construct(
        protected string $taskName,
        protected int $taskId,
        protected TaskStatusEnum $taskStatus = TaskStatusEnum::OPEN
    ) {
        //
    }

    public function getNextId(): int
    {
        return $this->taskId;
    }

    public function getTaskName(): string
    {
        return $this->taskName;
    }

    public function getTaskStatus(): TaskStatusEnum
    {
        return $this->taskStatus;
    }

    public function isTaskDone(): bool
    {
        return $this->taskIsDone;
    }

    public function setTaskIsDone(bool $taskIsDone): void
    {
        $this->taskIsDone = $taskIsDone;
        $this->taskStatus = $taskIsDone ? TaskStatusEnum::DONE : $this->taskStatus;
    }

    public function getTaskStatuses(): array
    {
        return [
            [
                'key' => TaskStatusEnum::DONE->value,
                'title' => TaskStatusEnum::DONE->label()
            ],
            [
                'key' => TaskStatusEnum::IN_PROGRESS->value,
                'title' => TaskStatusEnum::IN_PROGRESS->label()
            ],
            [
                'key' => TaskStatusEnum::OPEN->value,
                'title' => TaskStatusEnum::OPEN->label()
            ]
        ];
    }

    public function toArray(): array
    {
        return [
            'taskId' => $this->taskId,
            'taskName' => $this->taskName,
            'taskStatus' => $this->taskStatus,
            'taskIsDone' => $this->taskIsDone
        ];
    }

    public function __toString(): string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function __serialize(): array
    {
        return $this->toArray();
    }

    public function __unserialize(array $data): void
    {
        $this->taskId = $data['taskId'] ?? 0;
        $this->taskName = $data['taskName'] ?? '';
        $this->taskStatus = $data['taskId'] ?? TaskStatusEnum::OPEN;
        $this->taskIsDone = $data['taskIsDone'] ?? false;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function serialize(): string
    {
        return $this->__toString();
    }

    public function unserialize(string $data): void
    {
        $this->__unserialize(json_decode($data, true));
    }
}