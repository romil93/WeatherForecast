## Project

The WeatherForecast is a web application which for a given address inside of the United States shows current weather conditions, conditions for the next 24 hours and for the next 7 days.

## Setup

There are two developer keys needed - Google Maps Geocoding API and Forecast.io developer key

### Google Maps Geocoding API

Head out https://console.developers.google.com/ and create a new project. After the project is created and selecting the newly created project, enter "Google Maps Geocoding API" in the search bar and choose the item from the drop down. Click on "Enable API". In the left tab, you will see credentials and click on it. Select "New Credentials", choose "API Key" and finally "Server Key". The console would have generated an API key, which you would copy and replace "GOOGLE_API_KEY" in test.php with the API Key.

### Forecast API

Head out to http://developer.forecast.io and create a free account. Create an application and it would generate an API Key which needs to be replaced in the position of "FORECAST_KEY" in test.php.

### main.html edit

The last change which needs to be done to update the location of the hosting of test.php whether it is on the local host or on a server, and update the path in main.html line 444 replacing "HOSTED_ADDRESS".

Now the project is complete in terms of API requirements. It can be hosted on any platform and tested.
