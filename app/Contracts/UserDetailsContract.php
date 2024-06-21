<?php

namespace App\Contracts;
use Illuminate\Http\Request;

interface UserDetailsContract{
    public function getAllUsers();
    // public function getSearchUser(Request $request);
    public function getUserAllDocumentsById(int $id);

}