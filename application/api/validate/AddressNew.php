<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/8
 * Time: 9:47
 */

namespace app\api\validate;


class AddressNew extends BaseValidate
{
      protected $rule = [
        'name' => 'require|isNotEmpty',
        'mobile' => 'require|isMobile',
        'province' => 'require|isNOtEmpty',
        'city' => 'require|isNotEmpty',
        'country' => 'require|isNotEmpty',
          'detail' => 'require|isNotEmpty'
      ];
}