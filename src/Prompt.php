<?php

namespace Chimit;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;

class Prompt
{
    /**
     * Get the content of a prompt and render it with Blade.
     *
     * @throws FileNotFoundException
     */
    public static function get(string $name, array $data = []): string
    {
        $name = str_replace('.', '/', $name);
        $path = resource_path("prompts/{$name}.md");

        if (! File::exists($path)) {
            throw new FileNotFoundException("Prompt [{$name}] not found.");
        }

        $content = File::get($path);

        return Blade::render($content, $data);
    }
}
