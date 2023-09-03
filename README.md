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

## [2. Project Guide](#2-step-by-step-guide)


<br>

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

### Models and Migrations

1. Creating
    1. User model already exists. Will make changes to it if and when required. 
    2. **`php artisan make:model UserProfile -m`**
    3. **`php artisan make:model Book -m`**
    4. **`php artisan make:model Shelves -m`**
    5. **`php artisan make:model ShelfJunction -m`**
    6. **`php artisan make:migration insert_default_shelves`** [will insert the default shelves: read, reading and tbr]

2. Editing Migrations (example with user_profoiles_table)
    1. Define table structure like so: <br>
    <pre>
        Schema::create('user_profiles', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->notNullable();
            $table->string('username')->notNullabe();
            $table->float('avg_rating',2,1)->nullable()->default('0');
            $table->bigInteger('total_read')->nullable()->default('0');
            $table->bigInteger('reading_goal')->nullable()->default('0');
            $table->timestamps();
        });
    </pre>
        
    2. Define Relationship with other tables: <br>
        <pre>
        Schema::table('user_profiles', function($table){
                $table->foreign('user_id')->reference('id')->on('users');
        });
        </pre>

    3. Because Eloquent does not support sql checks, write them separately: <br>
    <pre>
        DB::statement('
        ALTER TABLE user_profiles
        ADD CONSTRAINT anv_rating_check CHECK (avg_rating >= 0 AND avg_rating <= 5)
        ');
    </pre> 
        ALTERNATELY / ADDITIONALLY: We can add these checks during validation
    
    4. Using Composite Primary Key <br>
        <pre>$table->primary(['book_id', 'shelf_id']);</pre>
        In doing so, you just specify the primary key in the model as well:
        <pre>protected $primaryKey = ['book_id', 'shelf_id'];</pre>

3. 

# Resources Used
1. [ Working with Laravel Compoite Keys](https://medium.com/@przyczynski/laravel-working-with-composite-keys-8c4b282f5523)
2. 