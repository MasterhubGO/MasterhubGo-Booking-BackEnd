<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\BusinessProfile;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(BusinessProfile $businessProfile)
    {
        return response()->json($businessProfile->comments);
    }

    public function store(Request $request, BusinessProfile $businessProfile)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment([
            'user_id' => auth()->id(),
            'business_profile_id' => $businessProfile->id,
            'content' => $request->content,
        ]);

        $comment->save();

        return response("ok",200);
    }

    public function show(BusinessProfile $businessProfile, Comment $comment)
    {
        return response()->json($comment);
    }

    public function update(Request $request, BusinessProfile $businessProfile, Comment $comment)
    {
        $request->validate([
            'content' => 'required',
        ]);

        if ($request->user()->id != $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        $comment->update($request->all());

        return response()->json($comment);
    }

    public function destroy(BusinessProfile $businessProfile, Comment $comment)
    {
        if ($request->user()->id != $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted'], Response::HTTP_NO_CONTENT);
    }
}
