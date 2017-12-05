# Order tracking

We need to build a feature to track orders delivery. 

1. Send some details to a 3rd party tracking system to get a tracking code
2. Persist the order and the tracking code

### 3rd party tracking system

Tracking API expects a GET request with the distributor, post code and the country.

http://tracking.test?distributor=&country=&postcode

It will return a tracking code alfa-numeric ex: 
ce729683e237977905fd357cc88b0534
