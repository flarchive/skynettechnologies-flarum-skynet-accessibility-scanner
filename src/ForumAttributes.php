<?php

namespace Skynettechnologies\SkynetAccessibilityScanner;

use Flarum\Api\Serializer\ForumSerializer;
use Flarum\Formatter\Formatter;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\User\User;
use Flarum\User\UserRepository;
use Illuminate\Contracts\Events\Dispatcher;
use Tobscure\JsonApi\Document;
use Psr\Http\Message\ServerRequestInterface;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ForumAttributes
{
    protected $settings;
    protected $formatter;

    public function __construct(SettingsRepositoryInterface $settings, Formatter $formatter)
    {
        $this->settings = $settings;
        $this->formatter = $formatter;
    }

    public function __invoke(ForumSerializer $serializer): array
    {
        // Only scanner-related settings (keep it minimal)
        return [
            'scannerEnabled' => $this->settings->get('skynettechnologies-skynet-accessibility-scanner.enabled', true),
        ];
    }
}
