<?php
namespace Lms\Exception;

/**
 * @codeCoverageIgnore
 */
class RakebackExceptions extends BaseException
{
    public static function pathIsNotDirException(): self
    {
        return new self('La ruta dada no es un directorio', 400);
    }

    public static function userHasNoPermissionException(): self
    {
        return new self('Ingreso denegado', 400);
    }
}
