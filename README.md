
```
  'guards' => [
       'api' => [
           'driver' => 'custom-token',
       ],
   ],

```

```php 
<?php
Route::middleware("auth:api")->get("/profile",function(){
  return [
    "user" => Auth::guard("api")->user()
  ];
});
```
