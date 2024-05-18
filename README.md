# Crud Generator Laravel 9 and 10 (your time saver)

Crud Generator Laravel is a package that you can integrate in your Laravel to create a REAL CRUD. It includes :

- **Controller** with all the code already written
- **Views** (index, create, edit, show)
- **Model** with relationships
- **Request** file with validation rules
- **Migration** file

And since 1.9.2, a complete **REST API** !


If you find this project useful, please consider giving it a star⭐. It helps me prioritize and focus on keeping project up-to-date. Thank you for your support!


## Installation

1\. Run the following composer command:

``` composer require ahaduzzamanapon/makecrud --dev ```

2\. If you don't use Laravel Collective Form package in your project, install it:

``` composer require laravelcollective/html ```

<sub>(Note: This step is not required if you don't need views.)</sub>

3\. Publish the configuration file, stubs and the default-theme directory for views:

``` php artisan vendor:publish --provider="ahaduzzamanapon\makecrud\MakecrudServiceProvider" ```


## Usage

### Create CRUD (or REST API)

Let's illustrate with a real life example : Building a blog

A `Post` has many (hasMany) `Comment` and belongs to many (belongsToMany) `Tag`

A `Post` can have a `title` and a `content` fields

Let's do this 🙂

<

#### CRUD generator command :

``` php artisan make:crud nameOfYourCrud "column1:type, column2" ``` (theory)

``` php artisan make:crud post "title:string, content:text" ``` (for our example)




Now let's add our relationships (`Comment` and `Tag` models) :



We add a `hasMany` relationship between our `Post` and `Comment`
and a `belongsToMany` with `Tag`

Two migrations are created (`create_posts` AND `create_post_tag`).

`create_posts` is your table for your `Post` model

`create_post_tag` is a pivot table to handle the `belongsToMany` relationship

`Post` model is generated too with both relationships added


### Migration

Both migration files are created in your **database/migrations** directory. If necessary edit them and run :
   
``` php artisan migrate ```

### Controller

A controller file is created in your **app/Http/Controllers** directory. All methods (index, create, store, show, edit, update, destroy) are filled with your fields.

### Routes

To create your routes for this new controller, you can do this :

``` Route::resource('posts', PostsController::class); ``` <sub><sup>(don't forget to import your `PostsController` in your `web.php` file)</sup></sub>

##### Screenshots

`/posts/create` :


`/posts` :

You can `edit` and `delete` your new post. And a `show` page is created too 🙂

### Request

A request file is created in your **app/Http/Requests** directory. By default, all fields are required, you can edit it according to your needs.

### Views

A views directory is created in your **resources/views** directory.


You can create views independently of the CRUD generator with :
``` php artisan make:views nameOfYourDirectoryViews "column1:type, column2" ```

## Finish your blog

Add your `Comment` CRUD (with a column `comment` and a `post_id`)

``` php artisan make:crud comment "comment:text, post_id:integer" ```

Add your `Tag` CRUD (with a `column` name)

``` php artisan make:crud tag "name" ```

FYI : `Comment` is a specific case and you can use `make:commentable` command


Finished 🎉

## Remove a CRUD

You can delete all files (except migrations) created by the `make:crud` command at any time. No need to remove files manually :

``` php artisan rm:crud nameOfYourCrud --force ```

``` php artisan rm:crud post --force ``` (in our example)

The `--force` flag (optional) deletes all files without confirmation



## License


## Other Projects

Explore my other projects on GitHub:

- **[LaraFileEncrypter](https://github.com/misterdebug/laravel-file-encrypter)**: Secure your files in Laravel with AES-256 encryption, without persistent key storage hassle.
# makecrud
