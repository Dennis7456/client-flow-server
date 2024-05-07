# Laravel Backend

The Laravel backend implements two essential services using Docker images:

1. **Laravel API**
2. **MySQL Database**

All images are bundled into one container and need to be pulled from Docker Hub. The Laravel API implements both web and API authentication engines using Laravel Passport and Sanctum. The API also uses Faker to generate a test user. Users can create and login to their accounts via Laravel Blade.

## Setup

Follow these steps to set up the container on a Docker installed computer:

1. Clone the GitHub repository via:
   ```bash
   git clone [repo link]
   ```

2. Once the repository is cloned, navigate to the project directory using:
   ```bash
   cd client-flow-server
   ```

3. Run `composer install` in the root of the project to install necessary dependencies.

4. Create a `.env` file from the existing `.env.example` file.

5. Set the credentials for database access in the `.env` file:
   ```plaintext
   DB_CONNECTION=mysql
   DB_HOST=mysql
   DB_PORT=3306
   DB_DATABASE=client_flow_server
   DB_USERNAME=sail
   DB_PASSWORD=password
   ```

6. To access the application container, run:
   ```bash
   make start
   ```

7. If you successfully connect to the database, you should be able to set up your application key, create a database, and run migrations from the browser window.

8. Once this is done, you can go ahead and run:
   ```bash
   ./vendor/bin/sail up
   ```

9. In a separate terminal window, run:
   ```bash
   ./vendor/bin/sail artisan db:seed
   ```
   to seed the database with the test user.

10. While `./vendor/bin/sail up` is still running, navigate to the project root via:
    ```bash
    ./vendor/bin/sail root-shell
    ```
    in a separate window and run:
    ```bash
    cd ..
    ```
    to navigate one level down the project directory.

11. Run:
    ```bash
    chown -R sail:sail html
    ```
    to grant permissions to the sail user shipped with Laravel in order to set up Laravel with Vite.

12. After this is done, run:
    ```bash
    exit
    ```
    to exit the root command line.

13. Run:
    ```bash
    ./vendor/bin/sail npm install
    ```
    to install npm dependencies for Vite and:
    ```bash
    ./vendor/bin/sail npm run build
    ```
    to build the Vite client.

14. Once this is complete, you should be able to view the Laravel login page on [http://localhost:80](http://localhost:80).

15. Finally, set up your Passport keys by generating them using the command:
    ```bash
    ./vendor/bin/sail artisan passport:install
    ```

Feel free to reach out if you encounter any issues or have any questions!