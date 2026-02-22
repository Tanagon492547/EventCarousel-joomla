<?php
namespace My\Module\EventCarousel\Site\Dispatcher;
use Joomla\CMS\Dispatcher\DispatcherInterface;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Application\CMSApplicationInterface;
use Joomla\Input\Input;
use Joomla\Registry\Registry;
use My\Module\EventCarousel\Site\Helper\ContentHelper;

\defined('_JEXEC') or die;


class Dispatcher implements DispatcherInterface
{

  protected $module;

  protected $app;

  public function __construct(\stdClass $module, CMSApplicationInterface $app, Input $input)
  {
    $this->module = $module;
    $this->app = $app;
  }
  public function dispatch()
  {
    $params = new Registry($this->module->params);
    $titleCarousel = $params->get('titleCarousel', '');
    $fieldGroup = $params->get('fieldGroup', '');
    $selectCategory = $params->get('selectCategory', '');
    $items = ContentHelper::getByCategory($selectCategory, $fieldGroup);

    require ModuleHelper::getLayoutPath('mod_event_carousel');
  }
}