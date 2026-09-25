# Personal-Task-Manager# Personal Task Manager

## Project Code
WST21-PM-2026-SF

## Student Information

**Student Name:** Justin Pacaña  
**Course & Year:** Bachelor of Science in Information Technology – 2nd Year, Section 2

---

## Project Description

The **Personal Task Manager** is a simple web-based task management system developed using Laravel.

This system allows users to create, view, update, and delete tasks. It also allows users to change the status of a task between **Pending** and **Completed**.

The project demonstrates the basic Laravel structure:

**Routes → Controller → Model → Database → Blade**

---

## Database Used

**MySQL**

### Tasks Table

The `tasks` table contains the following fields:

| Field | Description |
|---|---|
| id | Unique Task ID |
| task_name | Name of the task |
| description | Details of the task |
| status | Pending or Completed |
| due_date | Task deadline |
| created_at | Date the task was created |
| updated_at | Date the task was updated |

---

## Features

### 1. Add Task
Users can create a new task by entering:

- Task Name
- Description
- Status
- Due Date

### 2. View Tasks
Users can view all saved tasks in the task list.

### 3. Edit Task
Users can update the information of an existing task.

### 4. Delete Task
Users can remove a task from the system.

### 5. Update Status
Users can change the task status between:

- Pending
- Completed

---

## Technologies Used

- Laravel
- PHP
- MySQL
- Blade
- HTML
- CSS

---

## Laravel Components Used

### Routes
Routes handle the URLs and connect user requests to the controller.

### Controller
The `TaskController` handles adding, viewing, editing, updating, deleting, and changing the status of tasks.

### Model
The `Task` model connects the application to the `tasks` database table.

### Database
MySQL is used to store the task information.

### Blade Views
Blade templates are used to display the task manager interface.

---

## Project Structure

```text
app/
├── Http/
│   └── Controllers/
│       └── TaskController.php
│
└── Models/
    └── Task.php

database/
└── migrations/
    └── create_tasks_table.php

resources/
└── views/
    └── tasks/
        ├── index.blade.php
        ├── create.blade.php
        └── edit.blade.php

routes/
└── web.php