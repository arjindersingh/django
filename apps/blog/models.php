<?php

class BlogPost
{
    public static function all(): array
    {
        return [
            ['title' => 'First post', 'body' => 'This is a sample blog entry.'],
        ];
    }
}
