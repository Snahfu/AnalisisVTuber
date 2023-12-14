<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{   
    public function semuaKomentar(Request $request){
        $status = "success";
        $msg = "Berhasil mengambil data";
        $listKomentar = Comment::select('comments.text', 'comments.kelas_sentimen', 'comments.kelas_kategori')->get();

        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
            'listKomentar' => $listKomentar,
        ), 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'listKomentar' => 'required',
            'id' => 'required',
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
        $listKomentar = $request['listKomentar'];
        foreach ($listKomentar as $komentar) {
            $comment = new Comment;
            $comment->contents_id = $request["id"];
            $comment->contents_sourcesId = $request["sourcesId"];
            $comment->text = $komentar["komentar"];
            $comment->like_count = $komentar["likes"];
            $comment->author = $komentar["authors"];
            $comment->published = $komentar["datetimes"];
            $comment->kelas_kategori = $komentar["Kategori"];
            $comment->kelas_sentimen = $komentar["Sentimen"];
            $comment->save();
        }
        
        $status = "success";
        $msg = "Berhasil menambahkan data";
        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }


    public function show(Request $request)
    {
        $status = "failed";
        $msg = "Gagal Ambil Data, Id tidak ditemukan";
        $data = "";
        
        if ($request['id']) {
            $status = "success";
            $msg = "Berhasil";
            $data = Comment::find($request['id']);
        }

        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
            'data' => $data,
        ), 200);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kelas_sentimen' => 'required|string',
            'kelas_kategori' => 'required|string',
        ]);

        if ($validator->fails()) {
            $status = "failed";
            $msg = $validator->errors()->first();
            return response()->json([
                'status' => $status,
                'msg' => $msg,
            ], 200);
        }

        $comment = Comment::find($request->input('id'));

        if (!$comment) {
            $status = "failed";
            $msg = "Data tidak ditemukan";
            return response()->json([
                'status' => $status,
                'msg' => $msg,
            ], 200);
        }

        $comment->update([
            'kelas_sentimen' => $request->input('kelas_sentimen'),
            'kelas_kategori' => $request->input('kelas_kategori'),
        ]);

        $status = "success";
        $msg = "Berhasil mengubah data";
        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }

    public function delete(Request $request)
    {
        $comment = Comment::find($request['id']);

        if ($comment) {
            $deleted = $comment->delete();

            if ($deleted) {
                $status = "success";
                $msg = "Berhasil menghapus data";
            } else {
                $status = "failed";
                $msg = "Gagal menghapus data";
            }
        } else {
            $status = "failed";
            $msg = "Data tidak ditemukan";
        }

        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
        ), 200);
    }
}
