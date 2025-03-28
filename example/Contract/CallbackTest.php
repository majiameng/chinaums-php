<?php
include_once '../../vendor/autoload.php';

use tinymeng\Chinaums\Factory;

date_default_timezone_set('PRC');

$config = include_once './Config/Config.php';

$data = [
    'sign_data' => '05B4F92A5848093B3750AA61FFF56283D01F9A7EBB9103AC8D2D6AAB2D3A8E12',//请求时间
    'json_data'=>'a45543c12ffc73f8a3e1db0594812ae1e7ca1d7c3cf5af6a4b84591ec26f5c66a47afb93cee81ff13ff536f90d3f6e98178053749de896f2272f28d841998829e33de4a0ca58d904eaa74e29659ebe64c9b6b5757eb4d4f6a283fcdc5b206b4f48a171fab455d25f20bbc58b57b4d14a642ec91bccfeb2cc040ebd380142fccce51b3e290c1a94e0d160009091b89c139487476a8f4a3b2a43ba5c211e674d4fb37ef0a7ec426a7e05e7134d71a4a0ef0c944ccdf39fed48168a4a6f4e192be50c944ccdf39fed480b80054601d677485de2141352a4fa1016d5156f6a13d58f3af50d35223e2cbb29799e7d9546971d040987be04521daf76073580257c18769b1991ce4981934fe4bc578e6b79e9bc8d8a60989caefa05748cef8cf4a523059b1991ce4981934f7774c09bb6de1b59c5df9e62069fbecfe4bc578e6b79e9bc531acb7c3f61ca739b1991ce4981934fa99b904f005b7bdac5df9e62069fbecf29519d064722053bffdfb001e636e0c260fc7c9e7aae86216d7c64cb1d22dcd38f3786a5db0097ce2e028a329e09c48cef2cb27b0901203ee369a93927bfb06b6a785f7dc931aeb104b97cece6f16a9e3adcea97b31bb91aa661d8d09e82ee60e9529df9a16aa21d94b5d1f5e6936538026ffe283f321484e1093e842ca2c87053d47cab9b60142ff65389f1bdc3d72626695d72c19dd48ddc6e964c2e14f0408e002c6cb35bab7b0bbe6c0e898cef2f937e2e6d203db93b194a5f1ef21d259e1f06030aedd36210c8ecd293669c5b12fc2f17f1d55fbd297cb91e19c60ae5f2d73b857b4720331687e9c2438216a997b7ad1786b975687f066a6b03d2b670f8cdfb197abc3fa07043bf28ce95d7ee39fc4aa425e87b6144272ac30dd64698bd4ee7206618d0405d02bb6014727f207c67c05696534dc791c43b2ffa366a9d445f5285ef50c7b19ae4708cdea1dc5b02207b3ca193783869daf00b463a851616ac72131dfdde1e380f8ebc7c44ed0f9821a8213064225e4eebf381bc17f457e24010741a5eba127b0ebff6dfa006698a6ecd4ddd1647a090eb6a5db6245d5157dd46fb6998e315f275b4b0b3a4dd738f68b6b6f4a7e8079a5d7fe6328ea5006d02593cb4a24748b8c71ff16430946603e7241fd4f070b5be8261f50d00c73c64858ed297d954e4743d7449d7fa2dc3d0803c7ab8b4a1c040ccedc0f8327580264acc5eb4bf2355a9f34dded24ef2bbfa8897cd1aa314a2cde333eb9df0e8636b892278b22cd1175394287572dc48e6d207597fd9a8b0fbdbe45f36e4a03adf06fa5c98cc6d2c7840a53de228700f61983c1b7b7151a82b0e34e27417a4128f0bba17dfe5876b9f392116c22e3c30376a2155d9a2be52051a42c95bb2fcc2eaae3b019910d22e137f8f0cd759553aa0ca60c8025d51b19918de7ecc68f9d9f2f2b507c4434d9b1ab4f4b11774647642910736cdbd09b882eaa46f3ffb44b7d07ad26e36faddf57dc095bcd2af6ca763590922e63442eca5daa306102e051719f464f49eb07cbb79def7b54f3c7abe2986f894d62c8675abdbd966964dcdfa3c7381cb118697aff9dc19aced204028a089e4db49eea7f166a2bc8c64a6ac282eb841f3119d85b2134788360ffedbc65058854358b0efb3f9dfc77d45bd08144de61d5bb976ccf0a2a437dec97bac38dbffc8d94cc4ad733d66499888fe3ebceaab00b9b3840cd4dcf7f138ffe1cf973b0d62a32edcf0e8fc2a482d2a68ad20cc43a5451cd6e608931c26f2aaa4d3c52ea28e7896a0218c9101fd2bad9196798f31b5dddfca2cb10cbabe4fa09b62ea5fdff92026c669d6b47649e1f1201dfc814a06b1f5d76b4c1d346e764ab5f9a7dd1fb390d08459d282e10568348f3d192860e1dc2f5579ce701989906fea4de2993120bad80ba84abfeb3c6b8c30f743e8bc7c89fdf1e93f49059b0b52883c806232cd98612033e3cd56'
];
Factory::config($config);
$response = Factory::Contract()->callback($data);
echo 'response:' . $response . PHP_EOL;
echo Factory::Contract()->success().PHP_EOL;
