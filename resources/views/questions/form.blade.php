<?php
if (isset($question_details)) {
    $title = 'Edit Question';
    $action = url('/manage-question/edit/' . $question_details['id']);
} else {
    $title = 'Add Quesion';
    $action = url('/manage-question/add');
}
?>
@extends('Layout.app')
@section('title',@$title)
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->
<style type="text/css">
    .radio_btn_adj{
        position: absolute;
        top: 0pc;
    }
    .set-pos-radio{
        margin-bottom: 30px;
    }
</style>
<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <form method="POST"  id="qestion_addPage" action="{{ $action }}" enctype="multipart/form-data">
                @csrf
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">
                            {{@$title}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <?php  
                                                if (!empty($question_details['question'])) {
                                                    $image = $question_details['question'];
                                                }else{
                                                    $image =  DefaultImgPath;
                                                }

                                            ?>
                                            
                                                <img src="{{$image}}" id="old_image" alt="No image" height="150px" width="150px" class="prof_img img-fluid" accept=".jpg,.png,.gif,.jpeg">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="image">Question Image</label>
                                            @if(@$question_details['question'])
                                                <input type="file" name="question" id="img_upload"  class="img_cls">
                                            @else
                                                <input type="file" name="question" id="img_upload"  class="img_cls" required="required">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="inputEmail4">Option 1</label>
                                            <input type="text" class="form-control" name="option_1" value="{{ @$question_details['option_1']}}">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="inputEmail4">Option 2</label>
                                            <input type="text" class="form-control" name="option_2" value="{{ @$question_details['option_2']}}">
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="inputEmail4">Option 3</label>
                                            <input type="text" class="form-control" name="option_3" value="{{ @$question_details['option_3']}}">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="inputEmail4">Option 4</label>
                                            <input type="text" class="form-control" name="option_4" value="{{ @$question_details['option_4']}}">
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <h3><b>Correct Option</b></h3><br>
                                    <div class="row">
                                        <div class="col-sm-4 set-pos-radio">
                                            <label for="inputEmail4">Option 1</label>
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_1" <?php if(@$question_details['correct_option_no'] == 'option_1'){echo "checked";} ?>>
                                        </div>
                                        <div class="col-sm-4 set-pos-radio">
                                            <label for="inputEmail4">Option 2</label>
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_2" <?php if(@$question_details['correct_option_no'] == 'option_2'){echo "checked";} ?>>
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 set-pos-radio">
                                            <label for="inputEmail4">Option 3</label>
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_3" <?php if(@$question_details['correct_option_no'] == 'option_3'){echo "checked";} ?>>
                                        </div>
                                        <div class="col-sm-4 set-pos-radio">
                                            <label for="inputEmail4">Option 4</label>
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_4" <?php if(@$question_details['correct_option_no'] == 'option_4'){echo "checked";} ?>>
                                        </div>    
                                    </div>
                                    <label id="correct_option-error" class="error" for="correct_option"></label>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row grow">
                    <div class="col-12">
                        <div class="submit-section text-center btn-add">
                            <input type="submit" value="Save" class="btn btn-theme text-white ctm-border-radius button-1">
                            <a href="{{url('/manage-question')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection