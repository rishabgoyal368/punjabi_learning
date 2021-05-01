<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Question;

class QuestionController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $questions = Question::latest()->get()->toArray();
        return view('questions.list', compact('questions'));
    }

    public function add_question(Request $request){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $request->all();
            $add_question                   = new Question;
            if ($request->question) {
                $fileName = time() . '.' . $request->question->extension();
                $request->question->move(public_path('uploads/Question'), $fileName);
                $image = url('').'/uploads/Question/'.$fileName;
                $add_question->question  =    $image;
            }
            $add_question->option_1         = $data['option_1'];
            $add_question->option_2         = $data['option_2'];
            $add_question->option_3         = $data['option_3'];
            $add_question->option_4         = $data['option_4'];
            $add_question->correct_option_no= $data['correct_option'];
            if($data['correct_option'] == 'option_1'){
                $type = $data['option_1'];
            }elseif($data['correct_option'] == 'option_2'){
                $type = $data['option_2'];
            }elseif($data['correct_option'] == 'option_3'){
                $type = $data['option_3'];
            }elseif($data['correct_option'] == 'option_4'){
                $type = $data['option_4'];
            }
            $add_question->correct_answer = $type;
            if($add_question->save()){
                return redirect('/manage-question')->with(['success' => 'Record added successfully']);
            }else{
                return redirect('/manage-question')->with(['error' => 'error']);
            }
        }
        $label = 'Add Question';
        return view('questions.form', compact('label'));
    }

     public function edit_question(Request $request,$id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $request->all();
            $add_question                   = Question::find($id);
            if ($request->question) {
                $fileName = time() . '.' . $request->question->extension();
                $request->question->move(public_path('uploads/Question'), $fileName);
                $image = url('').'/uploads/Question/'.$fileName;
                $add_question->question  =    $image;
            }
            $add_question->option_1         = $data['option_1'];
            $add_question->option_2         = $data['option_2'];
            $add_question->option_3         = $data['option_3'];
            $add_question->option_4         = $data['option_4'];
            $add_question->correct_option_no= $data['correct_option'];
            if($data['correct_option'] == 'option_1'){
                $type = $data['option_1'];
            }elseif($data['correct_option'] == 'option_2'){
                $type = $data['option_2'];
            }elseif($data['correct_option'] == 'option_3'){
                $type = $data['option_3'];
            }elseif($data['correct_option'] == 'option_4'){
                $type = $data['option_4'];
            }
            $add_question->correct_answer = $type;
            if($add_question->save()){
                return redirect('/manage-question')->with(['success' => 'Record edited successfully']);
            }else{
                return redirect('/manage-question')->with(['error' => 'error']);
            }
        }
        $question_details = Question::where('id',$id)->first();
        $label = 'Edit Question';
        return view('questions.form', compact('label','question_details'));
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:questions,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            Question::where('id', $request->id)->delete();
            return response()->json(['success' => 'Records deleted successfully.']);
        }
    }
}
