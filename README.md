s# Project Name
# E_LearningPlatform
## Description
This project is an **Educational Platform** built with **Laravel 10** that provides a **RESTful API** for managing courses, students, and instructors. It allows users to perform **CRUD operations** (Create, Read, Update, Delete) on courses and users, with the ability to filter courses by category and sort them by creation date (ascending and descending), or apply both filtering and sorting simultaneously. The project follows **repository design patterns** and incorporates **clean code** and **refactoring principles**.

## Key Features
- CRUD Operations: Create, Read, Update, and Delete courses and user profiles on the platform.
- Filtering and Sorting: Filter courses by category and sort them by creation date, or apply both filtering and sorting simultaneously.
- Repository Design Pattern: Implement repositories and services to clearly separate concerns.
- Form Requests: Handle validation through custom form request classes.
- API Response Service: Provide standardized responses for API endpoints.
- Resources: Format API responses using Laravel resources to ensure a consistent structure.
- Seeders: Populate the database with initial data for testing and development.
- Course Browsing: Visitors can browse courses, and if they wish to enroll in a course on the platform, they must register for a student account.
- Instructor Enrollment: Instructors can join the list of trainers after submitting their resumes for management review.
- Lesson Viewing and Downloading: Students can view and download lessons as videos and PDF files.
- Rating: Students can rate the course and the instructor, helping to improve the quality of educational content and the learning experience.
## Technologies Used:
- **Node.js v14**
- **MySQL**
- **Laravel 10**
- **PHP**
- **XAMPP** (for local development environment)
- **Composer** (PHP dependency manager)
- **Postman** Collection: Contains all API requests for easy testing and interaction with the API.

## Installation
## Prerequisites
 Make sure you have the following installed on your machine:
- **XAMPP**: To run MySQL and Apache servers locally.
- **Composer**: For managing PHP dependencies.
- **PHP**: Required to run Laravel.
- **MySQL**: Database for the project.
- **Postman**: Required for testing requests.
## Steps to Run the Project
1. Clone the repository:
    bash
    git clone (https://github.com/NevinRashid/E_LearningPlatform.git)
2. Navigate to the project directory:
    bash
       cd E_LearningPlatform
3. Install dependencies:
    bash
    npm install 
    composer install
4. Set up the environment:
   -   cp .env.example .env
5. Run the application Key:
    bash
       php artisan key:generate
6. Run Migrations  
   php artisan migrate
7. Seed the Database 
   php artisan db:seed
8. Run the Application
   php artisan serve
9. Interact with the API
   Test various endpoints using the Postman collection.  
## Usage
Visitors can browse the platform and see the available courses. When they wish to enroll in a course, they must log in by providing their name, email, phone number, and a personal password, as well as uploading a profile picture. Registering allows them to enroll in multiple courses available on the platform. Additionally, registered students can submit their CVs to become instructors on the platform. Students can comment and reply to comments, as well as rate the courses after attending them; they can also evaluate the instructors. Students are able to download the video files and PDF materials related to the course they are enrolled in.## Contributing.
