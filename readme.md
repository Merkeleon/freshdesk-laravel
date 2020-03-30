## Installation

To add this bundle to your app, use [Composer](https://getcomposer.org).

Add `Merkeleon/freshdesk-laravel` to your **composer.json** file:

```json
{
    "require": {
        "Merkeleon/freshdesk-laravel": "dev-master"
    }
}
```

Then run:
 
 ```sh
 composer update
 ```

You must then register the provider in your application.

Register the provider in the `providers` key in your `config/app.php`:

```php
    'providers' => array(
        // ...
        Merkeleon\Laravel\Freshdesk\FreshdeskServiceProvider::class,
    )
```

Then add the Freshdesk facade alias in the `aliases` key in your `config/app.php`:

```php
    'aliases' => array(
        // ...
        'Freshdesk' => Merkeleon\Laravel\Freshdesk\FreshdeskFacade::class,
    )
```

## Configuration


To customize the configuration file, publish the package configuration using Artisan.

```sh
php artisan vendor:publish
```

Update the settings in the `app/config/freshdesk.php` file.

```php
return [
    'api_key' => 'your_freshdesk_api_key',
    'domain' => 'your_freshdesk_domain',
];
```


## Accessing the Freshdesk API

In a controller you can access Freshdesk resource
as follows: 

```php

//Contacts
$contacts = Freshdesk::contacts()->update($contactId, $data);

//Agents
$me = Freshdesk::agents()->current();

//Companies
$company = Freshdesk::companies()->create($data);

//Groups
$deleted = Freshdesk::groups()->delete($groupId);

//Tickets
$ticket = Freshdesk::tickets()->view($filters);

//Time Entries
$time = Freshdesk::timeEntries()->all($ticket['id']);

//Conversations
$ticket = Freshdesk::conversations()->note($ticketId, $data);

//Categories
$newCategory = Freshdesk::categories()->create($data);

//Forums
$forum = Freshdesk::forums()->create($categoryId, $data);

//Topics
$topics =Freshdesk::topics()->monitor($topicId, $userId);

//Comments
$comment = Freshdesk::comments()->create($forumId);

//Email Configs
$configs = Freshdesk::emailConfigs()->all();

//Products
$product = Freshdesk::products()->view($productId);

//Business Hours
$hours = Freshdesk::businessHours()->all();

//SLA Policy
$policies = Freshdesk::slaPolicies()->all();
```

### Filtering

All `GET` requests accept an optional `array $query` parameter to filter
results. For example:

```php
//Page 2 with 50 results per page
$page2 = Freshdesk::forums()->all(['page' => 2, 'per_page' => 50]);

//Tickets for a specific customer
$tickets = Freshdesk::tickets()->view(['company_id' => $companyId]);
```

Please read the Freshdesk documentation for further information on
filtering `GET` requests.

## References

* [Freshdesk PHP SDK](https://github.com/mpclarkson/freshdesk-php-sdk)
* [Freshdesk API Documentation](https://developer.freshdesk.com/api/)
