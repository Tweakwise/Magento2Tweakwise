<?php

/**
 * Tweakwise (https://www.tweakwise.com/) - All Rights Reserved
 *
 * @copyright Copyright (c) 2017-2022 Tweakwise.com B.V. (https://www.tweakwise.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Tweakwise\Magento2Tweakwise\Model\Client\Request;

use Tweakwise\Magento2Tweakwise\Model\Client\Request;
use Tweakwise\Magento2Tweakwise\Model\Client\Response\FacetResponse;

class AnalyticsRequest extends Request
{
    /**
     * @var string
     */
    protected $path = '';

    protected $apiUrl = 'https://navigator-analytics.tweakwise.com/api';

    public function isPostRequest()
    {
        return true;
    }

    public function getApiurl()
    {
        return $this->apiUrl;
    }

    public function setProfileKey(string $profileKey)
    {
        $this->setParameter('ProfileKey', $profileKey);
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function getProfileKey()
    {
        $profileKey = $this->getCookie($this->config->getPersonalMerchandisingCookieName());
        if (!$profileKey) {
            $profileKey = $this->generateProfileKey();
            $this->setCookie('profileKey', $profileKey);
        }
        return $profileKey;
    }
}
