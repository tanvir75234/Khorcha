<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller{

    public function index(){
        
    }

    public function add(){
        return view('admin.income.main.add');
    }
}
