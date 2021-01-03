<?php


namespace App\Logic\Astro;

use App\Models\Astro;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AstroRepository
{
    public function saveAstros(array $data): array
    {
        $rs = [
            'success' => true,
            'error' => [],
        ];

        if (empty($data)) {
            $rs['success'] = false;
            $rs['error'] = 'parameter should not be empty';
            return $rs;
        }

        foreach ($data as $astro) {
            $validator = Validator::make($astro, [
                'name' => 'required|string|between:0,10',
                'overall_score' => 'required|integer|between:0,5',
                'overall_description' => 'required|string|min:1',
                'romance_score' => 'required|integer|between:0,5',
                'romance_description' => 'required|string|min:1',
                'career_score' => 'required|integer|between:0,5',
                'career_description' => 'required|string|min:1',
                'wealth_score' => 'required|integer|between:0,5',
                'wealth_description' => 'required|string|min:1',
            ]);
            if ($validator->fails()) {
                $rs['success'] = false;
                $rs['error'] []= [
                    'errorMsg' => $validator->errors(),
                    'data' => $astro,
                ];
            } else {
                Astro::create([
                    'date' => Carbon::now(),
                    'name' => $astro['name'],
                    'overall_score' => $astro['overall_score'],
                    'overall_description' => mb_substr($astro['overall_description'], 0, 200, 'UTF-8'),
                    'romance_score' => $astro['romance_score'],
                    'romance_description' => mb_substr($astro['romance_description'], 0, 200, 'UTF-8'),
                    'career_score' => $astro['career_score'],
                    'career_description' => mb_substr($astro['career_description'], 0, 200, 'UTF-8'),
                    'wealth_score' => $astro['wealth_score'],
                    'wealth_description' => mb_substr($astro['wealth_description'], 0, 200, 'UTF-8'),
                ]);
            }
        }
        return $rs;
    }
}