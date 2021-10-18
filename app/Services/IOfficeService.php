<?php

namespace App\Services;

use App\Models\IApiOffice;
use App\Models\ApiOffice;
use App\Models\Office;
use Illuminate\Http\Request;

interface IOfficeService
{
	public function index();
	
	public function store(Request $request);
	
	public function show($id);
	
	public function update(Request $request, Office $office);
	
	public function destroy(Office $office);
	
	
}
