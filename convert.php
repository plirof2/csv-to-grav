<?php

date_default_timezone_set('UTC');

include 'vendor/autoload.php';

$conversion = new CsvToGrav('example.csv');

// Set a directory for all posts.
$conversion->setOutputDir('user/pages/01.blog');

// Set the column map (Grav -> CSV).
$conversion->setColumnMap(array(
    'title'    => 'title_field',    // string
    //'date'     => 'example_date_field',     // string
    'html'     => 'example_html_field',     // string
    'price'     => 'price_field',     // string
    'author'   => 'example_author_field',   // string
    //'category' => 'example_category_field', // comma-separated list
    //'tag'      => 'example_tag_field'       // comma-separated list
));

// Set metadata which will be the same for all posts.
$conversion->setMetaData(array(
    'generator' => 'Grav',
    'og:locale' => 'el_GR',
    'og:type'   => 'article'
));

// Set whether posts are published default.
$conversion->setIsPublished(true);

// Generate.
$count = $conversion->build();

echo "Created {$count} items.\n";
