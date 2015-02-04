<?php

namespace CCM\LocatorBundle\Locator;

/**
 *
 */
class ChainedLocator implements LocatorInterface
{
    public $locators;
    /**
     *
     * @param type $query
     * @return type
     */
    public function searchByKeyword($query)
    {
        $results = array();
        foreach ($this->locators as $locator) {
            $results = array_merge($results, $locator->searchByKeyword($query));
        }

        return $results;
    }

    public function addLocator(LocatorInterface $locator)
    {
        $this->locators[] = $locator;
    }
}
