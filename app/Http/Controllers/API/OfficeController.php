<?php

namespace App\Http\Controllers\API;

use App\Models\Office;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Office as OfficeResource;

class OfficeController extends BaseController
{
    public function index()
    {
        $offices = Office::all();
    
        return $this->sendResponse(OfficeResource::collection($offices), 'Offices list');
    }
    /**
     * Store a new office
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'address' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());       
        }
   
        $office = Office::create($input);   
        return $this->sendResponse(new OfficeResource($office), 'Office created');
    } 
   
    /**
     * Display the office
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $office = Office::find($id);
  
        if (is_null($office)) {
            return $this->sendError('Office not found');
        }
   
        return $this->sendResponse(new OfficeResource($office), 'Office retrieved');
    }
    
    /**
     * Update office
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'address' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());       
        }
   
        $office->name = $input['name'];
        $office->address = $input['address'];
        $office->save();
   
        return $this->sendResponse(new OfficeResource($office), 'Office updated');
    }
   
    /**
     * Delete office.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        $office->delete();   
        return $this->sendResponse([], 'Office deleted');
    }
}
