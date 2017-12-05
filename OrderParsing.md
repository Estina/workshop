# Order parsing

We need to build a feature to get orders. 

1. Get the order and parse the order (json format)

### Order request

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
