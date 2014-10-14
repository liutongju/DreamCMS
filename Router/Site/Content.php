<?php

return array(
    'URL_ROUTE_RULES' =>
    array(
        '/^category_(\d+)$/' => 'Content/category?cid=:1',
        '/^artlist_(\d+)$/' => 'Content/newslist?cid=:1',
        '/^artlist_(\d+)_(\d+)$/' => 'Content/newslist?cid=:1&p=:2',
        '/^(.*)\/artlist_(\d+)$/' => 'Content/newslist?cid=:2&l=:1',
        '/^(.*)\/artlist_(\d+)_(\d+)$/' => 'Content/newslist?cid=:2&p=:3&l=:1',
        '/^news_(\d+)_(\d+)$/' => 'Content/news?cid=:1&id=:2',
        '/^(.*)\/news_(\d+)_(\d+)$/' => 'Content/news?cid=:2&id=:3&l=:1',
        '/^page_(\d+)$/' => 'Content/page?cid=:1',
        '/^(.*)\/page_(\d+)$/' => 'Content/page?cid=:2&l=:1',
        '/^(.*)_index$/' => 'Content/index?l=:1',
    ),
);
