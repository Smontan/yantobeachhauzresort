<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);

            if ($validator->fails()) {
                flash()
                    ->option('timeout', 3000)
                    ->addError('Comment area is empty');
                return redirect()->back();
                // return redirect()->back()->with('message', 'Comment area is empty');
            }

            $room = Room::where('id', $request->room_id)->first();
            if ($room) {
                Comment::create([
                    'room_id' => $room->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);

                flash()
                    ->option('timeout', 3000)
                    ->addSuccess('Comment successfully');
                return redirect()->back();
                // return redirect()->back()->with('message', 'Commented Successfully!');
            } else {
                flash()
                    ->option('timeout', 3000)
                    ->addError('No such room found');
                return redirect()->back();
                // return redirect()->back()->with('message', 'No such rooom found');
            }

        } else {
            flash()
                ->option('timeout', 3000)
                ->addError('Login first');
            return redirect()->back();
            // return redirect()->back()->with('message', 'Login first comment');
        }
    }
    public function destroy(int $comment_id) {
        $comment = Comment::findOrFail($comment_id);
        $comment->delete();

        flash()
            ->option('timeout', 3000)
            ->addSuccess('Your comment deleted succesfully');
        return redirect()->back();
        // return redirect()->back()->with('message', 'Your comment deleted successfully');
    }


}