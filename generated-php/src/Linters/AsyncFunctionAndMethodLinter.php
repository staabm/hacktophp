<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\{FunctionDeclaration as FunctionDeclaration, GenericTypeSpecifier as GenericTypeSpecifier, MethodishDeclaration as MethodishDeclaration};
use HH\Lib\Str as Str;
class AsyncFunctionAndMethodLinter extends FunctionNamingLinter
{
    /**
     * @return string
     */
    public final function getSuggestedNameForFunction(string $name, FunctionDeclaration $func)
    {
        list($head, $suffix) = self::splitName($name);
        $type = $func->getDeclarationHeader()->getType();
        if (!$type instanceof GenericTypeSpecifier) {
            return $name;
        }
        $type = $type->getClassType()->getCode();
        if (!Str\starts_with($head, 'test') && $type === 'Awaitable' && !Str\ends_with($head, '_async') && !Str\ends_with($head, '_asyncx')) {
            return $suffix === null ? $head . '_async' : $head . '_async_' . $suffix;
        }
        return $name;
    }
    /**
     * @return string
     */
    public final function getSuggestedNameForInstanceMethod(string $name, MethodishDeclaration $meth)
    {
        list($head, $suffix) = self::splitName($name);
        $type = $meth->getFunctionDeclHeader()->getType();
        if (!$type instanceof GenericTypeSpecifier) {
            return $name;
        }
        $type = $type->getClassType()->getCode();
        if (!Str\starts_with($head, 'test') && $type === 'Awaitable' && !Str\ends_with($head, 'Async') && !Str\ends_with($head, 'Asyncx')) {
            return $suffix === null ? $head . 'Async' : $head . 'Async' . $suffix;
        }
        return $name;
    }
    /**
     * @return string
     */
    public final function getSuggestedNameForStaticMethod(string $name, MethodishDeclaration $meth)
    {
        return $this->getSuggestedNameForInstanceMethod($name, $meth);
    }
    /**
     * @return array{0:string, 1:null|string}
     */
    protected static function splitName(string $name)
    {
        $suffixes = array('UNTYPED', 'UNSAFE', 'DEPRECATED');
        foreach ($suffixes as $suffix) {
            if (Str\ends_with_ci($name, $suffix)) {
                return array(Str\strip_suffix(Str\slice($name, 0, \strlen($name) - \strlen($suffix)), '_'), $suffix);
            }
        }
        return array($name, null);
    }
}

