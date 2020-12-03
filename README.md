Install as an Anax module
------------------------------------

This is how you install the module into an existing Anax installation, for example an installation of `[anax/anax](https://github.com/canax/anax)`.

There are two steps in the installation procedure, 1) first install the module using composer and then 2) integrate it into you Anax base installation.

### Step 1, install using composer.

Install the module using composer.

```
composer require anax/remserver
```



### Step 2, integrate into your Anax base

```
# Go to the root of your Anax base repo
rsync -av vendor/gurrabergh/weather/config ./
```

Place your API key for the Open Weather API in data/PRIVATE_TOKEN with only the key, in a single row.

Go to route /weather and /weather-api to try it out.