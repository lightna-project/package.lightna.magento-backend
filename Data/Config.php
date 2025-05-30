<?php

declare(strict_types=1);

namespace Lightna\Magento\Backend\Data;

use Lightna\Engine\App\Context;
use Lightna\Engine\App\Exception\LightnaException;
use Lightna\Engine\Data\DataA;
use Lightna\Magento\Backend\Data\Config\Currency;
use Lightna\Magento\Backend\Data\Config\Favicon;
use Lightna\Magento\Backend\Data\Config\GoogleAnalytics;
use Lightna\Magento\Backend\Data\Config\Logo;
use Lightna\Magento\Backend\Data\Config\Product;
use Lightna\Magento\Backend\Data\Config\Session;

/**
 * @method string copyright(string $escapeMethod = null)
 * @method string noRoutePageId(string $escapeMethod = null)
 */
class Config extends DataA
{
    public Currency $currency;
    public Favicon $favicon;
    public GoogleAnalytics $ga;
    public Locale $locale;
    public Logo $logo;
    public Product $product;
    public Session $session;
    public int $noRoutePageId;
    public string $copyright;

    /** @AppConfig(entity/config/entity) */
    protected string $configEntity;
    protected Context $context;

    protected function init(array $data = []): void
    {
        parent::init($this->getEntityData());
    }

    protected function getEntityData(): array
    {
        if (!$data = getobj($this->configEntity)->get(1)) {
            throw new LightnaException('Config data for scope ' . $this->context->scope . ' not found');
        }

        return $data;
    }
}
