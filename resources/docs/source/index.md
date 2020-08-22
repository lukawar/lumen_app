---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Get responses


<!-- START_78fdd3866e4361f5483f5d2e54b10389 -->
## Return states list

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/states/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/states/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET api/states/list`


<!-- END_78fdd3866e4361f5483f5d2e54b10389 -->

#Utils


APIs for managing users
<!-- START_81edf5147fc62d876799f2e967814e00 -->
## Return states list

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/utils/states" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/utils/states"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET api/utils/states`


<!-- END_81edf5147fc62d876799f2e967814e00 -->


