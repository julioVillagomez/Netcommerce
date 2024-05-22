<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\MessageBag;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Response::macro('success', function ($data) {

            return response()->json([
                'error' => false,
                'data' => $data,
            ]);
        });

        Response::macro('error', function ($message, $status = 400) {

            if(is_string($message)){
                $messages = new MessageBag(['generic' => $message]);

            }else{
                $messages = new MessageBag($message);

            }
            $content = [
                'error' => true,
                'message' => $message,
                'errors' => $messages,

            ];

            return \response()->json($content, $status);
        });

        Response::macro('resource', function ($data) {
            return response()->json([
                'error' => false,
                'data' => $data,
            ]);
        });


        Response::macro('errorValidation', function ($message, $status = 400) {


            $messages = new MessageBag($message);



            $content = [
                "error" => true,
                'message'         => "this invalid data",
                'errors'          => $messages,

            ];

            return response()->json($content, $status);


        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
