<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerVMuj26n\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerVMuj26n/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerVMuj26n.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerVMuj26n\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerVMuj26n\App_KernelDevDebugContainer([
    'container.build_hash' => 'VMuj26n',
    'container.build_id' => '66d0576b',
    'container.build_time' => 1711029222,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerVMuj26n');