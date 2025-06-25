<?php declare(strict_types=1);

namespace App\task165;

class FileMaster
{
    public const string DIR_SEPARATOR = '/';
    public const string EXT_SEPARATOR = '.';
    private string $filePath;

    public function __construct(string $filePath){
        $this->filePath = $filePath;
    }

    public function extension(): string
    {
        $fileParts = $this->splitFilenameAndExtension();

        return $fileParts[count($fileParts) - 1];
    }

    public function filename(): string
    {
        $fileParts = $this->splitFilenameAndExtension();

        return $fileParts[0];
    }
    public function dirpath(): string
    {
        $parts = $this->getFilePathSegments();
        array_pop($parts);

        return implode(FileMaster::DIR_SEPARATOR, $parts) . FileMaster::DIR_SEPARATOR;
    }

    /**
     * @return string[]
     */
    private function getFilePathSegments(): array
    {
        return explode(FileMaster::DIR_SEPARATOR, $this->filePath);
    }

    /**
     * @return string[]
     */
    private function splitFilenameAndExtension(): array
    {
        $parts = $this->getFilePathSegments();

        return explode(FileMaster::EXT_SEPARATOR, $parts[count($parts) - 1]);
    }
}
