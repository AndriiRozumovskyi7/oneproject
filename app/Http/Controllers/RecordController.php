<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Record;
use App\Services\PriceCalculator;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function createRecord(Request $request, PriceCalculator $calculator)
    {
        $postId = $request->route('postId');
        $post = Post::query()->find($postId);

        $numberOfDays = $request->post('numberOfDays');
        $comment = $request->post('comment');

        $result = $calculator->calc($post, $numberOfDays);

//        switch ($numberOfDays) {
//            case $numberOfDays > 0 :
//                $result = $numberOfDays * $price;
//                break;
//            case $numberOfDays = 0 :
//                $result = back()->withErrors(['error' => 'Invalid operation']);
//                break;
//            default:
//                return back()->withErrors(['error' => 'Invalid operation.']);

       /* $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['comment'] = strip_tags($incomingFields['comment']);
        $incomingFields['user_id'] = auth()->id();*/

//        $incomingFields['comment'] = strip_tags($incomingFields['comment']);
        Record::create([
            'price' => $result,
            'comment' => $comment,
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
        ]);
        return redirect('/');

    }
}
