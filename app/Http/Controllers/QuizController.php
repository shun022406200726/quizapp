<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quizzes.index',[
            'quizzes'=>Quiz::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'question'=>'required|max:255',
            'answer_a'=>'required|max:255',
            'answer_b'=>'required|max:255',
            'answer_c'=>'required|max:255',
            'answer_d'=>'required|max:255',
            'correct_answer'=>'required|in:A,B,C,D',
            'explanation'=>'max:65535',
        ]);

        $Quiz =new Quiz;

        $Quiz->question=$validateData['question'];
        $Quiz->answer_a=$validateData['answer_a'];
        $Quiz->answer_b=$validateData['answer_b'];
        $Quiz->answer_c=$validateData['answer_c'];
        $Quiz->answer_d=$validateData['answer_d'];
        $Quiz->correct_answer=$validateData['correct_answer'];
        $Quiz->explanation=$validateData['explanation'];

        $Quiz->save();


        return redirect(route('quizzes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('quizzes.show',[
            'quiz'=>Quiz::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Quiz::destroy($id)) {
            return response()->json([
                'message'=>'Failed to Delete',
            ],400);
        }

        return response()->noContent();
    }
}