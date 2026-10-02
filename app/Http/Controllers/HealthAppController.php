<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HealthAppController extends Controller
{
    public function connectGoogleFit() {
        return Socialite::driver('google')
            ->scopes([
                'https://www.googleapis.com/auth/fitness.activity.read',
                'https://www.googleapis.com/auth/fitness.location.read'
            ])
            ->with(['access_type' => 'offline', 'prompt' => 'consent']) 
            ->redirect();
    }

    public function handleGoogleFitCallback() {
        try {
            $authenticatedGoogleUser = Socialite::driver('google')->user();

            $authenticatedUser = Auth::user();
            $authenticatedUser->update([
                'aplikasi_sehat' => 'google_fit',
                'google_token' => $authenticatedGoogleUser->token,
                'google_refresh_token' => $authenticatedGoogleUser->refreshToken,
            ]);

            return redirect()->route('lengkapi-profil')->with('success', 'Google Fit berhasil terhubung!');
        } catch (\Exception $e) {
            return redirect()->route('lengkapi-profil')->with('error', 'Gagal menghubungkan Google Fit: ' . $e->getMessage());
        }
    }

    public function aktivitas()
    {
        $authenticatedUser = Auth::user(); 

        $todayCaloriesBurned = 450;
        $todayActiveMinutes = 30;
        $weeklySteps = [8000, 9500, 10000, 8000];

        return view('aktivitas', [
            'user' => $authenticatedUser, 
            'caloriesToday' => $todayCaloriesBurned, 
            'activeMinutesToday' => $todayActiveMinutes, 
            'weeklySteps' => $weeklySteps
        ]);
    }

    private function getGoogleFitData($authenticatedUser)
    {
        $googleClient = new \Google_Client();
        $googleClient->setAccessToken($authenticatedUser->google_token);

        if ($googleClient->isAccessTokenExpired()) {
            if ($authenticatedUser->google_refresh_token) {
                $newToken = $googleClient->fetchAccessTokenWithRefreshToken($authenticatedUser->google_refresh_token);
                $authenticatedUser->update(['google_token' => $newToken['access_token']]);
            }
        }

        $googleFitnessService = new \Google_Service_Fitness($googleClient);
        
        $startTime = Carbon::now()->startOfDay()->getTimestampMs();
        $endTime = Carbon::now()->getTimestampMs();

        $totalStepsToday = $this->fetchFitnessData($googleFitnessService, 'derived:com.google.step_count.delta:com.google.android.gms:estimated_steps', $startTime, $endTime);

        $totalCaloriesBurnedToday = $this->fetchFitnessData($googleFitnessService, 'derived:com.google.calories.expended:com.google.android.gms:merge_calories_expended', $startTime, $endTime);

        $totalActiveMinutesToday = $this->fetchFitnessData($googleFitnessService, 'derived:com.google.active_minutes:com.google.android.gms:merge_active_minutes', $startTime, $endTime);

        return [
            'stepsToday' => $totalStepsToday,
            'todayCaloriesBurned' => round($totalCaloriesBurnedToday),
            'todayActiveMinutes' => round($totalActiveMinutesToday),
        ];
    }

    private function fetchFitnessData($googleFitnessService, $sourceId, $startTime, $endTime)
    {
        $request = new \Google_Service_Fitness_AggregateRequest();
        $request->setAggregateBy([['dataSourceId' => $sourceId]]);
        $request->setBucketByTime(['durationMillis' => 86400000]);
        $request->setStartTimeMillis($startTime);
        $request->setEndTimeMillis($endTime);

        $stats = $googleFitnessService->users_dataset->aggregate("me", $request);
        
        $totalAggregatedValue = 0;
        foreach ($stats->getBucket() as $bucket) {
            foreach ($bucket->getDataset() as $dataset) {
                foreach ($dataset->getPoint() as $point) {
                    foreach ($point->getValue() as $value) {
                        $totalAggregatedValue += $value->getFpVal() ?? $value->getIntVal();
                    }
                }
            }
        }
        return $totalAggregatedValue;
    }
}
