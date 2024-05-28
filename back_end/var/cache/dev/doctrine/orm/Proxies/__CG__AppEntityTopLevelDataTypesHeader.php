<?php

namespace Proxies\__CG__\App\Entity\TopLevelDataTypes;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Header extends \App\Entity\TopLevelDataTypes\Header implements \Doctrine\ORM\Proxy\InternalProxy
{
    use \Symfony\Component\VarExporter\LazyGhostTrait {
        initializeLazyObject as __load;
        setLazyObjectAsInitialized as public __setInitialized;
        isLazyObjectInitialized as private;
        createLazyGhost as private;
        resetLazyObject as private;
    }

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'charactereSet' => [parent::class, 'charactereSet', null],
        "\0".parent::class."\0".'copyright' => [parent::class, 'copyright', null],
        "\0".parent::class."\0".'fileCreationDate' => [parent::class, 'fileCreationDate', null],
        "\0".parent::class."\0".'fileName' => [parent::class, 'fileName', null],
        "\0".parent::class."\0".'gedcom' => [parent::class, 'gedcom', null],
        "\0".parent::class."\0".'id' => [parent::class, 'id', null],
        "\0".parent::class."\0".'language' => [parent::class, 'language', null],
        "\0".parent::class."\0".'note' => [parent::class, 'note', null],
        "\0".parent::class."\0".'receivingSystemName' => [parent::class, 'receivingSystemName', null],
        "\0".parent::class."\0".'sourceBusiness' => [parent::class, 'sourceBusiness', null],
        "\0".parent::class."\0".'sourceName' => [parent::class, 'sourceName', null],
        "\0".parent::class."\0".'sourceNameData' => [parent::class, 'sourceNameData', null],
        "\0".parent::class."\0".'sourceNameDataCopyright' => [parent::class, 'sourceNameDataCopyright', null],
        "\0".parent::class."\0".'sourceNameDataDate' => [parent::class, 'sourceNameDataDate', null],
        "\0".parent::class."\0".'sourceVersionNumber' => [parent::class, 'sourceVersionNumber', null],
        "\0".parent::class."\0".'versionForm' => [parent::class, 'versionForm', null],
        "\0".parent::class."\0".'versionNumber' => [parent::class, 'versionNumber', null],
        'charactereSet' => [parent::class, 'charactereSet', null],
        'copyright' => [parent::class, 'copyright', null],
        'fileCreationDate' => [parent::class, 'fileCreationDate', null],
        'fileName' => [parent::class, 'fileName', null],
        'gedcom' => [parent::class, 'gedcom', null],
        'id' => [parent::class, 'id', null],
        'language' => [parent::class, 'language', null],
        'note' => [parent::class, 'note', null],
        'receivingSystemName' => [parent::class, 'receivingSystemName', null],
        'sourceBusiness' => [parent::class, 'sourceBusiness', null],
        'sourceName' => [parent::class, 'sourceName', null],
        'sourceNameData' => [parent::class, 'sourceNameData', null],
        'sourceNameDataCopyright' => [parent::class, 'sourceNameDataCopyright', null],
        'sourceNameDataDate' => [parent::class, 'sourceNameDataDate', null],
        'sourceVersionNumber' => [parent::class, 'sourceVersionNumber', null],
        'versionForm' => [parent::class, 'versionForm', null],
        'versionNumber' => [parent::class, 'versionNumber', null],
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
