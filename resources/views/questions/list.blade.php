@extends('Layout.app')
@section('title','Manage Questions')
@section('content')
<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->
<style type="text/css">
    .set-question-ui{
        border: 22px solid;
        padding: 18px;  
    }
    .edit-delete-btn-setting{
        float: right;
    }
</style>
<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="company-doc">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block mb-0">Manage Questions</h4>
                        <a href="{{url('/manage-question/add')}}" class="float-right add-doc text-primary">Add Questions</a><br>  
                    </div>
                    <div class="card-body">
                        <div class="employee-office-table" >
                            <div class="table-responsive p-t-10">
                                @if(count($questions)>0)
                                    @foreach($questions as $key=>$question)
                                    <div class="form-row set-question-ui">
                                        <div class="form-group col-md-12">
                                            <h5>
                                                <label for="inputEmail4">Question {{ $key+1}} . </label>
                                                <img src="{{ $question['question'] }}" height="300px" width="360px"></h5>
                                        </div>
                                       
                                        <div class="form-group col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6>
                                                        <label for="inputEmail4"> 1) </label>
                                                        {{ ucfirst($question['option_1']) }}
                                                    </h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h6>
                                                        <label for="inputEmail4"> 2) </label>
                                                        {{ ucfirst($question['option_2']) }}
                                                    </h6>
                                                </div>    
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6>
                                                        <label for="inputEmail4"> 3) </label>
                                                        {{ ucfirst($question['option_3']) }}
                                                    </h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h6>
                                                        <label for="inputEmail4"> 4) </label>
                                                        {{ ucfirst($question['option_4']) }}
                                                    </h6>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <?php 
                                                if($question['correct_option_no'] == 'option_1'){
                                                    $correct_opt = '1) '. ucfirst($question['correct_answer']);
                                                }elseif($question['correct_option_no'] == 'option_2'){
                                                    $correct_opt = '2) '. ucfirst($question['correct_answer']);
                                                }elseif($question['correct_option_no'] == 'option_3'){
                                                    $correct_opt = '3) '. ucfirst($question['correct_answer']);
                                                }elseif($question['correct_option_no'] == 'option_4'){
                                                    $correct_opt = '4) '. ucfirst($question['correct_answer']);
                                                }
                                            ?>

                                                <div class="faq_container">
                                                    <div class="faq">
                                                        <div class="">
                                                            <div class="faq_answer">
                                                                <div class="row">
                                                                    <div class="col-sm-12" style="padding: 25px;">
                                                                        <span class="show_ans" ><h4>Answer</h4>
                                                                            <div class="ful_ansr" style="border-left: 5px solid ">
                                                                                <span class="" style="margin-left: 15px;">{{ $correct_opt }}</span>
                                                                            </div>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>        
                                                    </div>
                                                    <div class="faq_question">
                                                        <buton type="button" class="btn btn-primary show_que view_ans" >Show Answer</buton>
                                                    </div>
                                                </div>
                                                <div class="edit-delete-btn-setting">
                                                    <a href="{{ url('/manage-question/edit/'.$question['id'])}}" title="Edit Question"><i class="fa fa-edit"></i></a>
                                                    <a class="trash-icon common_delete" href="javascript:void(0);" data-toggle="modal" data-backdrop="static" data-target=".common_delete_modal" data-url="{{url('/manage-question/delete')}}"  data-id="{{$question['id']}}">
                                                    <span class="lnr lnr-trash" data-toggle="tooltip" title="Delete">
                                                </div>
                                            
                                        </div>
                                    </div>   
                                    @endforeach
                                @else
                                    <h3>No Question Found.</h3>
                                @endif
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection