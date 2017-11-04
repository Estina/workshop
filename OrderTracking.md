#Order tracking

We need to build a feature to track orders delivery. 

1. Get the order (json format)
2. Send some details to a 3rd party tracking system to get a tracking code
3. Persist the order and the tracking code
4. Return the tracking code in the response

###Order request

**Id:** integer

**Distributor name** *string* 

**Address** *string* Street and number | post code | town | country

**Weight** *float* in kg 

Example JSON:
```
{
  "id": 1345,
  "distributor": "ups",
  "address": "Torslanda Torg 10|42332|TORSLANDA|SWEDEN",
  "weight": 1.456,
}
```

###3rd party tracking system

Tracking API expects a GET request with the distributor, post code and the country.

http://tracking.test?distributor=&country=&postcode

It will return a tracking code alfa-numeric ex: 
ce729683e237977905fd357cc88b0534

### Response
It has to return the tracking code

Steps:

1. Do it preferable in pairs (pair programming) 
2. Design all the system using CRC cards or Diagrams, including infrastructure
3. TDD: test -> code -> REFACTOR in small steps
4. Do everything in memory, no need for controllers, neither dependency injection either

