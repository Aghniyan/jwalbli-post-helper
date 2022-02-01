<?php

namespace PostHelper;

class PostHelper
{
    protected $request_url = 'https://jsonplaceholder.typicode.com/posts';
    private function curl($request_url, $method = null, $data = null)
    {
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($method) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        }
        if ($data) {
            curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json; charset=UTF-8'
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    private function initData($request, $event = 'create')
    {
        $data = [
            'title' => $request->title ?? null,
            'body' => $request->body ?? null,
            'userId' => $request->userId ?? null
        ];
        if ($event == 'update') {
            return array_filter($data);
        }
        return $data;
    }

    public function getAll()
    {
        return $this->curl($this->request_url);
    }

    public function getByID($id)
    {
        return $this->curl($this->request_url . '/' . $id);
    }

    public function getByUserID($userId)
    {
        return $this->curl($this->request_url . '?userId=' . $userId);
    }

    public function createPost($request)
    {
        $data = $this->initData($request);
        return $this->curl($this->request_url, 'POST', $data);
    }

    public function updatePost($request, $id)
    {
        $data = $this->initData($request, 'update');
        return $this->curl($this->request_url . '/' . $id, 'PATCH', $request);
    }

    public function deletePost($id)
    {
        return $this->curl($this->request_url . '/' . $id, 'DELETE');
    }
}
