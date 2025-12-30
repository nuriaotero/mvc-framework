<?php
namespace App\Controllers;

use App\Models\Contact;
use App\Models\User;

class ContactController
{
    private function auth()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /AgendaEloquent/login');
            exit;
        }
    }

    public function index()
    {
        $this->auth();
        $user = User::find($_SESSION['user_id']);
        $contacts = $user->contacts;
        require 'app/Views/dashboard.php';
    }

    public function store()
    {
        $this->auth();
        Contact::create(array_merge($_POST, [
            'user_id' => $_SESSION['user_id']
        ]));
        header('Location: ' . BASE_URL . '/dashboard');
    }

    public function update()
    {
        $this->auth();
        Contact::find($_POST['id'])->update($_POST);
        header('Location: ' . BASE_URL . '/dashboard');
    }

    public function delete($id)
    {
        $this->auth();
        Contact::find($id)->delete();
        header('Location: ' . BASE_URL . '/dashboard');
    }
}
