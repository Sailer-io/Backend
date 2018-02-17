<?php
/**
 * https://dwm.ovh
 * User: Lénaïc GROLLEAU
 * Date: 16/02/18
 * Time: 17:59
 */

namespace App\Http;


use Illuminate\Http\JsonResponse;

class DwmResponse extends JsonResponse
{

    public function __construct($success = true, $data = null, $status = 200, $headers = [], $options = 0)
    {
        if (is_null($data)) {
            $data = ['success' => $success];
        } elseif (is_string($data)) {
            $data = ['message' => $data];
        } else {
            try {
                $data['success'] = $success;
            } catch (\Exception $e) {
            }
        }
        parent::__construct($data, $status, $headers, $options);
    }
}