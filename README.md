# Trackabara

## About Trackabara

Trackabara is a RESTful API for helping track pesty capybaras. The API provides endpoints for adding new capybaras, including their name, color, and size, as well as an observations endpoint to track capybara movements between major cities like Chicago, Atlanta, New York, Houston, and San Francisco.

We are currently tracking 3 particularly pesky capybaras named Colossus, Steven, and Capybaby. Feel free to help us track these rodents with new observations, or let us know about other capybaras you have observed as well!

## Table of contents
1. [Installation](#Installation)
2. [Trackabara API](#trackabara-api)
    1. [GET /api/capybaras](#capybaras-endpoint)
    2. [GET /api/observations](#observations-endpoint)

---

## Installation

1. Clone this repo to your machine `git clone git@github.com:larrybarker/trackabara.git`
2. Install composer dependencies `composer install`
3. Copy the env example to your project root `cp .env.example .env`
4. Generate a new application key `php artisan key:generate`
5. Create a new database named `trackabara`
6. Run database migrations `php artisan migrate`
7. Optionally seed data to get started `php artisan db:seed`

### Testing

A basic test suite is including to ensure capybaras can be added to the datbase and that observations are unique to a specific capybara, city, and date combination.

You can run the test suite with PHPUnit by running the following command from your project root:

`vendor/bin/phpunit`

---

## Trackabara API <a name="trackabara-api"></a>

The Trackabara API enables users to add new capybaras to the database and track their movements through observations.

### Endpoints

`POST /api/capybaras` <a name="capybaras-endpoint"></a>

Adds a new `Capybara` instance to the database.

| Property      | Description | Type | Required |
| ----------- | ----------- | ----------- | ----------- |
| name        | The name of the capybara must be unique       | string | yes |
| color   | The color of the capybara is either `brown`, `gray`, `yellow` or `black`       | string | yes |
| size | The size of the capybara is either `small`, `medium`, or `large` | string | yes

### Example Request

```
POST /api/capybaras HTTP/1.1
Host: 127.0.0.1:8000
Content-Type: application/json
Accept: application/json

{
    "name": "Larry",
    "color": "brown",
    "size": "medium"
}
```

### Example Response

```
HTTP/1.1 201 Created
Host: 127.0.0.1:8000
Date: Mon, 01 Mar 2021 00:54:09 GMT
Connection: close
{
  "capybara": {
    "id": 4,
    "name": "Larry",
    "color": "brown",
    "size": "medium"
  },
  "message": "Successfully added a new capybara to the database."
}
```

## Observation API <a name="observation-api"></a>

The Observation API enables users to track capybara movements.

### Endpoints <a name="observation-api-endpoints"></a>

`POST /api/observations` <a name="observations-endpoint"></a>

Adds a new `Observation` instance to the database.

| Property      | Description | Type | Required |
| ----------- | ----------- | ----------- | ----------- |
| capybara_name        | The name of the capybara exist in the database       | string | yes |
| city   | Currently supported cities are `Chicago`, `Atlanta`, `New York`, `Houston`, and `San Francisco`       | string | yes |
| wearing_hat | You may optionally indicate whether or not the capybara was wearing a hat | boolean | no
| observed_on | The date the capybara was observed. We do our best to parse as many date formats as possible, but prefer `YYYY-mm-dd` | string | yes

### Example Request

```
POST /api/observations HTTP/1.1
Host: 127.0.0.1:8000
Content-Type: application/json
Accept: application/json

{
 	"capybara_name": "Larry",
 	"city": "Chicago",
 	"observed_on": "2021-02-23",
 	"wearing_hat": 0
}
```

### Example Response

```
HTTP/1.1 201 Created
Host: 127.0.0.1:8000
Date: Mon, 01 Mar 2021 01:02:34 GMT

{
  "observation": {
    "capybara_name": "Larry",
    "city": "Chicago",
    "observed_on": "2021-02-23",
    "wearing_hat": false
  },
  "message": "Successfully added a new capybara observation."
}
```

---

## Core Framework

Trackabara is build using the latest version of Laravel (8.x as of this writing). Learn more about Laravel from the [documentation](https://laravel.com/docs).

## Contributors

Trackabara was solely developed by [Larry Barker](mailto:larry@larrybarker.me). You can find me on the following platforms:

- [Check my website](https://www.larrybarker.me) for my contact information or portfolio.
- [Follow me on twitter](https://www.twitter.com/thelarrybarker) for Laravel tips and tricks.
- [Follow me on Facebook](https://www.facebook.com/larryisonline) for marketing information.
- [Join me on slack](https://devict.slack.com) @Larry B to chat.

## Security Vulnerabilities

If you feel Trackabara is compromising the security of your local community due to negligent or inaccurate capybara tracking (or if you find a valid security vulnerability 😉), please send an e-mail to Larry Barker via [larry@larrybarker.com](mailto:larry@larrybarker.me).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
