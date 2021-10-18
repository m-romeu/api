<?php

namespace App\Models;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Office as OfficeResource;
use App\Models\IApiOffice;

class ApiOffice implements IApiOffice
{
   public function index()
    {
        $offices = Office::all();    
        return $offices;
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
        $office = Office::create($input);   
        return new OfficeResource($office);
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
		return new OfficeResource($office);
        
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
        $office->name = $input['name'];
        $office->address = $input['address'];
        $office->save();
   
        return new OfficeResource($office);
    }
   
    /**
     * Delete office.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {           
        return $office->delete();
    }
}
