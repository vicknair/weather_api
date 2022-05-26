<?php

class Forecast {

	public function get() {

		$cheaders = array('User-Agent:weather@mealtracker.org', 'Accept: */*');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.weather.gov/gridpoints/OKX/31,34/forecast');
		curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$response = curl_exec($ch);
		curl_close($ch);
		$weather = json_decode($response); //return $weather;

		$api_keys = array('name','startTime','endTime','temperature','temperatureUnit','temperatureTrend','icon','shortForecast');
		$response = array();
		$periods = $weather->properties->periods;
		foreach ($periods as $period) {
			$row = array();
			foreach ($api_keys as $key) {
				$row[$key] = $period->$key;
			}
			$response[] = $row;
		}
		return $response;
	}
}
