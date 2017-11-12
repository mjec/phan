<?php declare(strict_types=1);
namespace Phan\Language\FQSEN;

/**
 * A Fully-Qualified Method Name
 */
class FullyQualifiedMethodName extends FullyQualifiedClassElement implements FullyQualifiedFunctionLikeName
{
    /**
     * Maps lowercase versions of function names to their canonical names, for magic methods.
     * This makes checks for magic method names more reliable.
     */
    const CANONICAL_NAMES = [
        '__call'        => '__call',
        '__callstatic'  => '__callStatic',
        '__clone'       => '__clone',
        '__construct'   => '__construct',
        '__debuginfo'   => '__debugInfo',
        '__destruct'    => '__destruct',
        '__get'         => '__get',
        '__invoke'      => '__invoke',
        '__isset'       => '__isset',
        '__set'         => '__set',
        '__set_state'   => '__set_state',
        '__sleep'       => '__sleep',
        '__tostring'    => '__toString',
        '__unset'       => '__unset',
        '__wakeup'      => '__wakeup',
    ];

    const MAGIC_METHOD_NAME_SET = [
        '__call'        => true,
        '__callStatic'  => true,
        '__clone'       => true,
        '__construct'   => true,
        '__debugInfo'   => true,
        '__destruct'    => true,
        '__get'         => true,
        '__invoke'      => true,
        '__isset'       => true,
        '__set'         => true,
        '__set_state'   => true,
        '__sleep'       => true,
        '__toString'    => true,
        '__unset'       => true,
        '__wakeup'      => true,
    ];

    /**
     * A list of magic methods which should have a return type of void
     */
    const MAGIC_VOID_METHOD_NAME_SET = [
        '__clone'       => true,
        '__construct'   => true,
        '__destruct'    => true,
        '__set'         => true,
        '__unset'       => true,
        '__wakeup'      => true,
    ];

    /**
     * @return string
     * The canonical representation of the name of the object. Functions
     * and Methods, for instance, lowercase their names.
     */
    public static function canonicalName(string $name) : string
    {
        return self::CANONICAL_NAMES[\strtolower($name)] ?? $name;
    }

    /**
     * @return bool
     * True if this FQSEN represents a closure
     */
    public function isClosure() : bool
    {
        return false;
    }
}
