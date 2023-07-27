<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class RankingController extends Controller
{
    public function ranking()
    {
        $title_name = "Puntuaciones";
        $rankings = User::join('participations', 'users.id', '=', 'participations.user_id')
            ->selectRaw('nickname, avatar, count(*) as victories')
            ->where('participations.position', '=', 1)
            ->groupBy('nickname', 'avatar')
            ->orderBy('victories', 'desc')
            ->paginate(10);

        return view('ranking', compact('rankings', 'title_name'));
    }
}
