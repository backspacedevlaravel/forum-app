<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Model\Question;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = Question::latest()->get();
        return QuestionResource::collection($questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        auth()->user()->question()->create($request->all());
        Question::create($request->all());
        return response()->json([
            'status' => Response::HTTP_CREATED,
            'created' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @return QuestionResource
     */
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Question $question
     * @return void
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response()->json([
            'status' => Response::HTTP_OK,
            'updated' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return Response
     * @throws Exception
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
