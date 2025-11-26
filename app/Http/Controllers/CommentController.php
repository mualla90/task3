<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
   public function getAllCommentWithSpecificTask(){
        $comments=Comment::with('task')->get();
        return $comments;
   }

   public function addNewComment(Request $request,$id){
        $validatedData=$request->validate([
            'comment_text'=>'required|string|max:500',
            'author'=>'required|string|max:256',
        ]);
        $validatedData['task_id']=$id;
        $comment=Comment::create($validatedData);
        return response()->json([
            'message'=>'comment add successfully',
            'comment'=>$validatedData,
        ]);

   }
    public function delete($id){
        $comment=Comment::findOrFail($id);

            $comment->delete();

            return response()->json([
                'message'=>'comment deleted successfully',
                'status'=>200,
            ]);

   }
}
