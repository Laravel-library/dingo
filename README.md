# About Dingo

### config redis cache db

Edit your laravel ServiceProvider, And join the database where you configure Redis Driver.

```php

namespace App\Providers;

use Dingo\Boundary\Connection\CacheConnector;

class ServiceProvider 
{

    public function register():void
    {
        CacheConnector::customConnection('custom_redis_db');
    }

}

```