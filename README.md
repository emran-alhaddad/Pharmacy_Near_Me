# Project and code roles

## branch's name

`v-1.1/branchName`

example

```
`v-1.1/login`
```

## Github/git roles

The commit type can include the following:

`add` – a new feature

`fix` – a bug fix has occurred

## Names

| What           | How                                  | Example                 |
| -------------- | ------------------------------------ | ----------------------- |
| Controller     | singular                             | ArticleController       |
| -              | -                                    | -                       |
| Route          | plural                               | /articles/2             |
| -              | -                                    | -                       |
| Model          | singular                             | User                    |
| Model property | snake_case                           | $model->created_at      |
| -              | -                                    | -                       |
| Table          | plural                               | article_comments        |
| Table column   | snake_case without model name        | title                   |
| -              | -                                    | -                       |
| Primary key    | -                                    | id                      |
| Foreign key    | singular model name with \_id suffix | article_id              |
| -              | -                                    | -                       |
| Method         | camelCase                            | getAll                  |
| Variable       | camelCase                            | $articlesWithAuthor     |
| -              | -                                    | -                       |
| View           | kebab-case                           | show-filtered.blade.php |
| -------------- | ------------------------------------ | ----------------------- |

## controller and routers

| Verb   | URI                 | why                  | Function name |
| ------ | ------------------- | -------------------- | ------------- |
| GET    | `/photos`           | show all items page  | index         |
| GET    | `/photos/{id}`      | show one item page   | show          |
| GET    | `/photos/create`    | create new item page | create        |
| GET    | `/photos/{id}/edit` | edit one item page   | edit          |
| POST   | `/photos`           | store new item       | store         |
| PUT    | `/photos/{id}`      | update item          | update        |
| DELETE | `/photos/{id}`      | delete item          | destroy       |

example

```php
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
```

---

---

## upload folders

```
/upload/user
/upload/pharmacy
/upload/ads
/upload/service
/upload/order
```

---

---

## Leader roles

### Github/git roles

`feat` – a new feature is introduced

`fix` – a bug fix has occurred

`refactor` – refactored code that neither fixes a bug nor adds a feature

`docs` – updates to documentation such as a the README or other markdown files

`style` – changes that do not affect the meaning of the code, likely related to code formatting such as white-space, missing semi-colons, and so on.

`test` – including new or correcting previous tests

`perf` – performance improvements

`build` – changes that affect the build system or external dependencies

---

### Validation roles

```php
# title
'required|min:5|max:100|alpha'
#phone
# link
 'required|min:5|max:255|url'
# email
# image
'required|image|mimes:png,jpg'
# date
'required|date'
```
