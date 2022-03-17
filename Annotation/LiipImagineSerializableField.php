<?php declare(strict_types = 1);
/*
 * This file is part of the Bukashk0zzzLiipImagineSerializationBundle
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\LiipImagineSerializationBundle\Annotation;

use Doctrine\ORM\Mapping\Annotation;

/**
 * LiipImagineSerializableField
 *
 * @Annotation()
 * @Target({"PROPERTY", "METHOD"})
 */
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD)]
final class LiipImagineSerializableField implements Annotation
{
    /**
     * @var string|string[]|null LiipImagine Filter
     */
    public $filter;

    /**
     * @var string Field
     */
    public $vichUploaderField;

    /**
     * @var string Virtual Field
     */
    public $virtualField;

    /**
     * @var mixed[] Options
     */
    public $options;

    /**
     * Constructor
     */
    public function __construct(
        $filter = null,
        ?string $vichUploaderField = null,
        ?string $virtualField = null,
    )
    {
        $this->filter = $filter;
        $this->vichUploaderField = $vichUploaderField;
        $this->virtualField = $virtualField;
    }

    /**
     * @return string|string[]|null
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param string|string[] $filter
     */
    public function setFilter($filter): LiipImagineSerializableField
    {
        $this->filter = $filter;

        return $this;
    }

    public function getVichUploaderField(): ?string
    {
        return $this->vichUploaderField;
    }

    public function setVichUploaderField(string $vichUploaderField): LiipImagineSerializableField
    {
        $this->vichUploaderField = $vichUploaderField;

        return $this;
    }

    public function getVirtualField(): ?string
    {
        return $this->virtualField;
    }

    public function setVirtualField(string $virtualField): LiipImagineSerializableField
    {
        $this->virtualField = $virtualField;

        return $this;
    }
}
