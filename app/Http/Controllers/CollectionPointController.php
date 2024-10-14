<?php

namespace App\Http\Controllers;

use App\Models\CollectionPoint;
use Illuminate\Http\Request;

class CollectionPointController extends Controller
{
    public function __construct(
        protected CollectionPoint $collection
    ) {}
    
    public function index() {
        return view('ecomaps.index');
    }

    public function list_ecomaps() {
        $points = $this->collection->all();
        return response()->json($points);
    }
}
