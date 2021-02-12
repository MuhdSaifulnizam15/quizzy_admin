<?php

namespace App\Http\Controllers\Web;

use App\Quiz;
use App\Subject;
use App\Question;
use App\QuestionType;
use App\QuestionOption;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use DataTables;

class QuizController extends BaseController
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->setPageTitle('Quizzes', 'List of Quizzes');

        $quizzes = Quiz::all();
        if($request->ajax()){
            $data = Quiz::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a href="'. route("admin.quizzes.edit", $data->id) .'" class="btn btn-outline-primary m-1"><i class="fa fa-edit"></i></a>';
                        $btn .= '<a href="'. route("admin.quizzes.activate", $data->id) .'" class="btn btn-outline-warning m-1"><i class="far ' . ( $data->is_active == 0 ? 'fa-eye' : 'fa-eye-slash') . '"></i></a>';
                        $btn .=  '<a href="'. route("admin.quizzes.delete", $data->id) .'" class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i></a>';
                        return $btn;
                    })
                    ->addColumn('subject_name', function($data){
                        return $data->subject->name;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $this->setPageTitle('Quizzes', 'Add Quizzes');
        $edit = false;
        $subjects = Subject::all();
        return view('admin.quizzes.create', compact('edit', 'subjects'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|unique:quizzes',
        ]);
        
        $quiz = new Quiz();
        $quiz->name = $request->input('name');
        $quiz->description = $request->input('description');
        $quiz->is_active = 0;
        $quiz->subject_id = $request->input('subject_id');
        $quiz->save();

        return $this->responseRedirect('admin.quizzes.index', 'Quiz successfully added' ,'success', false, false);
    }

    public function changeStatus($id)
    {
        $quiz = Quiz::findOrFail($id);
        if($quiz->is_active == 1){
            $quiz->is_active = 0;
        } else {
            $quiz->is_active = 1;
        }
        $quiz->save();

        return $this->responseRedirect('admin.quizzes.index', 'Quiz status successfully updated' ,'success', false, false);
    }

    public function edit($id)
    {
        $edit = true;
        $subjects = Subject::all();
        $quiz = Quiz::findOrFail($id);
        $questionList = Question::with(['questionOptions', 'questionType'])
                            ->where('questions.quiz_id', '=', $id)
                            ->get();
        
        $quizList = Quiz::all();
        $questionTypeList = QuestionType::all();

        // dd($questionList);
        $this->setPageTitle('Quizzes', 'Edit Quizzes : ' . $quiz->name);
        return view('admin.quizzes.create', compact('edit', 'subjects', 'quiz', 'questionList', 'quizList', 'questionTypeList'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      =>  'required|unique:quizzes,name,'.$id,
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->name = $request->input('name');
        $quiz->description = $request->input('description');
        $quiz->subject_id = $request->input('subject_id');
        $quiz->save();
        
        return $this->responseRedirect('admin.quizzes.index', 'Quiz successfully updated' ,'success', false, false);
    }

    public function delete($id)
    {
        $subject = Quiz::findOrFail($id);
        $subject->delete();

        return $this->responseRedirect('admin.quizzes.index', 'Quiz successfully deleted' ,'success', false, false);
    }

    public function addQuestion(Request $request)
    {
        $this->validate($request, [
            'title'  =>  'required',
            'duration'  =>  'required',
            'question_type_id'  =>  'required',
            'quiz_id'  =>  'required',
        ]);
        
        $question = new Question();
        $question->title = $request->input('title');
        $question->description = $request->input('description');
        $question->duration = $request->input('duration');
        $question->quiz_id = $request->input('quiz_id');
        $question->question_type_id = $request->input('question_type_id');
        if($request->input('question_type_id') != 3 && $request->input('is_true') != "on") {
            $question->is_true = 0;
        } else {
            $question->is_true = 1;
        }
        $question->save();
        
        return $this->responseRedirectBack('Question successfully added' ,'success', false, false);
    }

    public function addOption(Request $request)
    {
        $this->validate($request, [
            'title'  =>  'required',
            'question_id'  =>  'required',
        ]);
        
        $option = new QuestionOption();
        $option->title = $request->input('title');
        $option->description = $request->input('description');
        if($request->input('is_correct') == "on") {
            $option->is_correct = 1;
        } else {
            $option->is_correct = 0;
        }
        $option->question_id = $request->input('question_id');
        $option->save();
        
        return $this->responseRedirectBack('Question option successfully added' ,'success', false, false);
    }

    public function deleteOption($id)
    {
        $option = QuestionOption::findOrFail($id);
        if($option->is_correct != 1){
            $option->delete();
        } else {
            return $this->responseRedirectBack('Failed to delete question option. Make sure the option to be deleted is not a correct option.' ,'error', false, false);
        }

        return $this->responseRedirectBack('Question option successfully deleted' ,'success', false, false);
    }
}
