<?php

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
 * @Annotation
 * @Target({"PROPERTY", "METHOD"})
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
final class LiipImagineSerializableField implements Annotation
{
    /**
     * @var string $filter LiipImagine Filter
     */
    private $filter;

    /**
     * @var string $vichUploaderField Field
     */
    private $vichUploaderField;

    /**
     * @var string $virtualField Virtual Field
     */
    private $virtualField;

    /**
     * @var array $options Options
     */
    private $options;


    /**
     * Constructor
     *
     * @param array $options Options
     *
     * @throws \Exception
     */
    public function __construct(array $options)
    {
        $this->options = $options;

        if (!array_key_exists('value', $this->options) && !array_key_exists('filter', $this->options)) {
            throw new \LogicException(sprintf('Either "value" or "filter" option must be set.'));
        }

        if ($this->checkArrayOption('value')) {
            $this->setFilter($options['value']);
        } elseif ($this->checkArrayOption('filter')) {
            $this->setFilter($this->options['filter']);
        }

        if ($this->checkStringOption('vichUploaderField')) {
            $this->setVichUploaderField($this->options['vichUploaderField']);
        }

        if ($this->checkStringOption('virtualField')) {
            $this->setVirtualField($this->options['virtualField']);
        }
    }

    /**
     * @return string
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param string $filter
     * @return $this
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return string
     */
    public function getVichUploaderField()
    {
        return $this->vichUploaderField;
    }

    /**
     * @param string $vichUploaderField
     * @return $this
     */
    public function setVichUploaderField($vichUploaderField)
    {
        $this->vichUploaderField = $vichUploaderField;

        return $this;
    }

    /**
     * @return string
     */
    public function getVirtualField()
    {
        return $this->virtualField;
    }

    /**
     * @param string $virtualField
     * @return $this
     */
    public function setVirtualField($virtualField)
    {
        $this->virtualField = $virtualField;

        return $this;
    }

    /**
     * @param $optionName
     * @return bool
     * @throws \Exception
     */
    private function checkStringOption($optionName)
    {
        if (array_key_exists($optionName, $this->options)) {
            if (!is_string($this->options[$optionName])) {
                throw new \InvalidArgumentException(sprintf('Option "'.$optionName.'" must be a string.'));
            }

            return true;
        }

        return false;
    }

    /**
     * @param $optionName
     * @return bool
     * @throws \Exception
     */
    private function checkArrayOption($optionName)
    {
        if (array_key_exists($optionName, $this->options)) {
            if (!is_array($this->options[$optionName]) && !is_string($this->options[$optionName])) {
                throw new \InvalidArgumentException(sprintf('Option "'.$optionName.'" must be a array or string.'));
            }

            return true;
        }

        return false;
    }
}
