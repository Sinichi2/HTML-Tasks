<?php

class Zodiac {
    public $sign;
    public $symbol;
    public $startDate;
    public $endDate;

    public function __construct($date) {
        $zodiacData = $this->loadZodiacData();
        $monthDay = date('m-d', strtotime($date));
        foreach ($zodiacData as $zodiac) {
            $startDate = date('m-d', strtotime($zodiac['start_date']));
            $endDate = date('m-d', strtotime($zodiac['end_date']));
            if ($monthDay >= $startDate || $monthDay <= $endDate) {
                $this->sign = $zodiac['sign'];
                $this->symbol = $zodiac['symbol'];
                $this->startDate = $zodiac['start_date'];
                $this->endDate = $zodiac['end_date'];
                break;
            }
        }
    }

    private function loadZodiacData() {
        $zodiacData = [];
        $file = fopen('includes/Zodiac.txt', 'r');
        while (($line = fgets($file)) !== false) {
            list($sign, $symbol, $startDate, $endDate) = explode(';', trim($line));
            $zodiacData[] = [
                'sign' => $sign,
                'symbol' => $symbol,
                'start_date' => $startDate,
                'end_date' => $endDate
            ];
        }
        fclose($file);
        return $zodiacData;
    }

    public static function computeZodiacCompatibility($sign1, $sign2) {
        $compatibilityChart = [
            'Aries' => ['Aries' => 'High', 'Taurus' => 'Medium', 'Gemini' => 'High'],
            'Taurus' => ['Aries' => 'Medium', 'Taurus' => 'High', 'Gemini' => 'Low'],
            'Gemini' => ['Aries' => 'High', 'Taurus' => 'Low', 'Gemini' => 'High'],
            // Add other zodiac combinations here...
        ];
        return $compatibilityChart[$sign1][$sign2] ?? 'Unknown';
    }
}
?>
