<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Content;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function detailcontent($id, $sourcesId)
    {
        $content = Content::where('id', $id)
            ->where('sourcesId', $sourcesId)
            ->first();

        $content_commentar = Comment::where('contents_id', $content->id)
            ->where('contents_sourcesId', $content->sourcesId)
            ->paginate(10);

        return view('detailcontent', [
            "content" => $content,
            "content_commentar" => $content_commentar,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|int',
            'sourcesId' => 'required|string',
            'title' => 'required|string',
            'creator' => 'required|string',
            'like_count' => 'required|int',
        ]);

        if ($validator->fails()) {
            $status = "failed";
            $msg = $validator->errors()->first();
            return response()->json([
                'status' => $status,
                'msg' => $msg,
            ], 200);
        }

        $content = Content::where('id', $request->input('id'))
            ->where('sourcesId', $request->input('sourcesId'))
            ->get();

        if (!$content) {
            $status = "failed";
            $msg = "Data tidak ditemukan";
            return response()->json([
                'status' => $status,
                'msg' => $msg,
            ], 200);
        }

        $content[0]->update([
            'title' => $request->input('title'),
            'creator' => $request->input('creator'),
            'like_count' => $request->input('like_count'),
        ]);

        $status = "success";
        $msg = "Berhasil mengubah data";
        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'creator' => 'required',
            'like_count' => 'required',
            'date' => 'required',
            'sources' => 'required',
            'sourcesId' => 'required',
        ]);

        if ($validator->fails()) {
            $status = "failed";
            $msg = $validator->errors()->first();
            return response()->json([
                'status' => $status,
                'msg' => $msg,
            ], 200);
        }

        $content = Content::create($request->all());
        $dataId = $content->id;
        $dataSourceId = $content->sourcesId;

        $user_login = Auth::user()->id;
        $history = new History;
        $history->contents_id = $dataId;
        $history->contents_sourcesId = $dataSourceId;
        $history->users_id = $user_login;
        $history->save();

        $status = "success";
        $msg = "Berhasil menambahkan data";
        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
            'dataId' => $dataId,
            'dataSourceId' => $dataSourceId,
        ), 200);
    }
}
