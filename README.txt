=========== How to run the project ==========

1. Open your favorite IDE
2. In the terminal type "git clone https://github.com/madusankabandara2/pharmacy.git"
3. Next "cd pharmacy"
4. Then "composer install"
5. Rename ".env.example" to ".env". Then in your .env file, change "DB_CONNECTION=sqlite". If you wanna use mysql, you can use it. Then you need to configure it accordingly "DB_HOST", "DB_PORT", "DB_DATABASE", "DB_USERNAME", "DB_PASSWORD"
5. Next "php artisan migrate"
6. Next "php artisan db:seed"
7. Next "php artisan serve"
8. Next you can use Postman for API calls.
9. Don't fogrget to set "content-Type" as "application/json"
10. After generating tokens, use these specific tokens as Bearer token for other request (Basically you need to create 3 tokens for owner,  manager, and cashier)
11. If you have any issue, don't hesitate to contact me!
12. You can also, you postman collection which I have attached already (Pharmacy.postman_collection.json)
13. Cheers!

======== Login Details to create Tokens =========

--- Owner ---

 email: owner@example.com
 password: 123

--- Manager ---

email: manager@example.com
password: 456

--- Cashier ---

email: cashier@example.com
password: 789






