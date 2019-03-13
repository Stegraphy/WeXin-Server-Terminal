<?php
/**
 * Created by IntelliJ IDEA.
 * User: Stephy
 * Date: 2019/3/12
 * Time: 20:47
 */

namespace app\lib\enum;


class OrderStatusEnum
{
    //待支付
    const UNPAID = 1;
    //已支付
    const PAID = 2;
    //已发货
    const DELIVERED = 3;
    //已支付，但库存量不足
    const PAID_BUT_OUT_OF = 4;
}