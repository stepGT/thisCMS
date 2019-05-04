<?php

namespace App\TCController;

use Admin\TCModel\TCPage\TCPageRepository;
use App\TCClasses\TCPage;

class_alias('App\\TCClasses\\TCPage', 'TCPage');

/**
 * Class TCPageController
 *
 * @package App\TCController
 */
class TCPageController extends TCAppController {

  const TEMPLATE_PAGE_MASK = 'page-%s';

  /**
   * @param string|int $segment
   */
  public function show($segment) {
    $this->tcLoad->tcModel('TCPage', FALSE, 'Admin');

    /** @var TCPageRepository $pageModel */
    $pageModel = $this->tcModel->TCPage;

    $page = $pageModel->getPageBySegment($segment);

    if ($page === FALSE) {
      header('Location: /');
      exit;
    }

    $template = 'page';
    if ($page->type !== 'page') {
      $template = sprintf(self::TEMPLATE_PAGE_MASK, $page->type);
    }

    TCPage::setStore($page);

    $this->tcView->tcRender($template);
  }
}
