<?php
namespace Coroutine\Kernel;

use Coroutine\Entity\TaskInterface;
use React\EventLoop\LoopInterface;

interface KernelInterface extends LoopInterface
{
    const TASK_DELAY_USEC = 10000;
    const TASK_IO_POLLING = 'kernel:io:polling';

    function schedule(\Generator $task, string $title = 'unknown'): int;
    function scheduleTask(TaskInterface $task): int;

    function kill(int $pid);

    function handleIoRead($socket, TaskInterface $task);
    function handleIoWrite($socket, TaskInterface $task);
}
