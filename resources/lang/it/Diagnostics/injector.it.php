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
 * Diagnostics — it: injection.
 */
return [

    // Injector
    'astrx.injector/class_not_found' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof ClassNotFoundDiagnostic);

        return "L'injector non ha trovato la classe \"{$d->getClassName()}\".";
    },
    'astrx.injector/class_reflection_error' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof ClassReflectionDiagnostic);

        return "Errore di reflection nell'injector: {$d->getMessage()}";
    },
    'astrx.injector/method_not_found' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof MethodNotFoundDiagnostic);

        return "Metodo \"{$d->getMethodName()}\" non trovato su \"{$d->getClassName()}\".";
    },
    'astrx.injector/helper_method_not_found' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof HelperMethodNotFoundDiagnostic);

        return "Metodo helper \"{$d->getMethodName()}\" non trovato su \"{$d->getClassName()}\".";
    },
    'astrx.injector/helper_invalid_signature' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof HelperInvalidSignatureDiagnostic);

        return "L'helper \"{$d->getMethodName()}\" su \"{$d->getClassName()}\" ha una firma non valida.";
    },
    'astrx.injector/helper_reflection_error' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof HelperReflectionDiagnostic);

        return "Errore di reflection per \"{$d->getMethodName()}\" su \"{$d->getClassName()}\": {$d->getMessage()}";
    },
    'astrx.injector/unresolvable_parameter' => function (
        DiagnosticInterface $d,
        Translator $t
    )
    : string {
        assert($d instanceof UnresolvableParameterDiagnostic);

        return "Impossibile risolvere \"\${$d->getParameterName()}\" per la classe \"{$d->getClassName()}\".";
    },

    // Injector — method call threw a runtime exception
    'astrx.injector/method_call_exception' =>
        function (DiagnosticInterface $d, Translator $t): string {
            assert($d instanceof \AstrX\Injector\Diagnostic\MethodCallExceptionDiagnostic);
            return "Eccezione nel metodo Injector {$d->getClassName()}::{$d->getMethodName()}(): {$d->getMessage()}"
;        },

    'astrx.injector/circular_dependency' =>
        function (DiagnosticInterface $d, Translator $t): string {
            assert($d instanceof CircularDependencyDiagnostic);
            return "Dipendenza circolare durante la costruzione di \"{$d->getClassName()}\" — "
                . 'due classi si richiedono a vicenda nei costruttori.';
        },
];
