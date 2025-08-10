<?php

namespace KipasAngin\ResponseHandler;

use Illuminate\Support\ServiceProvider;

class ResponseHandlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('response-handler', function ($app) {
            return new ResponseHandler();
        });
    }
}