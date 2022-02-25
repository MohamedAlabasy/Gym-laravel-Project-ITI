<?php

namespace Spatie\Ignition\Config;

class DefaultConfigFinder
{
    public function getConfigFilePath(): string
    {
        if (! $homeDirectory = $this->findHomeDirectory()) {
            return '';
        }

        $filepath = "{$homeDirectory}/.ignition.json";
        
        return @is_readable($filepath) ? $filepath : '';
    }

    protected function findHomeDirectory(): ?string
    {
        if ($this->isWindows()) {
            if (empty($_SERVER['HOMEDRIVE']) || empty($_SERVER['HOMEPATH'])) {
                return null;
            }

            $homeDirectory = $_SERVER['HOMEDRIVE'] . $_SERVER['HOMEPATH'];

            return rtrim($homeDirectory, DIRECTORY_SEPARATOR);
        }

        if ($homeDirectory = getenv('HOME')) {
            return rtrim($homeDirectory, DIRECTORY_SEPARATOR);
        }

        return null;
    }

    private function isWindows(): bool
    {
        return str_starts_with(strtoupper(PHP_OS), 'WIN');
    }
}
