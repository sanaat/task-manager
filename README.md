# Lazim Task Manager API

## Introduction
This is a simple RESTful API for managing a "Task Manager" application built with Laravel. It allows users to perform CRUD (Create, Read, Update, Delete) operations on tasks and implements basic authentication using Laravel Sanctum.

## Requirements
- PHP >= 8.0|8.1
- Composer
- MySQL

## Step
-Setup Laravel Project: Name Lazim Application;  Configure the database connection in the .env file.  
-Use Restful API for Validation :  Ensure all endpoints are functional and test them using Postman or any other API testing tool.
-Create Form with numeric password validation :  Implement basic authentication for securing the API endpoints. You can use Laravel Passport or Laravel Sanctum
-Create a Task Model and Migration:  Create an Eloquent model for the Task with appropriate relationships  
-Create TaskController with Store Method:  Create a Task Controller to handle CRUD operations  
-Define the Route: Define API routes in routes/api.php for the task management endpoints.

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-repo/lazim-task-manager.git
   cd lazim-task-manager
