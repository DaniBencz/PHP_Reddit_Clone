<?php declare(strict_types=1);

class ToDoItem
{
  private static $currentId = 1;
  private $id;
  private $title;
  private $isDone;

  function __construct($title)
  {
    $this->id = ToDoItem::$currentId++;
    $this->title = $title;
    $this->isDone = false;
  }

  function __get($fieldName)
  {
    return $this->$fieldName;
  }

  function __set($name, $value)
  {
    $this->$name = $value;
  }
}