<?php declare(strict_types=1);

require 'toDoItem.php';
require 'toDoList.php';


$helpArray = [];
$helpArray[] = $item1 = new ToDoItem('feed dog');
$helpArray[] = $item2 = new ToDoItem('get milk');
$item2->isDone = true;
$helpArray[] = $item3 = new ToDoItem('have fun');
$helpArray[] = $item4 = new ToDoItem("don't panic");
$toDoList1 = new ToDoList();

foreach ($helpArray as $item) {
  $toDoList1->add($item);
}

require 'view.php';
?>


<!-- print_r($toDoList1->todos);
echo $toDoList1->todos[0]->title; -->