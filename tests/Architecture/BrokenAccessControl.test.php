<?php

/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

use Illuminate\Foundation\Http\FormRequest;

/**
 * Ensures that every invokable controller uses a FormRequest
 * that implements an authorize() method.
 *
 * This test reduces the risk of Broken Access Control by
 * enforcing consistent request validation and authorisation
 * for all controllers.
 */
it('enforces controllers to expect a FormRequest with authorize()', function () {
    /**
     * Collect the absolute path to our Controllers folder
     * from the project root.
     */
    $controllerPath = realpath('src/Http/Controllers');
    $controllerNamespace = 'Itsmattch\\Nfd\\Http\\Controllers\\';

    if (! $controllerPath) {
        $this->fail('Could not locate "src/Http/Controllers" folder.');
    }

    /**
     * Build a list of all PHP files under our Controllers directory
     * using PHP's RecursiveDirectoryIterator. We skip any non-PHP files.
     */
    $phpFiles = [];
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($controllerPath));

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $phpFiles[] = $file->getPathname();
        }
    }

    /**
     * For each discovered file, we try to map its path to a valid
     * controller class name under the "Itsmattch\Nfd\Http\Controllers"
     * namespace. If the class doesn't exist, we skip it.
     */
    foreach ($phpFiles as $filePath) {

        $className = str_replace($controllerPath, '', $filePath);
        $className = ltrim($className, DIRECTORY_SEPARATOR);
        $className = str_replace([DIRECTORY_SEPARATOR, '.php'], ['\\', ''], $className);
        $className = $controllerNamespace.$className;

        if (! class_exists($className)) {
            continue; // Not an actual loadable class, skip
        }

        $reflector = new ReflectionClass($className);

        if (! $reflector->hasMethod('__invoke')) {
            continue;
        }

        $invoke = $reflector->getMethod('__invoke');
        $params = $invoke->getParameters();

        if (count($params) < 1) {
            $this->fail("Controller [$className] __invoke() must have at least one parameter.");
        }

        $paramType = $params[0]->getType();

        if (! $paramType instanceof ReflectionNamedType) {
            $this->fail("First parameter of [$className::__invoke()] must be typed (FormRequest).");
        }

        $paramClassName = $paramType->getName();
        if (! class_exists($paramClassName)) {
            $this->fail("First parameter of [$className::__invoke()] references a non-existent class.");
        }

        $requestReflector = new ReflectionClass($paramClassName);
        if (! $requestReflector->isSubclassOf(FormRequest::class)) {
            $this->fail("First parameter of [$className::__invoke()] must be a FormRequest subclass.");
        }

        $this->assertTrue(
            $requestReflector->hasMethod('authorize'),
            "Request [$paramClassName] doesn't define an authorize() method."
        );
    }
});
