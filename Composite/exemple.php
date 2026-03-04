<?php

interface SpentTime {
  public function spentTime(): int;
}

class Task implements SpentTime{
  private array $subTasks;
  /**
   * Time spent in minutes
   */
  private int $spentTime;

  
  public function __construct(int $spentTime, ?array $subTasks = [])
  {
    $this->subTasks = $subTasks;
    $this->spentTime = $spentTime;
  }

  public function add(Task $subTask) {
    $this->subTasks[] = $subTask;
  }

  public function remove(Task $subTask) {
    $key = array_search($subTask, $this->subTasks);
    unset($this->subTasks[$key]);
  }

  public function spentTime():int 
  {
    $spentTime = $this->spentTime;
    foreach ($this->subTasks as $subTask){
      $spentTime += $subTask->spentTime();
    }
    return $spentTime;
  }
}
$task1 = new Task(60, [new Task(50), new Task(30)]);
$task2 = new Task(5, [$task1, new Task(40)]);
$task3 = new Task(45, [new Task(10), new Task(171)]);
$task4 = new Task(32, [$task3]);
$task5 = new Task(87, [$task4, new Task(50)]);
$task6 = new Task(184, [new Task(10), $task5, $task2]);

var_dump($task2->spentTime());
var_dump($task4->spentTime());
var_dump($task6->spentTime());