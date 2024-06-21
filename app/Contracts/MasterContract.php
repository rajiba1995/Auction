<?php

namespace App\Contracts;

interface MasterContract{
    //banner
    public function getAllBanners();
    public function CreateBanner(array $data);
    public function StatusBanner($id);
    public function GetBannerById($id);
    public function DeleteBanner($id);
    public function updateBanner(array $data);

    //collection
    public function getAllCollections();
    public function getSearchCollectionByStatus(int $status);
    public function CreateCollection(array $data);
    public function GetCollectionById($id);
    public function DeleteCollection($id);
    public function updateCollection(array $data);
    //category
    public function getAllCategories();
    public function CreateCategory(array $data);
    public function StatusCategory($id);
    public function GetCategoryById($id);
    public function DeleteCategory($id);
    public function updateCategory(array $data);
    //Tutorial
    public function getAllTutorials();
    public function CreateTutorial(array $data);
    public function StatusTutorial($id);
    public function GetTutorialById($id);
    public function DeleteTutorial($id);
    public function updateTutorial(array $data);
    //Client
    public function getAllClients();
    public function CreateClient(array $data);
    public function StatusClient($id);
    public function GetClientById($id);
    public function DeleteClient($id);
    public function updateClient(array $data);
    //Feedback
    public function getAllFeedbacks();
    public function CreateFeedback(array $data);
    public function StatusFeedback($id);
    public function GetFeedbackById($id);
    public function DeleteFeedback($id);
    public function updateFeedback(array $data);
    //Social-Media
    public function getAllSocialMedias();
    public function CreateSocialMedia(array $data);
    // public function StatusSocialMedia($id);
    public function GetSocialMediaById($id);
    public function DeleteSocialMedia($id);
    public function updateSocialMedia(array $data);
    //Business
    public function getAllBusiness();
    public function CreateBusiness(array $data);
    public function StatusBusiness($id);
    public function GetBusinessById($id);
    public function DeleteBusiness($id);
    public function updateBusiness(array $data);
    //LegalStatus
    public function getAllLegalstatus();
    public function CreateLegalStatus(array $data);
    public function StatusLegalStatus($id);
    public function GetLegalStatusById($id);
    public function DeleteLegalStatus($id);
    public function updateLegalStatus(array $data);

    // public function findVendorById($id);
    // public function createVendor(array $data);
    // public function updateVendor(array $data);   
    // public function deleteVendor($vendor);
    // public function StatusVendor($id);
}