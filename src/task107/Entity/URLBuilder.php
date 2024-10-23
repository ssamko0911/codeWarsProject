<?php

declare(strict_types=1);

namespace App\task107\Entity;

use Exception;

class URLBuilder
{
    const SCHEME_DEFAULT = 'http';
    const PORT_DEFAULT = '80';
    const PATH_DEFAULT = '/';

    const UTIL_STRINGS = [
        'urlSeparator' => '://',
        'semicolon' => ':',
        'atSign' => '@',
        'questionMark' => '?',
        'hashTag' => '#',
    ];

    public string $scheme;
    public string $user;
    public string $pass;
    public string $host;
    public string $port;
    public string $path;
    public array $query;
    public string $fragment;

    /**
     * @throws Exception
     */
    public function __construct(array $options)
    {
        if (empty($options['host'])) {
            throw new Exception("Empty parameter 'host' is not allowed.");
        }

        if (isset($options['query'])) {
            if ('array' !== gettype($options['query'])) {
                throw new Exception("Type of parameter 'query' must be array.");
            }
        }

        $this->scheme = $options['scheme'] ?? self::SCHEME_DEFAULT;
        $this->user = $options['user'] ?? '';
        $this->pass = $options['pass'] ?? '';
        $this->host = $options['host'];
        $this->port = $options['port'] ?? self::PORT_DEFAULT;
        $this->path = $options['path'] ?? self::PATH_DEFAULT;
        $this->query = $options['query'] ?? [];
        $this->fragment = $options['fragment'] ?? '';
    }

    public function build(): string
    {
        $url = '';

        $url .= $this->addSchemeToUrl();
        $url = $this->addUserToUrl($url);
        $url .= $this->host;
        $url .= $this->addPortToUrl();
        $url .= $this->path;
        $url .= $this->addQueryStringToUrl();
        $url .= $this->addFragmentToUrl();

        return $url;
    }

    private function addSchemeToUrl(): string
    {
        return $this->scheme . self::UTIL_STRINGS['urlSeparator'];
    }

    private function addUserToUrl(string $url): string
    {
        if (!empty($this->user) && !empty($this->pass)) {
            $url .= $this->user . self::UTIL_STRINGS['semicolon'];
            $url .= urlencode($this->pass) . self::UTIL_STRINGS['atSign'];
        }

        return $url;
    }

    private function addPortToUrl(): string
    {
        return self::PORT_DEFAULT !== $this->port ? self::UTIL_STRINGS['semicolon'] . $this->port : '';
    }

    private function addQueryStringToUrl(): string
    {
        return [] !== $this->query ? self::UTIL_STRINGS['questionMark'] . http_build_query($this->query) : '';
    }

    private function addFragmentToUrl(): string
    {
        return !empty($this->fragment) ? self::UTIL_STRINGS['hashTag'] . $this->fragment : '';
    }
}
