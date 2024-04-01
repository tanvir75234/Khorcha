@extends('layouts.admin')
@section('content')         

@php
  $all = App\Models\IncomeCategory::where('incate_status',0)->orderBy('incate_id','DESC')->get(); 
@endphp

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>All User Information
                    </div>  
                    <div class="col-md-4 card_button_part">
                        <a href="{{ route('income.category.add') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Income Category</a>
                    </div>  
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                      @if(Session::has('success'))
                        <div class="alert alert-success alert_success " role="alert">
                          <strong>Success: </strong>{{Session::get('success')}}
                        </div>
                      @endif
                      @if(Session::has('error'))
                        <div class="alert alert-danger alert_error " role="alert">
                          <strong>Opps! </strong>{{Session::get('error')}}
                        </div>
                      @endif
                  </div>
                  <div class="col-md-2"></div>
                <table class="table table-bordered table-striped table-hover custom_table">
                  <thead class="table-dark">
                    <tr>
                      <th>Income Category</th>
                      <th>Remarks</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($all as $data)
                    <tr>
                      <td>{{ $data->incate_name }}</td>
                      <td>{{ $data->incate_remarks }}</td>
                      <td>
                        <a href="#" id="restore" data-bs-toggle="modal" data-bs-target="#restoreModal" data-id="{{$data->incate_id}}"><i class="fas fa-recycle text-success fs-5 mx-2"></i></a>
                        <a href="#" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$data->incate_id}}"><i class="fas fa-trash text-danger fs-5"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <div class="btn-group" role="group" aria-label="Button group">
                  <button type="button" class="btn btn-sm btn-dark">Print</button>
                  <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                  <button type="button" class="btn btn-sm btn-dark">Excel</button>
                </div>
              </div>  
            </div>
        </div>
    </div>
      <!-- Restore modal code -->
  <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" action="{{url('dashboard/income/category/restore')}}">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title modal_title fs-6" id="restoreModalLabel"><i class="fab fa-gg-circle"></i> Confirm Message </h5>
          </div>
        <div class="modal-body modal_body">
          Are you want to restore your data ?
          <input type="hidden" name="modal_id" id="modal_id">
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success">Confirm</button>
            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" action="{{ route(('income.category.delete')) }}">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title modal_title fs-6" id="deleteModalLabel"><i class="fab fa-gg-circle"></i> Confirm Message </h5>
          </div>
        <div class="modal-body modal_body">
          Are you want to sure permanently delete your data ?
          <input type="hidden" name="modal_id" id="modal_id">
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success">Confirm</button>
            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection