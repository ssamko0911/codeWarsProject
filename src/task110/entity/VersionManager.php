<?php

declare(strict_types=1);

namespace App\task110\entity;

use Exception;

class VersionManager
{
    const DEFAULT_VERSION = '0.0.1';
    const DATA_SEPARATOR = '.';

    public array $backup = [];

    public string $version;

    /**
     * @throws Exception
     */
    public function __construct(string|null $version = null)
    {
        $cleanedVersion = $this->cleanVersion($version);

        if (!$this->isValidParameter($cleanedVersion)) {
            throw new Exception('Error occured while parsing version!');
        }

        if (empty($cleanedVersion)) {
            $this->version = self::DEFAULT_VERSION;
        } else {
            $this->version = $cleanedVersion;
        }
    }

    private function isValidParameter(string|null $version): bool
    {
        if (empty($version)) {
            return true;
        }

        $versionAsArray = explode('.', $version);

        foreach ($versionAsArray as $value) {
            if (!is_numeric($value)) {
                return false;
            }
        }

        return true;
    }

    public function major(): self
    {
        $this->backup[] = $this->version;
        $versionAsArray = explode('.', $this->version);
        $versionAsArray[0] = intval($versionAsArray[0]) + 1;
        $versionAsArray[1] = 0;
        $versionAsArray[2] = 0;
        $this->version = implode('.', $versionAsArray);

        return $this;
    }

    public function minor(): self
    {
        $this->backup[] = $this->version;
        $versionAsArray = explode('.', $this->version);
        $versionAsArray[1] = intval($versionAsArray[1]) + 1;
        $versionAsArray[2] = 0;
        $this->version = implode('.', $versionAsArray);

        return $this;
    }

    public function patch(): self
    {
        $this->backup[] = $this->version;
        $versionAsArray = explode('.', $this->version);
        $versionAsArray[2] = intval($versionAsArray[2]) + 1;
        $this->version = implode('.', $versionAsArray);

        return $this;
    }

    /**
     * @throws Exception
     */
    public function rollback(): self
    {
        if (!isset($this->backup) || $this->backup === []) {
            throw new Exception('Cannot rollback!');
        }

        if (count($this->backup) > 0) {
            $this->version = array_pop($this->backup);
        } else {
            throw new Exception('Cannot rollback!');
        }

        return $this;
    }


    public function release(): string
    {
        return $this->version;
    }

    private function cleanVersion(string|null $version): string
    {
        if (empty($version)) {
            return '';
        }

        if (substr_count($version, self::DATA_SEPARATOR) === 0) {
            return "$version.0.0";
        }

        if (substr_count($version, self::DATA_SEPARATOR) === 1) {
            return "$version.0";
        }

        if (substr_count($version, self::DATA_SEPARATOR) === 2) {
            return $version;
        }

        if (substr_count($version, self::DATA_SEPARATOR) > 2) {
            $versionAsArray = explode('.', $version);
            return implode('.', array_slice($versionAsArray, 0, 3));
        }

        return $version;
    }
}
