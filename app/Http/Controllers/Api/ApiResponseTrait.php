<?php

namespace App\Http\Controllers\Api;

use App\Models\product;

trait ApiResponseTrait
{
    public function apiResponse($data=null,$message=null,$status=null){

        $response=[
            'data'=>$data,
            'message'=>$message,
            'status'=>$status,
        ];
        return response($response,$status);
    }

}
