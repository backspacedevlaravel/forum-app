<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReplyController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Question $question
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Question $question, Request $request)
    {
        $reply = $question->replies()->create($request->all());
        return response()->json([
            'status' => Response::HTTP_CREATED,
            'created' => true,
            'reply' => $reply
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @param \App\Model\Reply $reply
     * @return Reply
     */
    public function show(Question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Request $request, Reply $reply)
    {
        $reply->update($request->all());
        return response()->json([
            'status' => Response::HTTP_OK,
            'updated' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @param \App\Model\Reply $reply
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();
        return response()->json([
            'status' => Response::HTTP_OK,
            'deleted' => true
        ]);
    }
}
