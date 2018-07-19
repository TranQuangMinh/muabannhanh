mbn-magicminh
===============

Api MBN

# Cài đặt thông qua Composer 
```
composer require tranquangminh/muabannhanh
```

## Khởi tạo ứng dụng với mã được cấp từ Muabannhanh.Com
```php
$api = new \Muabannhanh\MbnApi(array(
    "public_key" => "",
    "private_key" => ""
));

```

### Cấu trúc
* Lấy danh sách 1 đối tuợng : gọi hàm find("[article, user, province, category..'])
* Lấy chi tiết 1 đối tuợng : gọi hàm get("[article, user, province, category..'])
* Result trả về theo cấu trúc 
    * Status: 200 thành công, 400 là lỗi.
    * Message: Thông báo từ API
    * Result: Dữ liệu cần lấy.
    
    

#### Listing
```php

// Find category
$res = $api->find('category');


// Find Province
$res = $api->find('province');


// Find Article by category
$res = $api->find('article', array(
    "category" => 139
));


// Limit and pagination
$res = $api->find('article', array(
    "limit" => 10,
    "page" => 1
));
```

#### Detail
```php
$res = $api->get('article', array(
    "id" => 1
));


$res = $api->get('category', array(
    "id" => 139
));


$res = $api->get('province', array(
    "id" => 1
));
```