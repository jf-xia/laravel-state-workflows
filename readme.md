# Laravel State Machine Workflows

This composer package enables you to attach state machine workflows to your Eloquent models in your Laravel 5+ applications, along with
the optional ability to log transition state changes to a dedicated database table.
The state machine and auditing is based on the Yohang/Finite package, along with trait gists from tortuetorche.

## Installation

Begin by pulling in the package through Composer.

```bash
composer require mass6/laravel-state-workflows
```

Next, include the service provider within your `config/app.php` file.

```php
'providers' => [
    Mass6\LaravelStateWorkflows\StateWorkflowsServiceProvider::class,
];
```

Implementation

For any model that you want to attach a workflow to, use the StateMachineTrait in your model.
Then, initialize the statement in the model constructor.

namespace App\Models;

```php
class Order extends Model {
    use \Mass6\LaravelStateWorkflows\StateMachineTrait;
    
    public function __construct($attributes = [])
        {
            $this->initStateMachine();
            parent::__construct($attributes);
        }
}
```

Next, if opting to use the transition auditing feature, run the migration to create the audit table.

To run the migrations from the package directly:
 ```bash
 php artisan migrate --path=vendor/mass6/laravel-state-workflows/src/migrations
 ```
 
Or, publish the migration asset if you wish to include the migration in your own project:
 ```bash
 php artisan vendor:publish --provider="Mass6\LaravelStateWorkflows\StateWorkflowsServiceProvider"
 ```