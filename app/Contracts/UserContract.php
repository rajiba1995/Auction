<?php

namespace App\Contracts;

/**
 * Interface AdsContract
 * @package App\Contracts
 */
use Illuminate\Http\Request;
interface UserContract
{
	/**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findUserById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createUser(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateUser(Request $request, array $params);

     /**
     * @param array $params
     * @return User|mixed
     */
    public function updateDeviceDetails(array $params);

    /**
     * @param int $id
     * @return mixed
     */
    public function getUserDetails(int $id);
 
    public function getUserDetailsMobile($mobile);

    public function blockUser($id,$is_block);
    public function verify($id,$is_verified);
    public function updateUserStatus(array $params);
    /**
     * @param $id
     * @return bool
     */
    public function deleteUser($id);

    /**
     * @param array $params
     * @return User|mixed
     */
    public function userRegistration(array $params);



    public function checkUserExists($email, $mobile );
    public function getUserAllImages($userId);
   public function getUserAllData($userId);

}
