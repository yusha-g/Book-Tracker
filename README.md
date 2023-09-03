# Blog-API-Laravel
<p>

Made using Laravel and Sanctum. <br>
Keep track of the books you've read. Set a reading goal and complete it. Add books to bookshelves.

_php 7.4.9, composer 2.6.1 with Laravel 8.83.27_

</p>
<hr>

# Table of Contents

## [1. Design](#1-project-design)

&ensp;&ensp; **[1.1. Database Design](#11-database-design)**

&ensp;&ensp; **[1.2. API Endpoints](#12-api-endpoints)**

## [2. Guide](#2-step-by-step-guide)

<hr>

# 1. Project Design

## 1.1. DataBase Design

### A Rough View of the Databases

![database design](/assets/DB%20Design.png)

### Users

-   id (PK, auto-increment)
-   email (unique)
-   pwd

### User Profile

-   id (PK, auto-increment)
-   user id (foreign key referencing Users(user_id) )
-   username (varchar)
-   avg_rating (float)
-   total_read (integer)
-   reading_goal (integer)

### Book
-   id (PK)
-   title (varchar)
-   author (varchar)
-   start_date (date)
-   end_date (date, >start_date)
-   rating (integer, <=5)

### Shelf Junction
-   book_id (FK referencing PK of Book table)
-   shelf_id (FK referencing PK of Shelves table)

### Shelves
-   id (PK)
-   name (varchar)


## 1.2. API Endpoints

# 2. Step-by-Step Guide 

### Setup
1. composer create-project laravel/laravel Book-Tracker
2. made necessary changes in .env

### Connecting to git
1. git init
2. git add .
3. git commit -m "first commit"
4. git remote add origin https://github.com/yusha-g/Book-Tracker.git 
5. git push -u origin master
