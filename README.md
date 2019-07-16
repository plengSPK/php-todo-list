# php-todo-list
  
Basic Todo List system with bootstrap 4

## Prerequisites
#### MySql Server
Table  **tasks**
- task_id `PRIMARY KEY`
- task_name `VARCHAR`
- due_date `DATE`
- priority_id `INT+INDEX`
- finished `TINYINT`

Table  **priorities**
- priority_id `PRIMARY KEY`
- priority_name `VARCHAR`
