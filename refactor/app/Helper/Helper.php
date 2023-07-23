<?php

namespace App\Helper;

use Symfony\Component\HttpFoundation\Response;

class Helper
{
     /**
     * This function is used to save error logs in db
     *
     * @param $email
     * @param $exception
     * @return void
     */
    public static function serverErrorLog($function_name, $exception): void
    {
        $error_log = new ErrorLog();
        $error_log->function_name = $function_name;
        $error_log->exception = $exception;
        $error_log->created_at = Carbon::now();
        $error_log->save();
    }

     /**
     * This function is used to throw error.
     * 1) Save logs in db
     * 2) Send slack notifications for errors
     * @param $email
     * @param $exception
     * @return JSON error message
     */
    public static function exceptionLogs($function_name, $exception)
    {
        $error = 'Message: '.$exception->getMessage().' File Name: '.$exception->getFile().' Line number: '.$exception->getLine().' Status Code:'.$exception->getCode();
        self::serverErrorLog($function_name, $error); // save logs in database
        $slack_message = [
            'text' => $error,
            'env' => env('APP_ENV'),
        ];
        $url = config('constants.SLACK_URL');
        self::curlRequest($url, json_encode($slack_message), true); // curl request for slack

        return response()->json([
            'success' => false,
            'message' => 'Something Went Wrong!',
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}