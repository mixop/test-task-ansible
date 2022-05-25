<?php
header("Content-Type: text/plain");
echo sprintf('Welcome to "%s" project on "%s" server.', getenv('APP_PROJECT_NAME'), getenv('APP_ENV')) .PHP_EOL;
echo sprintf('Project group "%s"', getenv('APP_PROJECT_GROUP')) .PHP_EOL;
