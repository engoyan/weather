# Weather

## Setup

Run
`composer install`

### Database
Create new database and update `.env` to reflect proper database connection.

### Migrations
`php artisan migrate`

Add Open Weather Map API key to `.env` file:

`OPENWEATHERMAP_KEY=key`

Generate GWT Key by running `php artisan jwt:generate` or add following line into `.env`

`JWT_SECRET=njfYlUaKGa0PZd9ZuSorMjmSr48hbvm9`

### Updating weather data
`php artisan weather:update [NUMER_OF_RECORDS=10]`

Where `NUMER_OF_RECORDS` is how many records to process. It will start with most out of date data. Default is 10.


