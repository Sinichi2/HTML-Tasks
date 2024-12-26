<?php

class Zodiac {
    public $sign;
    public $symbol;
    public $startDate;
    public $endDate;

    public function __construct($date) {
        $zodiacData = $this->loadZodiacData();
        $parsedDate = date('m-d', strtotime($date)); // Parse the date to "month-day" format

        foreach ($zodiacData as $zodiac) {
            $startMonthDay = date('m-d', strtotime($zodiac['start_date']));
            $endMonthDay = date('m-d', strtotime($zodiac['end_date']));

            // Normal date range
            if ($startMonthDay <= $endMonthDay) {
                if ($parsedDate >= $startMonthDay && $parsedDate <= $endMonthDay) {
                    $this->assignZodiac($zodiac);
                    break;
                }
            }
            // Cross-year date range
            else {
                if ($parsedDate >= $startMonthDay || $parsedDate <= $endMonthDay) {
                    $this->assignZodiac($zodiac);
                    break;
                }
            }
        }
    }

    private function loadZodiacData() {
        $zodiacData = [];
        $file = fopen('Zodiac.txt', 'r');
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

    private function assignZodiac($zodiac) {
        $this->sign = $zodiac['sign'];
        $this->symbol = $zodiac['symbol'];
        $this->startDate = $zodiac['start_date'];
        $this->endDate = $zodiac['end_date'];
    }

    public static function computeZodiacCompatibility($sign1, $sign2) {
        $compatibilityChart = [
            'Aries' => [
                'Aries' => 'High', 'Taurus' => 'Medium', 'Gemini' => 'High', 'Cancer' => 'Low', 'Leo' => 'High', 'Virgo' => 'Medium', 'Libra' => 'High', 'Scorpio' => 'Low', 'Sagittarius' => 'High', 'Capricornus' => 'Medium', 'Aquarius' => 'High', 'Pisces' => 'Low'
            ],
            'Taurus' => [
                'Aries' => 'Medium', 'Taurus' => 'High', 'Gemini' => 'Low', 'Cancer' => 'High', 'Leo' => 'Low', 'Virgo' => 'High', 'Libra' => 'Medium', 'Scorpio' => 'High', 'Sagittarius' => 'Low', 'Capricornus' => 'High', 'Aquarius' => 'Low', 'Pisces' => 'High'
            ],
            'Gemini' => [
                'Aries' => 'High', 'Taurus' => 'Low', 'Gemini' => 'High', 'Cancer' => 'Medium', 'Leo' => 'High', 'Virgo' => 'Medium', 'Libra' => 'High', 'Scorpio' => 'Low', 'Sagittarius' => 'High', 'Capricornus' => 'Low', 'Aquarius' => 'High', 'Pisces' => 'Medium'
            ],
            'Cancer' => [
                'Aries' => 'Low', 'Taurus' => 'High', 'Gemini' => 'Medium', 'Cancer' => 'High', 'Leo' => 'Medium', 'Virgo' => 'High', 'Libra' => 'Low', 'Scorpio' => 'High', 'Sagittarius' => 'Medium', 'Capricornus' => 'High', 'Aquarius' => 'Low', 'Pisces' => 'High'
            ],
            'Leo' => [
                'Aries' => 'High', 'Taurus' => 'Low', 'Gemini' => 'High', 'Cancer' => 'Medium', 'Leo' => 'High', 'Virgo' => 'Medium', 'Libra' => 'High', 'Scorpio' => 'Low', 'Sagittarius' => 'High', 'Capricornus' => 'Medium', 'Aquarius' => 'High', 'Pisces' => 'Low'
            ],
            'Virgo' => [
                'Aries' => 'Medium', 'Taurus' => 'High', 'Gemini' => 'Medium', 'Cancer' => 'High', 'Leo' => 'Medium', 'Virgo' => 'High', 'Libra' => 'Medium', 'Scorpio' => 'High', 'Sagittarius' => 'Low', 'Capricornus' => 'High', 'Aquarius' => 'Low', 'Pisces' => 'Medium'
            ],
            // Add remaining Zodiac combinations...
        ];
    
        // Return compatibility or 'Unknown' if not found
        return $compatibilityChart[$sign1][$sign2] ?? 'Unknown';
    }
    
}
?>
