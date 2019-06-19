<?php declare(strict_types=1);

class ToDoList
{
  private $todos;

  function __construct()
  {
    $this->todos = [];
  }

  function __get($fieldName)
  {
    return $this->$fieldName;
  }

  function add($todo)
  {
    $this->todos[] = $todo;
  }
}