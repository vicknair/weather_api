NSLS Code Test weather_api
===============================
Author: Karen Vicknair


__SETUP__

1) Use the tokens.sql file to create tables.

2) Edit the models/Database.php file with the database name, user name and password.  This could be stored in a better location if worried about the database.

3) copy the api folder to the root of your website



__API Calls__

__Forecast__: Send in the API token via an “Api-Token” header to  /api/weather/office/forecast

__Assessment__: Token not needed.  Call  /api/weather/assessment 



### Demo Site
You can use these sites in API call tests in Postman

http://mealtracker.org/api/weather/office/forecast

http://mealtracker.org/api/assessment
