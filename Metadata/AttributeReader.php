<?php declare(strict_types = 1);

namespace Bukashk0zzz\LiipImagineSerializationBundle\Metadata;

use Doctrine\Common\Annotations\Reader;
use ReflectionAttribute;
use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;

/**
 * @internal
 * https://github.com/dustin10/VichUploaderBundle/blob/master/src/Metadata/MetadataReader.php
 */
final class AttributeReader implements Reader
{
    public function getClassAnnotations(ReflectionClass $class): array
    {
        return $this->convertToAttributeInstances($class->getAttributes());
    }

    public function getClassAnnotation(ReflectionClass $class, $annotationName)
    {
        return $this->getClassAnnotations($class)[$annotationName] ?? null;
    }

    public function getMethodAnnotations(ReflectionMethod $method): array
    {
        return $this->convertToAttributeInstances($method->getAttributes());
    }

    public function getMethodAnnotation(ReflectionMethod $method, $annotationName)
    {
        return $this->getMethodAnnotations($method)[$annotationName] ?? null;
    }

    public function getPropertyAnnotations(ReflectionProperty $property): array
    {
        return $this->convertToAttributeInstances($property->getAttributes());
    }

    public function getPropertyAnnotation(ReflectionProperty $property, $annotationName)
    {
        return $this->getPropertyAnnotations($property)[$annotationName] ?? null;
    }

    /**
     * @param ReflectionAttribute[] $attributes
     */
    private function convertToAttributeInstances(array $attributes): array
    {
        $instances = [];

        foreach ($attributes as $attribute) {
            $attributeName = $attribute->getName();
            $instance = $attribute->newInstance();

            $instances[$attributeName] = $instance;
        }

        return $instances;
    }
}
