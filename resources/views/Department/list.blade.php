@extends('Layout.app')
@section('title','Designation')
@section('content')
<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->
<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="company-doc">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block mb-0">
                            Designation
                        </h4>
                        <a href="{{url('/add-designation')}}" class="float-right add-doc text-primary">Add Designation
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>name</th>
                                            <th>Deparment</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($GetDepartment as $key => $department)
                                        <tr>
                                            <td>{{($GetDepartment->currentpage()-1) * $GetDepartment->perpage() + $key + 1}}</td>
                                            <td>{{$department->title}}</td>
                                            <td>{{$department->getDepartment['title']}}</td>
                                            <td>
                                                <a href="{{url('/edit-designation')}}/{{$department->id}}"> <span class="lnr lnr-pencil position-relative" data-toggle="tooltip" title="Edit"></span></a>
                                                <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static" class="common_delete" data-target=".common_delete_modal" data-url="{{url('/delete-designation')}}" data-back_url="{{url('/designation')}}" data-id="{{$department->id}}">
                                                    <span class="lnr lnr-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>{{env('NO_RECORDS_FOUND')}}</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{$GetDepartment->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection