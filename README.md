# Kiwi Collection - Trevor Smart

## Configuration
- MySQL v8.0.2
- PHP v7.3
- Composer v2.0.11
- Symfony CLI v4.25.4
- Yarn v1.22.1


## Project setup

### Connect MySQL in .env
```
DATABASE_URL="mysql://root:@127.0.0.1:3306/new_schema?serverVersion=8.0.20"
```

### Composer
```
composer install
```

### Yarn
```
yarn install
```

### Compile front-end for development
```
yarn encore dev
```

### Run the local server
```
symfony server:start
```
