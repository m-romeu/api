<?php

namespace App\Services;

use App\Services\IOfficeService;
use App\Models\IApiOffice;
use App\Models\ApiOffice;
use App\Models\Office;
use Illuminate\Http\Request;


class OfficeService implements IOfficeService
{
	
	protected $apiOffice;
	
	public function __construct(IApiOffice $apiOffice){
		$this->apiOffice = $apiOffice;
	}
	
	public function index(){
		return $this->apiOffice->index();
	}
	
	public function store(Request $request){
		return $this->apiOffice->store($request);
	}
	
	public function show($id){
		return $this->apiOffice->show($id);
	}
	
	public function update(Request $request, Office $office){
		return $this->apiOffice->update($request, $office);
	}
	
	public function destroy(Office $office){
		return $this->apiOffice->destroy($office);
	}
	
	
}
											   