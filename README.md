[![weather](https://circleci.com/gh/gurrabergh/weather.svg?style=svg)](https://app.circleci.com/pipelines/github/gurrabergh/weather/3/workflows/a776ead6-3fb9-41dc-8492-d976787eeec3/jobs/3)[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gurrabergh/weather/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/gurrabergh/weather/?branch=main)[![Code Coverage](https://scrutinizer-ci.com/g/gurrabergh/weather/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/gurrabergh/weather/?branch=main)[![Build Status](https://scrutinizer-ci.com/g/gurrabergh/weather/badges/build.png?b=main)](https://scrutinizer-ci.com/g/gurrabergh/weather/build-status/main)

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