<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function add_question(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $content = Question::find($id);
                $label = 'Edit Question';
                return view('questions.form', compact('content', 'label'));
            } else {
                #Insert
                $label = 'Add Question';
                $content['id'] = '';
                $content['image'] = '';
                return view('questions.form', compact('content', 'label'));
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request->all();

            if ($request->image) {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $fileName);
                $request['file'] = $fileName;
            } 
            

            $user =  Khani::addEdit($request);
            if ($request['id']) {
                $label = 'Updated';
            } else {
                $label = 'Add';
            }
            return redirect('/manage-khani')->with(['success' => 'Record ' . $label . ' successfully']);
        }
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:khani,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            Khani::where('id', $request->id)->delete();
            return response()->json(['success' => 'Records deleted successfully.']);
        }
    }
}
