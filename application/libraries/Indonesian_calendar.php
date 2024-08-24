<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indonesian_calendar {

	public function isToday($started_date , $ended_date ){
		
		$isTodayState = true;
		
		// Get today's date
		$today = new DateTime();

		// Convert started_date and ended_date to DateTime objects
		$started_date = new DateTime($started_date);
		$ended_date = new DateTime($ended_date);

		// Check if today's date is not in the date range
		if ($today < $started_date || $today > $ended_date) {
			$isTodayState = false;
		}
		
		return $isTodayState;
		
	}

	public function konversiDateWithoutHour($inputDateString){
			$hasil1 = $this->konversiDate($inputDateString);
			
			$position = strpos($hasil1, ' jam');

		// Extract the substring from the beginning until the word 'yours'
			$hasil2 = substr($hasil1, 0, $position);

			return $hasil2; 
	}

    public function konversiDate($inputDateString) {
        // Input date string
		//$inputDateString = '2023-12-16 12:00:00';

		// Create a DateTime object from the input string
		$dateTime = new DateTime($inputDateString);

		// Define an array of Indonesian day names
		$dayNames = [
			'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
		];

		// Define an array of Indonesian month names
		$monthNames = [
			'', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
		];

		// Get the day, month, and year from the DateTime object
		$day = $dateTime->format('w'); // Returns 0 (Sunday) through 6 (Saturday)
		$dayName = $dayNames[$day];
		$dayNumber = $dateTime->format('d');
		$monthNumber = $dateTime->format('n');
		$monthName = $monthNames[$monthNumber];
		$year = $dateTime->format('Y');
		$time = $dateTime->format('H:i');

		// Create the Indonesian date format string
		$indonesianDateFormat = "$dayName, $dayNumber $monthName $year jam $time";

		// Output the result
		//echo $indonesianDateFormat;
		return $indonesianDateFormat;
    }
}

?>