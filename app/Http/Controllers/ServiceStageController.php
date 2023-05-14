<?php

namespace App\Http\Controllers;

use App\Casts\Stage;
use App\Casts\UserActivityType;
use App\Models\Chat;
use App\Models\Message;
use App\Models\PendingBalance;
use App\Models\PlatformPendingBalance;
use App\Models\PlatformProfitBalance;
use App\Models\ServiceOrder;
use App\Models\ServiceStage;
use App\Models\Transaction;
use App\Models\UserBankActivity;
use App\Notifications\SendUserMoney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceStageController extends Controller
{
    public function index(ServiceStage $service_stage)
    {
        abort_if(auth()->user()->role != 'admin' && $service_stage->buyer_id != auth()->id() && $service_stage->service->user_id != auth()->id(), 404);

        $service = $service_stage->service->load(['rating' => function ($query) use($service_stage)
        {
            $query->where('user_id', $service_stage->buyer_id)->where('service_stage_id', $service_stage->id);
        }]);

        $chat = Chat::firstWhere([
            ['service_id', '=', $service->id],
            ['service_provider_id', '=', $service->user_id],
            ['user_id', '=', $service_stage->buyer_id],
            ['deal_id', '=', $service_stage->id],
        ]);

        if(!$chat) {
            $chat = Chat::firstWhere([
                ['service_id', '=', $service->id],
                ['service_provider_id', '=', $service->user_id],
                ['user_id', '=', $service_stage->buyer_id],
            ]);

            if($chat) {
                $chat->deal_id = $service_stage->id;
                $chat->save();
            }

        }

        if($chat) {
            $chat->messages()->where('user_id', '!=', auth()->id())->update(['seen' => now()]);
        }

        // dd($chat);

        return view('front.service-stage', compact('service_stage', 'service', 'chat'));
    }

    public function changeStage(ServiceStage $service_stage, $stage)
    {
        abort_if(auth()->user()->role != 'admin' && $service_stage->buyer_id != auth()->id(), 404);

        abort_if(!in_array($stage, [Stage::RECEIPT->value, Stage::CANCEL->value]), 404);

        DB::transaction(function () use($service_stage, $stage)
        {
            $service_stage->update(['stage' => $stage]);

            if($service_stage->stage == Stage::RECEIPT) {

                $order = ServiceOrder::firstWhere([
                    ['service_provider_id', '=', $service_stage->service->user_id],
                    ['buyer_id', '=', auth()->id()],
                    ['service_id', '=', $service_stage->service->id],
                ]);

                PendingBalance::create(['user_id' => $service_stage->service->user_id, 'amount' => calc_service_provider_profit($order->amount)]);

                PlatformProfitBalance::create(['service_id' => $service_stage->service->id, 'amount' => calc_platform_profit($order->amount)]);

                UserBankActivity::create([
                    'user_id' => $service_stage->service->user_id,
                    'activity_type' => UserActivityType::RECEIVED,
                    'amount' => calc_service_provider_profit($order->amount)
                ]);

                PlatformPendingBalance::currentUser()
                ->pendingBalance()->where('amount', $order->amount)
                ->update(['is_service_provider_received_money' => true]);

                $service_stage->service->owner->notify(new SendUserMoney([
                    'title' => "تم استلام المشروع <a href='".route('front.services.stage.index', $service_stage)."'>{$service_stage->service->name}</a>",
                    'content' => ''
                ]));
            }
        });

        return back()->with('success', 'تم استلام المشروع');
    }
}