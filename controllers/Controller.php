<?php

class Controller
{
    public function view($view, $data = [])
    {
        extract($data);
        require_once('./views/' . $view . '.php');
    }

    public function showError($errorCode, $errorType, $errorMessage, $link)
    {
        $this->view('error', compact('errorCode', 'errorType', 'errorMessage', 'link'));
    }

    public function trimData($data)
    {
        return trim($data);
    }
}
