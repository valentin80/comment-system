<?php

namespace App\Http\Controllers;

use App\Events\StatusWasUpdated;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\ApiJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    use ApiJsonResponse;

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'content' => 'required|max:65535',
                'author' => 'required|max:255',
            ]);
            if ($validator->fails()) {
                return response()->json($this->errorResponse($validator->errors(), ''));
            }else{
                $post = Post::where('id', '=', $request->input('post_id'))->first();
                $post->addComment([
                    'content' => $request->get('content'),
                    'parent_id' => $request->get('parent_id', null),
                    'author' => $request->get('author', null)
                ]);

                $post['comments'] = $post->getThreadedComments();

                Log::info('send event StatusWasUpdated');

                event(new StatusWasUpdated($post));

                return response()->json($this->successResponse($post['comments'], ''));
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }
}
