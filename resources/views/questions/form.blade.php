@extends('Layout.app')
@section('title',@$label)
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
            <form method="POST" name="joblist" id="designation" action="{{url('/add-Number')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{@$content->id ?: old('id') }}">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">
                            {{@$label}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Question</label><br>
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASkAAACqCAMAAADGFElyAAAAMFBMVEX09PTMzMz39/fOzs7w8PDQ0NDz8/PW1tbo6OjJycns7Ozl5eXh4eHZ2dnf39/T09MBTNBqAAAB5klEQVR4nO3b3W6iUBSAUX5FQJ33f9sRRQQ61IM3JLPXuqK2JPJlY07wNMsAAAAAAAAAAAAAAAAAAAAAACCaYr+j3/Ixuqbe69od/aYPUFzafL/2Em+sum9C3VOFm6qiuV92udOQqok2VMX9sssqO+1S3UvV4UoNI7X3ooe8SiWdFLxUkXVdlXZS8FK3Mm/z+pxQIHipP+24Uko4KXSpW5u+UgpdqnovKj+vlEKXOr+X6vVp/UfV6oM+dKn+Xapcl6rKcpkqdKlfZqoauixShS51KqdS12WD6vGbxVSFLvV++NIu77SqHidt9nLoUlnRjOupfpGgmmZtNlWxS2VFX7dt2XQboeZTFbxUNqwGTqvPqHr+9G5KpdTafKIexlRKrfwI9fqsUur5yutgeevNUyk1/HxrxqOfEzXdgEo9llXt9XH0r4l6TZVSz/VnOzxM2AqVt2elpoX6PdXGrafUeHx51Wi2Jkqpx2HS9+5KpW5QUCp1J0f4UslbXsKXOqdueQlfqlfqA6VSKZVKqVRKpZq+xapSnYKX2ndSyFKlUmmGi8675Fvvqcsjlhp2WeebT6O2XaOV+nrnftqO0P9Kn3/Tqj/6bR+hujV73QJO1MA/rQEAAAAAAAAAAAAAAAAAAAAAwGd/AdrYE2FI58bQAAAAAElFTkSuQmCC">
                                </div>
                                <div class="form-group col-sm-12">
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
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_1" <?php if(@$question_details['correct_option'] == 'option_1'){echo "checked";} ?>>
                                        </div>
                                        <div class="col-sm-4 set-pos-radio">
                                            <label for="inputEmail4">Option 2</label>
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_2" <?php if(@$question_details['correct_option'] == 'option_2'){echo "checked";} ?>>
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 set-pos-radio">
                                            <label for="inputEmail4">Option 3</label>
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_3" <?php if(@$question_details['correct_option'] == 'option_3'){echo "checked";} ?>>
                                        </div>
                                        <div class="col-sm-4 set-pos-radio">
                                            <label for="inputEmail4">Option 4</label>
                                            <input type="radio" class="form-control radio_btn_adj" name="correct_option" value="option_4" <?php if(@$question_details['correct_option'] == 'option_4'){echo "checked";} ?>>
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
                            <a href="{{url('/manage-Number')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



@endsection