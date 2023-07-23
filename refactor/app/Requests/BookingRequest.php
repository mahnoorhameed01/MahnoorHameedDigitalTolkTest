<?php

namespace app\Requests;

class BookingRequest
{
     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // here we can define rules for request parameters
        return [
           
        ];
    }

    // In this function we can customize the request parameters and define data format accordingly
    public function prepareRequest(){

        $request = $this;
        return [

        ];
    }
}