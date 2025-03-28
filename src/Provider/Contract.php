<?php
namespace tinymeng\Chinaums\Provider;

use tinymeng\Chinaums\Tools\DES;

/**
 * 自助签约
 * @method static \tinymeng\Chinaums\Service\Contract\AgreementSign AgreementSign(array $params) 前台签约接口
 * @method static \tinymeng\Chinaums\Service\Contract\AlterQry AlterQry(array $params) 变更入网状态查询接口
 * @method static \tinymeng\Chinaums\Service\Contract\AlterSign AlterSign(array $params) 变更签约接口
 * @method static \tinymeng\Chinaums\Service\Contract\ApplyQry ApplyQry(array $params) 入网状态查询接口
 * @method static \tinymeng\Chinaums\Service\Contract\BranchBankList BranchBankList(array $params) 所属支行查询接口
 * @method static \tinymeng\Chinaums\Service\Contract\CompanyAccountVerify CompanyAccountVerify(array $params) 对公账户认证接口
 * @method static \tinymeng\Chinaums\Service\Contract\ComplexAlterAcctinfo ComplexAlterAcctinfo(array $params) 商户账户信息变更接口
 * @method static \tinymeng\Chinaums\Service\Contract\ComplexUpload ComplexUpload(array $params) 详细采集档案资料上传接口
 * @method static \tinymeng\Chinaums\Service\Contract\DataDownload DataDownload(array $params) 省市区行业数据下载接口
 * @method static \tinymeng\Chinaums\Service\Contract\DcepSmsSend DcepSmsSend(array $params) 开通数字人民币客户意愿验证短信发送接口
 * @method static \tinymeng\Chinaums\Service\Contract\MchntDcepAlertSign MchntDcepAlertSign(array $params) 数字人民币变更发起签约接口
 * @method static \tinymeng\Chinaums\Service\Contract\MerAlter MerAlter(array $params) 平台类全前台商户变更接入接口
 * @method static \tinymeng\Chinaums\Service\Contract\MerchantReg MerchantReg(array $params) 平台类全前台接入接口
 * @method static \tinymeng\Chinaums\Service\Contract\NmrsBindQrcode NmrsBindQrcode(array $params) 存量商户绑定二维码接口
 * @method static \tinymeng\Chinaums\Service\Contract\NmrsCertChange NmrsCertChange(array $params) 证照变更接口
 * @method static \tinymeng\Chinaums\Service\Contract\NmrsCertChangeSign NmrsCertChangeSign(array $params) 证照变更发起签约接口
 * @method static \tinymeng\Chinaums\Service\Contract\NmrsDcepOpen NmrsDcepOpen(array $params) 存量商户开通数字人民币业务接口
 * @method static \tinymeng\Chinaums\Service\Contract\NmrsDocChange NmrsDocChange(array $params) 商户图片信息变更接口
 * @method static \tinymeng\Chinaums\Service\Contract\NmrsLegalmanCertChange NmrsLegalmanCertChange(array $params) 法人证照变更接口
 * @method static \tinymeng\Chinaums\Service\Contract\NmrsMchntCertChange NmrsMchntCertChange(array $params) 商户证照变更接口
 * @method static \tinymeng\Chinaums\Service\Contract\NmrsStoreChange NmrsStoreChange(array $params) 商户分店信息变更接口
 * @method static \tinymeng\Chinaums\Service\Contract\PicUpload PicUpload(array $params) 关闭接口
 * @method static \tinymeng\Chinaums\Service\Contract\RequestAccountVerify RequestAccountVerify(array $params) 发起对公账户验证交易接口
 * @method static \tinymeng\Chinaums\Service\Contract\StoreChangeSign StoreChangeSign(array $params) 分店变更签约接口
 * @method static \tinymeng\Chinaums\Service\Contract\SubmchntListQry SubmchntListQry(array $params) 分店列表查询接口
 * @method static \tinymeng\Chinaums\Service\Contract\TerminalsQry TerminalsQry(array $params) 商户终端号查询接口
 */
class Contract extends BaseProvider
{
    protected $config = [];
    /**
     * 加密算法
     * @var string
     */
    protected $method = 'DES-EDE3';


    /**
     * @param $contents
     * @return false|string
     */
    public function callback($contents)
    {
        $json_data = $contents['json_data'] ?? '';
        $sign_data = $contents['sign_data'] ?? '';
        if (!$sign_data) {
            return $this->error('sign_data is not empty.');
        }
        if (!$json_data) {
            return $this->error('json_data is not empty.');
        }
        $method = $this->method;
        $key = $this->config['private_key'];
        $des = new DES($key, $method, DES::OUTPUT_HEX);
        $str = $des->decrypt($json_data);
        $sign = strtolower(hash('sha256', $str));
        if (trim($sign) !== trim(strtolower($sign_data))) {
            return $this->error('sign_data is invalid.');
        }
        return $str;
    }

    /**
     * @param $msg
     * @param $code
     * @return false|string
     */
    public function success($msg = '', $code = '0000')
    {
        $result = [
            'res_msg' => $msg,
            'res_code' => $code,
        ];
        return json_encode($result, JSON_UNESCAPED_SLASHES);
    }

    /**
     * @param $msg
     * @param $code
     * @return false|string
     */
    public function error($msg, $code = '-1')
    {
        $result = [
            'res_msg' => $msg,
            'res_code' => $code,
        ];
        return json_encode($result, JSON_UNESCAPED_SLASHES);
    }
}
