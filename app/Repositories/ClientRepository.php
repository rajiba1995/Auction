<?php

namespace App\Repositories;
use App\Contracts\ClientContract;

use App\Models\Client;
use App\Models\Unit;
use App\Models\ClientUnit;

class ClientRepository implements ClientContract{
    public function getAllClient(){
        return Client::orderBy('name', 'ASC')->paginate(20);
    }
    public function GetAllUnit(){
        return Unit::orderBy('name', 'ASC')->paginate(20);
    }
    public function GetUnitById($id){
        return Unit::findOrFail($id);
    }
    public function GetClientById($id){
        return Client::findOrFail($id);
    }
    public function GetAllClientUnit($id){
        return ClientUnit::where('client_id', $id)->pluck('unit_id')->toArray();
    }
    public function CreateClient(array $params){
      
        try {
            $collection = collect($params);
            $client = new Client;
            $client->name = $collection['name'];
            $client->email = $collection['email'];
            $client->account_no = $collection['acc_no'];
            $client->password = \Hash::make($collection['password']);
            $client->mobile = $collection['mobile_number'];
            $client->address = $collection['address'];
            $client->city = $collection['city'];
            $client->state = $collection['state'];
            $client->pin = $collection['pin_code'];
            $client->status = 1;
            $client->save();

            if (isset($collection['unit_name'])) {
                foreach ($collection['unit_name'] as $key => $value) {
                    $client_units = new ClientUnit;
                    $client_units->client_id = $client->id;
                    $client_units->unit_id = $value;
                    $client_units->save();
                }
            }
            return $client;
            
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function updateClient(array $params){
      
        try {
            $collection = collect($params);
            $client = Client::findOrFail($collection['id']);
            $client->name = $collection['name'];
            $client->email = $collection['email'];
            if(isset($collection['password'])){
                $client->password = \Hash::make($collection['password']);
            }
            $client->account_no = $collection['acc_no'];
            $client->mobile = $collection['mobile_number'];
            $client->address = $collection['address'];
            $client->city = $collection['city'];
            $client->state = $collection['state'];
            $client->pin = $collection['pin_code'];
            $client->status = 1;
            $client->save();

            if(isset($collection['unit_name'])){
                $DeleteUnits = ClientUnit::where('client_id', $collection['id'])->whereNotIn('unit_id', $collection['unit_name'])->get();
                $DeleteUnits->each->delete();
            }
            
            if (isset($collection['unit_name'])) {
                foreach ($collection['unit_name'] as $key => $value) {
                    $ClientUnit = ClientUnit::where('unit_id', $value)->where('client_id', $collection['id'])->first();
                    if(!isset($ClientUnit)){
                        $client_units = new ClientUnit;
                        $client_units->client_id = $client->id;
                        $client_units->unit_id = $value;
                        $client_units->save();
                    }
                }
            }
            return $client;
            
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function CreateUnit(array $params)
    {
        try {
            $collection = collect($params);
            $unit = new Unit;
            $unit->name = $collection['name'];
            $unit->email = $collection['email'];
            $unit->mobile = $collection['mobile_number'];
            $unit->address = $collection['address'];
            $unit->save();
            return $unit;
            
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    public function UpdateUnit(array $params){
        try {
            $collection = collect($params);
            $unit = Unit::findOrFail($collection['id']);
            $unit->name = $collection['name'];
            $unit->email = $collection['email'];
            $unit->mobile = $collection['mobile_number'];
            $unit->address = $collection['address'];
            $unit->save();
            return $unit;
            
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
     public function deleteUnit($id){
        $delete = Unit::findOrFail($id);
        $delete->delete();
        return $delete;
     }
     public function DeleteClient($id){
        $delete = Client::findOrFail($id);
        $delete->delete();
        return $delete;
     }
     public function StatusClient($id){
        $client = Client::findOrFail($id);
        $status = $client->status ==1?0:1;
        $client->status = $status;
        $client->save();
        return $client;
    }
    
    
}
