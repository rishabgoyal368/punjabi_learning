<?php

namespace App\Http\Controllers\Api;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question, App\Report;

class McqController extends Controller
{
	public function index(Request $request){
    	$data = $request->all();

        try {
            $paginate = env('Paginate');
            $app_setting = Question::paginate((int) $paginate);
            $response['code'] = 200;
            $response['data'] = $app_setting;
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            $response['code'] 		= 404;
            $response['status'] 	= $e->getMessage();
            $response['message'] 	= "missing parameters";
        }
        return $response;
    }

    public function submit_result(Request $request){
        $data = $request->all();
         
        $user =   auth()->userOrFail();
        // print_r($data);die;
        try{
            $total_correct_quesiton = 0;
            foreach ($data as $key => $result_data) {
                foreach ($result_data['question'] as $key => $value) {
                    if($value['correct'] == 'true'){
                        $total_correct_quesiton += 1;
                    }
                }
                $total_questions = count($result_data['question']);
                $add_report = Report::create([
                                            'user_id'=>$user->id,
                                            'total_question'=>$total_questions,
                                            'total_correct_quesiton'=>$total_correct_quesiton,
                                            'percentage'=>$result_data['percentage']
                                            ]);
                $report_id = $add_report->id;
                foreach ($result_data['question'] as $key => $question_data) {
                    $add_questiom = UserQuestion::create([
                                                'report_id'=>$report_id,
                                                'question_id'=>$question_data['question_id'],
                                                'attempt'=>$question_data['attempt'],
                                                'correct_answer'=>$question_data['correct']
                                                ]);
                }

            }
            $response['code']       = 200;
            $response['status']     = 'success';
            return response()->json($response);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
        }  
    }

    public function view_result(){
        $user =   auth()->userOrFail();
        try{
            $view_result    = Report::where('user_id',$user->id)->orderBy('id','desc')->first();
            $response['code']       = 200;
            $response['status']     = 'success';
            $response['data']       =  $view_result;
            return response()->json($response);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
        }  
    }

}
