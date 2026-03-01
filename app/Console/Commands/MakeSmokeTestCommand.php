<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\TestMakeCommand;

class MakeSmokeTestCommand extends TestMakeCommand
{
    protected $name = 'make:test';

    protected $description = 'Create a new test class with optional smoke folder';

    protected function getOptions()
    {
        return array_merge(parent::getOptions(), [
            ['smoke', null, null, 'Create test in Smoke directory'],
        ]);
    }

    protected function getPath($name)
    {
        if ($this->option('smoke')) {

            $name = str_replace($this->rootNamespace(), '', $name);

            $directory = base_path('tests/Smoke');

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            // إزالة Feature أو Unit من المسار الأصلي
            $name = str_replace(['Feature\\', 'Unit\\'], '', $name);

            return $directory . '/' . str_replace('\\', '/', $name) . '.php';
        }

        return parent::getPath($name);
    }

}
