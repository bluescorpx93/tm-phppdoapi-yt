### PHP PDO Tryout

- Features REST API 
- Models have Relations
- Schema / Query done in raw SQL

#####To Test This:

- Provide DB Credentials
```sh
$ cd tm-phppdoapi-yt/config
```

##### Update Database.php accordingly

- Line 6
```
  private $db_name = <DB_NAME>;
```
- Line 7
```
  private $db_user = <DB_USER>;
```
- Line 8 
```
  private $db_pass = <DB_PASSWORD>;
```

##### Run App
```
$ cd tm-phppdoapi-yt
$ php -S localhost:5000
```

