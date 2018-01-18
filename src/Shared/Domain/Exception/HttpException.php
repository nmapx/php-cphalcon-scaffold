<?php declare(strict_types=1);

namespace Shared\Domain\Exception;

class HttpException extends GenericException
{
    protected $code = 500;

    protected $message = 'Unexpected error';
}
