<h3>
  To-Do Application
</h3>
<ul>
  <?php
  foreach ($toDoList1->todos as $todo) {
    $isDoneSymbol = $todo->isDone ? '✓' : '&nbsp;&nbsp;&nbsp;';
    echo "<li>($isDoneSymbol) $todo->title </li>";
  }
  ?>
</ul>