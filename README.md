# Footy Finder

Footy Finder is a web application that makes daily calls to the Sportmonks API to populate a players table. The app keeps the players' data up to date by adding new players and updating existing ones with the latest information. It features an index of players and individual player profiles.

## Run Locally

To run the project locally, follow these steps:

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to a new file named `.env`
4. Add your Sportmonks API key to the `.env` file
5. Run `./vendor/bin/sail up`
6. Run `./vendor/bin/sail artisan migrate`
7. Start the queue worker by running `./vendor/bin/sail artisan queue:work`

## Populate the Database

To populate the database with player data, run:

```bash
./vendor/bin/sail artisan app:import-players
```

## Keep the Database Up to Date
To ensure that the database stays up to date, run the scheduler:

```bash
./vendor/bin/sail artisan schedule:work
```

This will update the database every night at midnight.

## Planned Improvements
- Implement caching for Countries and Players, so that constant calls to the database are not required after the initial request.
- Integrate a logging tool to monitor updates to the database from the API export.
- Find out and amend null types in importer tool. (sportmonks documentation wasn't very clear about types)
- Exception handling for the import tool so that the import doesn't get interrupted.
- Add feature tests for controller methods and routes to ensure the proper functionality and stability of the application.
- Middleware on laravel jobs to better scale rate limit handling
- 
