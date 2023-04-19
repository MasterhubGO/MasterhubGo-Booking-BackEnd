<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileVisit;

class ProfileController extends Controller
{
    public function trackVisit($visitedUserId)
{
    $visitorId = auth()->id(); // Получение ID авторизованного пользователя

    ProfileVisit::create([
        'visitor_id' => $visitorId,
        'visited_id' => $visitedUserId,
        'visited_at' => now(),
    ]);

    //profile display logic should be here))
}

}
