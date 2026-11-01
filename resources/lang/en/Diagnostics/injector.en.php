<?php
declare(strict_types=1);

use AstrX\I18n\Translator;
use AstrX\Injector\Diagnostic\CircularDependencyDiagnostic;
use AstrX\Injector\Diagnostic\ClassNotFoundDiagnostic;
use AstrX\Injector\Diagnostic\ClassReflectionDiagnostic;
use AstrX\Injector\Diagnostic\HelperInvalidSignatureDiagnostic;
use AstrX\Injector\Diagnostic\HelperMethodNotFoundDiagnostic;
use AstrX\Injector\Diagnostic\HelperReflectionDiagnostic;
use AstrX\Injector\Diagnostic\MethodNotFoundDiagnostic;
use AstrX\Injector\Diagnostic\UnresolvableParameterDiagnostic;
use AstrX\Result\DiagnosticInterface;

/**
 * Diagnostics — en: injection.
 */
return [

    // Injector
    'astrx.injector/class_not_found' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof ClassNotFoundDiagnostic);

        return "Injector could not find class \"{$d->getClassName()}\".";
    },
    'astrx.injector/class_reflection_error' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof ClassReflectionDiagnostic);

        return "Injector reflection error: {$d->getMessage()}";
    },
    'astrx.injector/method_not_found' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof MethodNotFoundDiagnostic);

        return "Method \"{$d->getMethodName()}\" not found on \"{$d->getClassName()}\".";
    },
    'astrx.injector/helper_method_not_found' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof HelperMethodNotFoundDiagnostic);

        return "Helper method \"{$d->getMethodName()}\" not found on \"{$d->getClassName()}\".";
    },
    'astrx.injector/helper_invalid_signature' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof HelperInvalidSignatureDiagnostic);

        return "Helper \"{$d->getMethodName()}\" on \"{$d->getClassName()}\" has an invalid signature.";
    },
    'astrx.injector/helper_reflection_error' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof HelperReflectionDiagnostic);

        return "Helper reflection error for \"{$d->getMethodName()}\" on \"{$d->getClassName()}\": {$d->getMessage()}";
    },
    'astrx.injector/unresolvable_parameter' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof UnresolvableParameterDiagnostic);

        return "Cannot resolve \"\${$d->getParameterName()}\" for class \"{$d->getClassName()}\".";
    },

    // Injector — method call threw a runtime exception
    'astrx.injector/method_call_exception' =>
        function (DiagnosticInterface $d, Translator $t): string {
            assert($d instanceof \AstrX\Injector\Diagnostic\MethodCallExceptionDiagnostic);
            return "Injector method call exception in {$d->getClassName()}::{$d->getMethodName()}(): {$d->getMessage()}"
;        },

    'astrx.injector/circular_dependency' =>
        function (DiagnosticInterface $d, Translator $t): string {
            assert($d instanceof CircularDependencyDiagnostic);
            return "Circular dependency while constructing \"{$d->getClassName()}\" — "
                . 'two classes require each other in their constructors.';
        },
];
