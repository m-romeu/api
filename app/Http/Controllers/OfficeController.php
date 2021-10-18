<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Office as OfficeResource;
use App\Services\IOfficeService;
use App\Services\OfficeService;

class OfficeController extends BaseController
{
    
	protected $officeService;
	
	public function __construct(Request $request, IOfficeService $officeService){
		
		$this->officeService = $officeService;	
	}
	
	 /**
     * Get all offices
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 
	public function index()
    {
        try{
			$offices = $this->officeService->index();			
			return $this->sendResponse(OfficeResource::collection($offices), 'Offices list');
			
		}catch(\Throwable $e){       
			return $this->sendError("Error", "Error while listing offices");    
		}
    }
    /**
     * Store a new office
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		try{
			$office = $this->officeService->store($request);			
			return $this->sendResponse($office, 'Office created');
			
		}catch(\Throwable $e){
			return $this->sendError("Error", "Error, can't create office");
		}
    } 
   
    /**
     * Display the office
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        try{
			$office = $this->officeService->show($id);
			return $this->sendResponse($office, 'Office retrieved');
			
		}catch(\Throwable $e){
			return $this->sendError("Error", "Error, can't find office");
		}	
    }
    
    /**
     * Update office
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        try{
		   $office = $this->officeService->update($request, $office);
		   return $this->sendResponse($office, 'Office updated');
		   
		}catch(\Throwable $e){
			return $this->sendError("Error", "Error, can't update office");
		}   
    }
   
    /**
     * Delete office.
     *
     * @param  Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        try{
			$this->officeService->destroy($office);
			return $this->sendResponse([], 'Office deleted');
			
		}catch(\Throwable $e){
			return $this->sendError("Error", "Error, can't delete office");
		}   	
    }
}
