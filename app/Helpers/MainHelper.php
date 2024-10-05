<?php


/**
 * @param $data
 * @param $msg
 * @param $code
 * @return \Illuminate\Http\JsonResponse
 */
if (!function_exists('jsonSuccess')) {

    function jsonSuccess($data = null, $msg = null, $code = 200)
    {
        // if($data && is_object($data)){
        //     request('up_id') ? $data->up_id = request('up_id') : null;
        //     request('up_name_id') ? $data->up_name_id = request('up_name_id') : null;
        //     $code = request('up_id') ? 202 : $code;
        // }elseif($data && is_array($data)){
        //     request('up_id') ? $data['up_id'] = request('up_id') : null;
        //     request('up_name_id') ? $data['up_name_id'] = request('up_name_id') : null;
        //     $code = request('up_id') ? 202 : $code;
        // }

        $msg = ($msg == null) ? __("auth.done successfully") : $msg;
        return response()->json([
            'code' => $code,
            'data' => $data,
            'message' => $msg
        ], 200);
    }

}
