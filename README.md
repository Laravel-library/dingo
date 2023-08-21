### About Elephant

To customize the connection for your cache driver, please invoke the `withConnection` method of `RedisClient` within the `ServiceProvider`.

```php

namespace App\Providers;

use Elephant\Support\Facades\RedisClient;

class ServiceProvider 
{

    public function register():void
    {
        RedisClient::withConnection('custom_connection');
    }

}

```