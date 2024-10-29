<?php

declare(strict_types=1);

namespace App\task110\entity;

use Exception;

class VersionManager
{
    const DATA_SEPARATOR = '.';

    public int $major = 0;
    public int $minor = 0;
    public int $patch = 1;

    /**@var array<int, array<string, int|string>> */
    public array $backups = [];

    /**
     * @throws Exception
     */
    public function __construct(string|null $version = null)
    {
        $params = $this->getParamsAsArray($version);

        if (!$this->isValidParameter($params)) {
            throw new Exception('Error occured while parsing version!');
        }

        if (!empty($params)) {
            $this->major = $params['major'];
            $this->minor = $params['minor'];
            $this->patch = $params['patch'];
        }
    }

    /**
     * @param string|null $version
     * @return array<string, int|string>
     */
    private function getParamsAsArray(string|null $version): array
    {
        $versionAsArray = [];

        if (null === $version || '' === $version) {
            return $versionAsArray;
        }

        $separatorCount = substr_count($version, self::DATA_SEPARATOR);

        switch ($separatorCount) {
            case 0:
                return [
                    'major' => $version,
                    'minor' => 0,
                    'patch' => 0,
                ];
            case 1:

                $versionAsArray = explode('.', $version);

                return [
                    'major' => $versionAsArray[0],
                    'minor' => $versionAsArray[1],
                    'patch' => 0,
                ];

            case 2:
                $versionAsArray = explode('.', $version);

                return [
                    'major' => $versionAsArray[0],
                    'minor' => $versionAsArray[1],
                    'patch' => $versionAsArray[2],
                ];

            case $separatorCount > 2:
                $versionAsArray = array_slice(explode('.', $version), 0, 3);

                return [
                    'major' => $versionAsArray[0],
                    'minor' => $versionAsArray[1],
                    'patch' => $versionAsArray[2],
                ];

            default:
                return $versionAsArray;
        }
    }

    /**
     * @param string[] $version
     * @return bool
     */
    private function isValidParameter(array $version): bool
    {
        if ([] === $version) {
            return true;
        }

        foreach ($version as $value) {
            if (!is_numeric($value)) {
                return false;
            }
        }

        return true;
    }

    private function setBackups(): self
    {
        $this->backups[] = [
            'major' => $this->major,
            'minor' => $this->minor,
            'patch' => $this->patch,
        ];

        return $this;
    }

    private function getVersionAsString(): string
    {
        return sprintf('%d.%d.%d', $this->major, $this->minor, $this->patch);
    }

    public function major(): self
    {
        $this->setBackups();

        $this->major += 1;
        $this->minor = 0;
        $this->patch = 0;

        return $this;
    }

    public function minor(): self
    {
        $this->setBackups();

        $this->minor += 1;
        $this->patch = 0;

        return $this;
    }

    public function patch(): self
    {
        $this->setBackups();

        $this->patch += 1;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function rollback(): self
    {
        if (!isset($this->backups) || $this->backups === []) {
            throw new Exception('Cannot rollback!');
        }

        if (count($this->backups) > 0) {
            $lastBackup = array_pop($this->backups);

            $this->major = $lastBackup['major'];
            $this->minor = $lastBackup['minor'];
            $this->patch = $lastBackup['patch'];
        } else {
            throw new Exception('Cannot rollback!');
        }

        return $this;
    }

    public function release(): string
    {
        return $this->getVersionAsString();
    }
}
