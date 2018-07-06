<section id="todoapp" >
  <header id="header">
    <h1>todos</h1>
    <form id="todo-form" ng-submit="addTodo()">
      <input id="new-todo" placeholder="What needs to be done?" ng-model="newTodo" ng-disabled="saving" autofocus>
    </form>
  </header>
  <section id="main" ng-show="todos.length" ng-cloak>
    <input id="toggle-all" type="checkbox" ng-model="allChecked" ng-click="markAll(allChecked)">
    <label for="toggle-all">Mark all as complete</label>
    <ul id="todo-list">
      <li ng-repeat="todo in todos| filter:statusFilter track by $index" ng-class="{completed: todo.is_done, editing: todo == editedTodo}">
        <div class="view">
          <input class="toggle" type="checkbox" ng-model="todo.is_done" ng-change="toggleCompleted(todo)">
          @verbatim
            <label ng-dblclick="editTodo(todo)">{{todo.title}}</label>
          @endverbatim
          <button class="destroy" ng-click="removeTodo(todo)"></button>
        </div>
        <form ng-submit="saveEdits(todo, 'submit')">
          <input class="edit" ng-trim="false" ng-model="todo.title" todo-escape="revertEdits(todo)" ng-blur="saveEdits(todo, 'blur')" todo-focus="todo == editedTodo">
        </form>
      </li>
    </ul>
  </section>
  <footer id="footer" ng-show="todos.length" ng-cloak>
      @verbatim
        <span id="todo-count"><strong>{{remainingCount}}</strong>
      @endverbatim
      <ng-pluralize count="remainingCount" when="{ one: 'item left', other: 'items left' }"></ng-pluralize>
    </span>
    <ul id="filters">
      <li>
        <a ng-class="{selected: status == ''} " href="#/">All</a>
      </li>
      <li>
        <a ng-class="{selected: status == 'active'}" href="#/active">Active</a>
      </li>
      <li>
        <a ng-class="{selected: status == 'completed'}" href="#/completed">Completed</a>
      </li>
    </ul>
    <button id="clear-completed" ng-click="clearCompletedTodos()" ng-show="completedCount">Clear completed</button>
  </footer>
</section>
