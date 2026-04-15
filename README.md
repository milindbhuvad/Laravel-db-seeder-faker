Set Database name in .env file  
    `DB_DATABASE=db_seeder_faker`

Create Model with Migration  
    `php artisan make:model CustomerModel -m`

Create schema  
    `Schema::create('customer_models', function (Blueprint $table) {
        $table->id();
        $table->string('user_name');
        $table->string('email')->unique();
        $table->date('dob');
        $table->enum('gender', ['M', 'F', 'O']);
        $table->text('address')->nullable();
        $table->string('state')->nullable();
        $table->string('country')->nullable();
        $table->timestamps();
    });`

Run Migration  
    `php artisan migrate`    

Make Seeder  
    `php artisan make:seeder CustomerSeeder`

File located at  
    database\seeders\CustomerSeeder.php  
    -> Call  
    use App\Models\CustomerModel;  
    
    Add Below code in run() function  
    `for($i=0; $i<10; $i++){
        $customer = new CustomerModel();
        $customer->user_name = fake()->name();
        $customer->email = fake()->email();
        $customer->dob = fake()->date();
        $customer->gender = fake()->randomElement(['M', 'F', 'O']);
        $customer->address = fake()->address();
        $customer->state = fake()->state();
        $customer->country = fake()->country();
        $customer->save();
    }`


Register Seeder  
    Go To  
    -> database/seeders/DatabaseSeeder.php  

    Add in run function  
    `$this->call([
        CustomerSeeder::class,
    ]);`

Run Seeder  
    `php artisan db:seed`