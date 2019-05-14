<?php

namespace Drupal\yandex_yml\YandexYml\Shop;

use Drupal;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElement;
use Drupal\yandex_yml\Annotation\YandexYmlXmlElementWrapper;
use Drupal\yandex_yml\Annotation\YandexYmlXmlRootElement;
use Drupal\yandex_yml\YandexYml\Category\Categories;
use Drupal\yandex_yml\YandexYml\Currency\Currencies;
use Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions;
use InvalidArgumentException;

/**
 * Class Shop.
 *
 * @see https://yandex.ru/support/partnermarket/elements/shop.html
 *
 * @YandexYmlXmlRootElement(name = "shop")
 */
final class Shop {

  /**
   * The short shop name.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $name;

  /**
   * The full company name which owns the shop.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $company;

  /**
   * The shop home page.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $url;

  /**
   * The platform name.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $platform;

  /**
   * The platform version.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $version;

  /**
   * The agency name which provides technical support for the shop.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $agency;

  /**
   * The email of platform developers or technical support.
   *
   * @var string
   *
   * @YandexYmlXmlElement()
   */
  protected $email;

  /**
   * The list of currencies supported by shop.
   *
   * @var \Drupal\yandex_yml\YandexYml\Currency\Currencies
   *
   * @YandexYmlXmlElementWrapper()
   */
  protected $currencies;

  /**
   * The list of categories of products.
   *
   * @var \Drupal\yandex_yml\YandexYml\Category\Categories
   *
   * @YandexYmlXmlElementWrapper()
   */
  protected $categories;

  /**
   * The list of delivery options.
   *
   * @var \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions
   *
   * @YandexYmlXmlElementWrapper(name = "delivery-options")
   */
  protected $deliveryOptions;

  /**
   * Shop constructor.
   *
   * @param string $name
   *   The short shop name.
   * @param string $company
   *   The full company name which owns the shop.
   * @param null|string $url
   *   The shop home page.
   * @param null|string $platform
   *   The platform name.
   * @param null|string $version
   *   The platform version.
   * @param null|string $agency
   *   The agency name which provides technical support for the shop.
   * @param null|string $email
   *   The email of platform developers or agency which provides technical
   *   support for the shop.
   */
  public function __construct(
    $name,
    $company,
    $url = NULL,
    $platform = 'Drupal',
    $version = Drupal::VERSION,
    $agency = NULL,
    $email = NULL
  ) {

    $this->setName($name);
    $this->setCompany($company);
    $this->setUrl($url);
    $this->setPlatform($platform);
    $this->setVersion($version);
    $this->setAgency($agency);
    $this->setEmail($email);
  }

  /**
   * Gets name.
   *
   * @return string
   *   The short shop name.
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Sets name.
   *
   * @param string $name
   *   The short shop name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  protected function setName($name) {
    if (mb_strlen($name) > 20) {
      throw new InvalidArgumentException('The shop name must be not longer than 20 chars.');
    }

    $this->name = $name;

    return $this;
  }

  /**
   * Gets company.
   *
   * @return string
   *   The full company name which owns the shop.
   */
  public function getCompany() {
    return $this->company;
  }

  /**
   * Sets company.
   *
   * @param string $company
   *   The full company name which owns the shop.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  protected function setCompany($company) {
    $this->company = $company;

    return $this;
  }

  /**
   * Gets url.
   *
   * @return string
   *   The shop home page.
   */
  public function getUrl() {
    return $this->url;
  }

  /**
   * Sets url.
   *
   * @param null|string $url
   *   The shop home page.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  protected function setUrl($url) {
    if (!$url) {
      $this->url = Drupal::request()->getSchemeAndHttpHost();
    }
    else {
      $this->url = $url;
    }

    if (mb_strlen($this->url) > 50) {
      throw new InvalidArgumentException('The length of shop url must be lower than 50 chars.');
    }

    return $this;
  }

  /**
   * Gets platform.
   *
   * @return string
   *   The platform name.
   */
  public function getPlatform() {
    return $this->platform;
  }

  /**
   * Sets platform.
   *
   * @param null|string $platform
   *   The platform name.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  protected function setPlatform($platform) {
    $this->platform = $platform;

    return $this;
  }

  /**
   * Gets version.
   *
   * @return string
   *   The platform version.
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * Sets version.
   *
   * @param null|string $version
   *   The platform version.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  protected function setVersion($version) {
    $this->version = $version;

    return $this;
  }

  /**
   * Gets agency.
   *
   * @return string
   *   The agency name which provides technical support for the shop.
   */
  public function getAgency() {
    return $this->agency;
  }

  /**
   * Sets agency.
   *
   * @param string $agency
   *   The agency name which provides technical support for the shop.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  protected function setAgency($agency) {
    $this->agency = $agency;

    return $this;
  }

  /**
   * Get email.
   *
   * @return string
   *   The email of platform developers or technical support.
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   * Sets email.
   *
   * @param string $email
   *   The email of platform developers or technical support.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  protected function setEmail($email) {
    $this->email = $email;

    return $this;
  }

  /**
   * Gets currencies.
   *
   * @return \Drupal\yandex_yml\YandexYml\Currency\Currencies
   *   An array of supported currencies.
   */
  public function getCurrencies() {
    return $this->currencies;
  }

  /**
   * Sets currencies for the shop.
   *
   * @param \Drupal\yandex_yml\YandexYml\Currency\Currencies $currencies
   *   The currencies info.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setCurrencies(Currencies $currencies) {
    $this->currencies = $currencies;

    return $this;
  }

  /**
   * Gets categories.
   *
   * @return \Drupal\yandex_yml\YandexYml\Category\Categories
   *   The categories info.
   */
  public function getCategories() {
    return $this->categories;
  }

  /**
   * Sets categories.
   *
   * @param \Drupal\yandex_yml\YandexYml\Category\Categories $categories
   *   The categories info.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setCategories(Categories $categories) {
    $this->categories = $categories;

    return $this;
  }

  /**
   * Gets delivery options.
   *
   * @return \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions
   *   The delivery options.
   */
  public function getDeliveryOptions() {
    return $this->deliveryOptions;
  }

  /**
   * Sets delivery options.
   *
   * @param \Drupal\yandex_yml\YandexYml\Delivery\DeliveryOptions $deliveryOptions
   *   The delivery options.
   *
   * @return \Drupal\yandex_yml\YandexYml\Shop\Shop
   *   The object instance.
   */
  public function setDeliveryOptions(DeliveryOptions $deliveryOptions) {
    $this->deliveryOptions = $deliveryOptions;

    return $this;
  }

}