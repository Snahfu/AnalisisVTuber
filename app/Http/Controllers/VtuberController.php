<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Content;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VtuberController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return view('error', ["code" => 402, "msg" => "Anda tidak memiliki hak akses untuk mengakses halaman ini. Silahkan Login Dulu!"]);
        }
        if ($user->role != "VTuber") {
            return view('error', ["code" => 403, "msg" => "Anda tidak memiliki hak akses untuk mengakses halaman ini"]);
        }
        $id = $user->id;
        $vtuber_content = Content::join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->join('comments', 'comments.contents_id', '=', 'contents.id')
            ->where('users.id', '=', $id)
            ->orderBy('histories.crawled_date', 'desc')
            ->take(3)
            ->selectRaw('contents.*, count(comments.id) as total_comments')
            ->groupBy('contents.id')
            ->groupBy('contents.sourcesId')
            ->groupBy('contents.title')
            ->groupBy('contents.creator')
            ->groupBy('contents.like_count')
            ->groupBy('contents.date')
            ->groupBy('contents.sources')
            ->groupBy('contents.caption')
            ->get();

        // Youtube Data
        $comment_netral_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'netral')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();
        $comment_positif_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'positif')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();
        $comment_negatif_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'negatif')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();
        $comment_feedback_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'feedback')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();
        $comment_engagement_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'engagement')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();
        $comment_pertanyaan_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'pertanyaan')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();

        // Instagram Data
        $comment_netral = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'netral')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();
        $comment_positif = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'positif')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();
        $comment_negatif = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'negatif')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();
        $comment_feedback = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'feedback')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();
        $comment_engagement = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'engagement')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();
        $comment_pertanyaan = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'pertanyaan')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();


        return view('vtuber.index', [
            "jumlah_pertanyaan" => count($comment_pertanyaan),
            "jumlah_feedback" => count($comment_feedback),
            "jumlah_engagement" => count($comment_engagement),
            "jumlah_positif" => count($comment_positif),
            "jumlah_negatif" => count($comment_negatif),
            "jumlah_netral" => count($comment_netral),
            "jumlah_pertanyaan_y" => count($comment_pertanyaan_y),
            "jumlah_feedback_y" => count($comment_feedback_y),
            "jumlah_engagement_y" => count($comment_engagement_y),
            "jumlah_positif_y" => count($comment_positif_y),
            "jumlah_negatif_y" => count($comment_negatif_y),
            "jumlah_netral_y" => count($comment_netral_y),
            "vtuber_content" => $vtuber_content,
        ]);
    }

    public function tohistory()
    {
        $user = Auth::user();
        if (!$user) {
            return view('error', ["code" => 402, "msg" => "Anda tidak memiliki hak akses untuk mengakses halaman ini. Silahkan Login Dulu!"]);
        }
        if ($user->role != "VTuber") {
            return view('error', ["code" => 403, "msg" => "Anda tidak memiliki hak akses untuk mengakses halaman ini"]);
        }
        $id = $user->id;

        $histories = History::select('histories.*', 'contents.*')
            ->join('contents', 'histories.contents_id', '=', 'contents.id')
            ->where('histories.users_id', $id)
            ->orderBy('contents.date', 'desc')
            ->get();

        return view('vtuber.history', [
            "histories" => $histories,
        ]);
    }

    public function tocrawling()
    {
        $user = Auth::user();
        if (!$user) {
            return view('error', ["code" => 402, "msg" => "Anda tidak memiliki hak akses untuk mengakses halaman ini. Silahkan Login Dulu!"]);
        }
        if ($user->role != "VTuber") {
            return view('error', ["code" => 403, "msg" => "Anda tidak memiliki hak akses untuk mengakses halaman ini"]);
        }
        return view('vtuber.crawling');
    }

    public function toanalysis()
    {
        // User Id
        $user = Auth::user();
        if (!$user) {
            return view('error', ["code" => 402, "msg" => "Anda tidak memiliki hak akses untuk mengakses halaman ini. Silahkan Login Dulu!"]);
        }
        if ($user->role != "VTuber") {
            return view('error', ["code" => 403, "msg" => "Anda tidak memiliki hak akses untuk mengakses halaman ini"]);
        }
        $id = $user->id;

        $vtuber_content = Content::join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->join('comments', 'comments.contents_id', '=', 'contents.id')
            ->where('users.id', '=', $id)
            ->orderBy('histories.crawled_date', 'desc')
            ->take(3)
            ->selectRaw('contents.*, count(comments.id) as total_comments')
            ->groupBy('contents.id')
            ->groupBy('contents.sourcesId')
            ->groupBy('contents.title')
            ->groupBy('contents.creator')
            ->groupBy('contents.like_count')
            ->groupBy('contents.date')
            ->groupBy('contents.sources')
            ->groupBy('contents.caption')
            ->get();

        // Youtube Data
        $comment_netral_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'netral')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();
        $comment_positif_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'positif')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();
        $comment_negatif_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'negatif')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();
        $comment_feedback_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'feedback')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();
        $comment_engagement_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'engagement')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();
        $comment_pertanyaan_y = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'pertanyaan')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('comments.*')
            ->get();

        $total_like_negatif_y = 0;
        $total_like_positif_y = 0;
        $total_like_netral_y = 0;
        foreach ($comment_negatif_y as $detailkomentar) {
            $total_like_negatif_y += $detailkomentar->like_count;
        }
        foreach ($comment_positif_y as $detailkomentar) {
            $total_like_positif_y += $detailkomentar->like_count;
        }
        foreach ($comment_netral_y as $detailkomentar) {
            $total_like_netral_y += $detailkomentar->like_count;
        }

        $query_like_youtube = Content::join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('contents.*')
            ->get();
        $total_like_youtube = 0;
        foreach ($query_like_youtube as $detail) {
            $total_like_youtube += $detail->like_count;
        }

        // Instagram Data
        $comment_netral = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'netral')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();
        $comment_positif = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'positif')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();
        $comment_negatif = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_sentimen', '=', 'negatif')
            ->where('users.group', '=', 'yume')
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();
        $comment_feedback = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'feedback')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();
        $comment_engagement = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'engagement')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();
        $comment_pertanyaan = Comment::join('contents', 'comments.contents_id', '=', 'contents.id')
            ->join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('comments.kelas_kategori', '=', 'pertanyaan')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Instagram')
            ->select('comments.*')
            ->get();

        $total_like_negatif = 0;
        $total_like_positif = 0;
        $total_like_netral = 0;

        foreach ($comment_negatif as $detailkomentar) {
            $total_like_negatif += $detailkomentar->like_count;
        }
        foreach ($comment_positif as $detailkomentar) {
            $total_like_positif += $detailkomentar->like_count;
        }
        foreach ($comment_netral as $detailkomentar) {
            $total_like_netral += $detailkomentar->like_count;
        }
        $query_like_instagram = Content::join('histories', 'histories.contents_id', '=', 'contents.id')
            ->join('users', 'histories.users_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->where('contents.sources', '=', 'Youtube')
            ->select('contents.*')
            ->get();
        $total_like_instagram = 0;
        foreach ($query_like_instagram as $detail) {
            $total_like_instagram += $detail->like_count;
        }

        $keywords_positif_y = "";
        $keywords_negatif_y = "";
        $keywords_netral_y = "";
        $keywords_positif = "";
        $keywords_negatif = "";
        $keywords_netral = "";

        $keywords_feedback_y = "";
        $keywords_engagement_y = "";
        $keywords_pertanyaan_y = "";
        $keywords_feedback = "";
        $keywords_engagement = "";
        $keywords_pertanyaan = "";

        if (!$vtuber_content) {
            $keywords_positif_y = $this->getKeywords($comment_positif_y);
            $keywords_negatif_y = $this->getKeywords($comment_negatif_y);
            $keywords_netral_y = $this->getKeywords($comment_netral_y);
            $keywords_positif = $this->getKeywords($comment_positif);
            $keywords_negatif = $this->getKeywords($comment_negatif);
            $keywords_netral = $this->getKeywords($comment_netral);

            $keywords_feedback_y = $this->getKeywords($comment_feedback_y);
            $keywords_engagement_y = $this->getKeywords($comment_engagement_y);
            $keywords_pertanyaan_y = $this->getKeywords($comment_pertanyaan_y);
            $keywords_feedback = $this->getKeywords($comment_feedback);
            $keywords_engagement = $this->getKeywords($comment_engagement);
            $keywords_pertanyaan = $this->getKeywords($comment_pertanyaan);
        }

        return view('vtuber.analysis', [
            "jumlah_pertanyaan" => count($comment_pertanyaan),
            "jumlah_feedback" => count($comment_feedback),
            "jumlah_engagement" => count($comment_engagement),
            "jumlah_positif" => count($comment_positif),
            "jumlah_negatif" => count($comment_negatif),
            "jumlah_netral" => count($comment_netral),
            "jumlah_pertanyaan_y" => count($comment_pertanyaan_y),
            "jumlah_feedback_y" => count($comment_feedback_y),
            "jumlah_engagement_y" => count($comment_engagement_y),
            "jumlah_positif_y" => count($comment_positif_y),
            "jumlah_negatif_y" => count($comment_negatif_y),
            "jumlah_netral_y" => count($comment_netral_y),
            "jumlah_like_ig" => $total_like_instagram,
            "jumlah_like_y" => $total_like_youtube,
            "jumlah_like_positif" => $total_like_positif,
            "jumlah_like_positif_y" => $total_like_positif_y,
            "jumlah_like_netral" => $total_like_netral,
            "jumlah_like_netral_y" => $total_like_netral_y,
            "jumlah_like_negatif" => $total_like_negatif,
            "jumlah_like_negatif_y" => $total_like_negatif_y,
            "keywords_positif_y" => $keywords_positif_y,
            "keywords_negatif_y" => $keywords_negatif_y,
            "keywords_netral_y" => $keywords_netral_y,
            "keywords_positif" => $keywords_positif,
            "keywords_negatif" => $keywords_negatif,
            "keywords_netral" => $keywords_netral,
            "keywords_feedback_y" => $keywords_feedback_y,
            "keywords_engagement_y" => $keywords_engagement_y,
            "keywords_pertanyaan_y" => $keywords_pertanyaan_y,
            "keywords_feedback" => $keywords_feedback,
            "keywords_engagement" => $keywords_engagement,
            "keywords_pertanyaan" => $keywords_pertanyaan,
            "vtuber_content" => $vtuber_content,
        ]);
    }
}
