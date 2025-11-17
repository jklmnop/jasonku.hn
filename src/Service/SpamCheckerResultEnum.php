<?php

declare(strict_types=1);

namespace App\Service;

enum SpamCheckerResultEnum
{
    case HAM;
    case SPAMAYBE;
    case SPAM;
}
