<?php

function responseSuccess($data = [], $message = 'success', $status = 200)
{
    return response()->json([
        "status" => true,
        "message" => $message,
        "data" => $data
    ], $status);
}

function responseFail($message = 'something wrong', $status = 400)
{
    return response()->json([
        "status" => false,
        "message" => $message,
    ], $status);
}

function current_url()
{
    return url()->current();
}

function translated_fields($model, $request)
{
    $data = $request;
    try {
        if (count(config('translatable.locales', [])) > 1) {
            $fields = new $model;
            $fields = $fields->gettranslatable();
            if ($fields) {
                foreach (config('translatable.locales', []) as $lang) {
                    $tr = [];
                    foreach ($fields as $field) {
                        $tr[$field] = $request[$field . '_' . $lang] ?? null;
                        unset($data[$field . '_' . $lang]);
                    }
                    $data[$lang] = $tr;
                }
            }
        }
        return $data;
    } catch (\Throwable $th) {
        return $data;
    }
}
