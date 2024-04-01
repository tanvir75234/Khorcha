<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\IncomeCategory;
use Carbon\Carbon;
use Session;
use Auth;

class IncomeCategoryController extends Controller{
    public function index(){
        $data = IncomeCategory::where('incate_status',1)->orderBy('incate_id','DESC')->get();
        return view('admin.income.category.all',compact('data'));
    }

    public function add(){
        return view('admin.income.category.add');
    }

    public function view($slug){
        $data = IncomeCategory::where('incate_status',1)->where('incate_slug',$slug)->firstOrFail();
        return view('admin.income.category.view',compact('data'));
    }

    public function edit($slug){
        $data = IncomeCategory::where('incate_status',1)->where('incate_slug',$slug)->firstOrFail();
        return view('admin.income.category.edit',compact('data'));
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required|max:30|unique:income_categories,incate_name'
        ],[
            'name.required' => 'Please enter your income category name .'
        ]);

        $slug = Str::slug($request['name'], '-');
        $creator = Auth::user()->id; 

        $insert = IncomeCategory::insert([
            'incate_name' => $request['name'],
            'incate_remarks' => $request['remarks'],
            'incate_slug' => $slug,
            'incate_creator' => $creator,
            'created_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Successfully add your income category information');
            return redirect('dashboard/income/category');
        }else{
            Session::flash('opps!','Operaiton failed');
            return back();
        }

    }

    public function update(Request $request){
        $id = $request['id'];

        $request->validate([
            'name' => 'required|max:30|unique:income_categories,incate_name,'.$id.',incate_id'
        ],[
            'name.required' => 'Please enter your income category name .'
        ]);

        $slug = Str::slug($request['name'], '-');
        $editor = Auth::user()->id; 

        $update = IncomeCategory::where('incate_status',1)->where('incate_id',$id)->update([
            'incate_name' => $request['name'],
            'incate_remarks' => $request['remarks'],
            'incate_slug' => $slug,
            'incate_editor' => $editor,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Successfully updated your income category information');
            return redirect('dashboard/income/category/view/'.$slug);
        }else{
            Session::flash('opps!','Operaiton failed');
            return back();
        }
    }

    public function softdelete(Request $request){
        $id = $request['modal_id'];

        $soft = IncomeCategory::where('incate_status',1)->where('incate_id',$id)->update([
            'incate_status' => 0,
            'updated_at' => Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success','Successfully deleted your information');
            return back();
        }else{
            Session::flash('success','Successfully deleted your information');
            return back();
        }

    }

    public function restore(){
        $id=$_POST['modal_id'];
        $soft=IncomeCategory::where('incate_status',0)->where('incate_id',$id)->update([
            'incate_status'=>1,
            'updated_at'=>Carbon::now('asia/dhaka')->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success',':Successfully restore income category information.');
            return redirect('dashboard/recycle/income/category');
        }else{
            Session::flash('error','Opps! Operation failed.');
            return redirect('dashboard/recycle/income/category');
        };
    }

    public function delete(){
        $id = $_POST['modal_id'];

        $delete = IncomeCategory::where('incate_status',0)->where('incate_id',$id)->delete([]);

        if($delete){
            Session::flash('success',':Successfully delete income category information.');
            return back();
        }else{
            Session::flash('error','Opps! Operation failed.');
            return back();
        };
    }
}
