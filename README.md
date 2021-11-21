

## About 

Simple backend project, an API service for a messaging feature. Build with <b>Laravel</b> framework.

- Users can send a message to another user.
- Users can list all messages in a conversation between them and another user.
- User can reply to a conversation they are involved with.
- User can list all their conversations.



## How to run 

1. Clone this repository to your local.
2. On terminal "cd" to directory of this repo then run "composer instal"
3. Import "message.sql" file to your database.
4. Duplicate .env.example file then rename to .env
5. Back to your terminal then run "php artisan key:generate"
6. Setting database connection in .env, change this line of code DB_DATABASE=laravel to DB_DATABASE=message
7. Run your project in terminal "php artisan serve"

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
