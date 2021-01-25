# iban-validator
### Quick and easy way to validate you IBAN

#### Just visit http://iban-validator-release.herokuapp.com/

<a href="https://jkbkupczyk.github.io/iban-validator">
  <img align="center" src="https://github.com/jkbkupczyk/iban-validator/blob/main/readme.gif" width="" height="" />
</a>

## IBAN Validation - Dev docs

To validate your IBAN just simply make `GET` request at endpoint `api` with query param `?iban={YOUR_IBAN}`! 

Base URL for validation: https://iban-validator.herokuapp.com/api

##### Endpoint
`GET /api`

##### Example request
`GET /api?iban=DE32500105172467452445`

##### Example response
```json
{
    "iban": "DE32500105172467452445",
    "countryISO": "DE",
    "country": "Germany",
    "valid": true,
    "timestamp": 1611491200
}
```

# `IBAN` response Model

| Key              | Type          | Description |
| ---------------- | ------------- | ----------- |
| iban             | String        | IBAN number |
| countryISO       | String        | Country ISO ex. DE for Germany |
| country          | String        | Country name |
| valid            | bool          | Validated IBAN |
| timestamp        | Timestamp     | Timestamp of validation |

---

### How to get?
```git
  $ git clone https://github.com/jkbkupczyk/iban-validaator
```
