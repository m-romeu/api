<?php

namespace App\Models;

use App\Models\ApiOffice;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

interface IApiOffice 
{
   public function index();
   
   public function store(Request $request);
    
   public function show($id);    
   
   public function update(Request $request, Office $office);
    
   public function destroy(Office $office);
   
}
