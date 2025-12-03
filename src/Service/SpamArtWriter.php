<?php

declare(strict_types=1);

namespace App\Service;

use DateTimeImmutable;
use Symfony\Component\Filesystem\Filesystem;

final readonly class SpamArtWriter
{
    public function __construct(
        private Filesystem $filesystem,
    ) {
    }

    public function add(string $spam, SpamCheckerResultEnum $spamCheckerResultEnum): void
    {
        $spam = md5($spam);

        $regex = "/^(?<color1>[a-z0-9]{6})(?<color2>[a-z0-9]{6})(?<color3>[a-z0-9]{6})(?<color4>[a-z0-9]{6})(?<colorBg>[a-z0-9]{8})$/";

        preg_match($regex, $spam, $matches);

        $item = [
            'color1' => $matches['color1'] ?? '000',
            'color2' => $matches['color2'] ?? '000',
            'color3' => $matches['color3'] ?? '000',
            'color4' => $matches['color4'] ?? '000',
            'colorBg' => $matches['colorBg'] ?? '000',
        ];

        $item['spamScore'] = $spamCheckerResultEnum->name;
        $item['date'] = (new DateTimeImmutable())->format('Y-m-d H:i:s');

        $jsonFile = file_get_contents('spam.json');

        if ($jsonFile !== false) {

            $json = json_decode($jsonFile, true);
            $json[] = $item;

            $stringified = json_encode($json);

            if (is_string($stringified)) {
                $this->filesystem->dumpFile('spam.json', $stringified);
            }
        }

    }
}
