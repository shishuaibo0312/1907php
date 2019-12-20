<?php
 return array (	
		//应用ID,您的APPID。
		'app_id' => "2016101500692808",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAwgMvroq1YWwtT6+a1WUab912ZFSy+gZYX+0NCldHSYDh1oxVpsVz5Z0mENq/b9tUpunmeGq2N3f0W2SvCm7rOEPifvrhF6vLhqGLmqPdx3xsD5WUdEisOvhUNaruvWp/4MQ9JxnXXVGhLmyFClz/e1ParAgcobFi6FmsEWTKaEhGWvtD5SkRPfjgplLFSdizqy+4uISIRWpaHLCsJW3a4W/ZY3L3NDja2dkCJBqnNfT9oTAzhusMqYT2Yztbz0jVyh7xMvaFfoyhpEHgS2WRDe8UB3onEU+XR3aw8PgkfrzxekCoB4wbA0x9rFb96Bk1EVvAAmCkzEIM3r9DYST82wIDAQABAoIBAHYKfj5SAp1ttfvfufLP+s/JDLlqlyJsLeTfU6nRBHyCP+XLqGk5hZRUks56aTNjXRPZB/KH6qnBABmDHsTYS6EGHI5pkf5W9hPJwiiqPsuathydQ5+kf7W5VXL5txvj6j4U56gcnt4WRlz6hc+SWZbtpAQ7Q0BVrvnzZS+IBWaAUmSmBtI0CHB3J4Wwc4QYpo2g+gpi1SE121w96Vza3dGxLThE1CjOd3zqg3Kp+TNb0L7B297ivzA4HOHg7tAt/FRhX++04fSGx4bx1IR3MDDm9p/eOt3SBhtQg7RwB9wPimDT1By0dyh9loOqdhtI/BIVqBTWACord6PlLogMVGECgYEA9aBiVtQ3dacnDPb84kYthDZbUaXFTayEmfZarjNFTXxR/rAJw2qQKg8G4OvVHD4aRfm/UhHaOMkKssJwO2YT7Z+0EbSymOOHQgrb4CQfLfnNNQsnNmna1VfwV3bKexGfIDeczX3amb98aZhjMz6+gx0QEo7OndiEsHCEX5vXMlkCgYEAyjTFgvA70klHXlFbPxBhMc3rdA8bh3W75mAIX78nmQml0OGmKn5byYoul2vhkWfRCPgMpOWfAmrTNzlqjJWnuRCIdJOjsMKQmiCzzegnOBNNmIZXKOuvO8HY634iikMKzENVBSbh5sZ8OU6jxX0MN+y1auVwYPZpsaTVzpbDulMCgYEAgfN9s7SJNvzdYzWVK123nRhpDfRnQ6X/bblx1nIXu1wHwXh/Yd0SMr5KhFshH9UXb2gnuZLqYlqzB0ppuHNUHcb9rNRuHQdbuywlkhtqR5e+4s5oy5gLiA4DgTK/A4eaKaBinDF2oxs1BmTyLt2GS7Xnl/noBIjWAsc0saSwoNkCgYEAlLySmIk7h6gtXhx8APx8chUlX76JInAg4gm7vyot521oUijZgKJnw+zn7qwFRV7XLUDAlD7vYujPKu0KChU/RWr65L2BB9FmamkpuYlN5/qS9mHDFS+gO1WQyVCD+a3s8GmKzXpXatiPodvNrcQYy75LiDDzI++9uVUljIvrt08CgYBo89ATmuywWGQVwL3YpJ4fifyosUDHj/axhRshonwrdNGN/1MaYq9s44Bj49r0IFY2qeQMJczIVnAc0xtzu+YJaV5QJ6boFYRhfC0RJEHgGOE3AmGefFTMu24lh4/9qr++eNz1I4VBi9daMNOxVAUmJdOf+Di74JNtIZ6cHiARHg==",
		
		//异步通知地址
		'notify_url' => "http://localhost/alipay/notify_url.php",
		
		//同步跳转
		'return_url' => "http://localhost/alipay/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtEqlCptaL97WIC2G0Mhk0VDXkmjvhNlO8qIwGm7p2ksBduhXLM77SSfaRk0QwmpqKXT+8GNZn5mF+r++2Icc6G2KN3WRheW9HWCl9UV0l8aLa/GWuMTgHDRGzO0KCX1yN5u+r6slqKle/RfdyUCeMWxdlhsLNNftmt2cyOGq/H1VGk1LARtjhZOHh5ACw5g/zMl1FHn9U2ftoEje3obR8FJFoRgLbHILALKmGOxNnCJ8PX8f7kaLGCBjo1wI/2FpQvTjBI5uHXO8mc/QGG8z0/RyWYGVguwoPAG931sfArAjJPsrAP25vg6FAXGZlUIR0ryHiIaUkA/y5qBHiNrfYwIDAQAB",
		
	
);