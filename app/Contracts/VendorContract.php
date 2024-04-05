<?php

namespace App\Contracts;

interface VendorContract{
    public function getAllVendors();
    public function findVendorById($id);
    public function createVendor(array $data);
    public function updateVendor(array $data);
    public function deleteVendor($vendor);
    public function StatusVendor($id);
}
