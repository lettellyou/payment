<?php
namespace payment\common\uns\data\charge;

use payment\common\uns\data\UnsBaseData;
use payment\Config;
use payment\common\PayException;
/**
 * @author: zero
 * @Class Config
 * @createTime: 2018-09-14
 * @description: 银盛支付数据封装类
 * @link https://github.com/lettellyou/payment
 */

abstract class ChargeBaseData extends UnsBaseData
{
    protected function checkReqData()
    {
        if (empty($this->data['orderNo']) || mb_strlen($this->data['orderNo'],'utf-8') > 16) {
            throw new PayException('订单号不能为空，该参数支持汉字，最大长度为16个');
        }
        if (bccomp($this->data['amount'], Config::PAY_MIN_FEE, 2) === -1) {
            throw new PayException('支付金额不能低于 '. Config::PAY_MIN_FEE . ' 分');
        }
        if (empty($this->data['title'])) {
            $this->data['title'] = '用户充值';
        }
        if (empty($this->data['attach'])) {
            $this->data['attach'] = '用户充值';
        }
        $this->data['amount'] = floatval($this->data['amount']/100);
    }

    /**
     * 构建请求数据
     * @param $data
     * @return array
     */
    protected function buildRequestPara($data) {
        $sign = $this->makeSign($data);
        $data['mac'] = $sign;
        //写日志，记录请求报文...
        return ['resCode'=>Config::TRADE_SUCCESS_CODE, 'resMsg'=>Config::TRADE_SUCCESS, 'data'=>$data];
    }

    /**
     * 构建签名数据字符串
     * @param $data
     * @return mixed|string
     */
    public function buildSignData($data)
    {
        $str = 'merchantId='.$data['merchantId'].'&merchantUrl='.$data['merchantUrl'].'&responseMode='.$data['responseMode'];
        $str .= '&orderId='.$data['orderId'].'&currencyType='.$data['currencyType'].'&amount='.$data['amount'];
        $str .= '&assuredPay='.$data['assuredPay'].'&time='.$data['time'].'&remark='.$data['remark'].'&merchantKey='.$this->merKey;
        return $str;
    }


}