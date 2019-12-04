<?php
namespace Lms\Exception;

/**
 * @codeCoverageIgnore
 */
class RakebackExceptions extends BaseException
{
    public static function PathIsNotDirException(): self
    {
        return new self('La ruta dada no es un directorio', 400);
    }

    public static function UserHasNoPermissionException(): self
    {
        return new self('Ingreso denegado', 400);
    }
}
