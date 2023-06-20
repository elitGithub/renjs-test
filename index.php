<?php

require_once 'YAMLFileHandler.php';

$handler = new YAMLFileHandler('./story/Story.yaml');

$handler->displayForm();