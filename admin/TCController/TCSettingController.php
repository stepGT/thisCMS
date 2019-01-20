<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 11/5/2018
 * Time: 7:19 PM
 */

namespace Admin\TCController;


class TCSettingController extends TCAdminController {

  /**
   *
   */
  public function general() {
    $this->tcLoad->tcModel('TCSetting');
    $this->data['settings']  = $this->tcModel->TCSetting->getSettings();
    $this->data['languages'] = TCFunctionLanguages();
    $this->tcView->tcRender('TCSetting/general', $this->data);
  }

  /**
   * @return mixed
   */
  public function TCSettingControllerUpdateSetting() {
    $this->tcLoad->tcModel('TCSetting');
    $params = $this->tcRequest->tcPost;
    $update = $this->tcModel->TCSetting->update($params);
    return $update;
  }
}