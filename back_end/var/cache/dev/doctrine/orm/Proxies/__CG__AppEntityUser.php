<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \App\Entity\User implements \Doctrine\ORM\Proxy\InternalProxy
{
    use \Symfony\Component\VarExporter\LazyGhostTrait {
        initializeLazyObject as private;
        setLazyObjectAsInitialized as public __setInitialized;
        isLazyObjectInitialized as private;
        createLazyGhost as private;
        resetLazyObject as private;
    }

    public function __load(): void
    {
        $this->initializeLazyObject();
    }
    

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'email' => [parent::class, 'email', null],
        "\0".parent::class."\0".'firstname' => [parent::class, 'firstname', null],
        "\0".parent::class."\0".'gedcoms' => [parent::class, 'gedcoms', null],
        "\0".parent::class."\0".'id' => [parent::class, 'id', null],
        "\0".parent::class."\0".'isVerified' => [parent::class, 'isVerified', null],
        "\0".parent::class."\0".'lastname' => [parent::class, 'lastname', null],
        "\0".parent::class."\0".'password' => [parent::class, 'password', null],
        "\0".parent::class."\0".'roles' => [parent::class, 'roles', null],
        "\0".parent::class."\0".'username' => [parent::class, 'username', null],
        'email' => [parent::class, 'email', null],
        'firstname' => [parent::class, 'firstname', null],
        'gedcoms' => [parent::class, 'gedcoms', null],
        'id' => [parent::class, 'id', null],
        'isVerified' => [parent::class, 'isVerified', null],
        'lastname' => [parent::class, 'lastname', null],
        'password' => [parent::class, 'password', null],
        'roles' => [parent::class, 'roles', null],
        'username' => [parent::class, 'username', null],
    ];

    public function __isInitialized(): bool
    {
        return isset($this->lazyObjectState) && $this->isLazyObjectInitialized();
    }

    public function __serialize(): array
    {
        $properties = (array) $this;
        unset($properties["\0" . self::class . "\0lazyObjectState"]);

        return $properties;
    }
}
