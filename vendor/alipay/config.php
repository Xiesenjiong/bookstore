<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016092500590059",

		//商户私钥
		'merchant_private_key' => "MIIEpgIBAAKCAQEA7p92Swat0GqQZP4blK54Yz3TRSqrnx3V81/F/l+noxCVtYTbXn77caIPIOIc1FtQbgVQ4zKg55IrC4rDipbUlr0hES+//+dBepNPVfAK+g0zpeU1AxnqHbzhMgEP/hAkbx8pOPRzHsEdlB+vcbVLE7myOmgSXYWj1ii6CUUEmfa4vymQIN6vdmFj1LKTXjoVNfGF/Gd9lasInrYW4bUjThcFhHH7poZplUWDK9As20vLpFSVJ+ZjMhp9/66eTKMNiccluSQArBonS58rxA1Y0WXQSiKialvM8fcC7NS4ZoaPHMli+y/w5ZKJhn/XecJ+Pss07FKPvbGsmeVwe8Fc5wIDAQABAoIBAQC7AP0TjwhobRr8CqhSvOhb3ffUHLyi1h71u/jOgOg/QqAQwS2pwJoNU5PHkWxGf8lob4IUi3jOAh75zKWx1sKD33Qqo+E0C2elSAzErHntvKrdN+Nzqrtu0rcpGOwPj1b+Ps1vdSNC1tT3YF1+HzXXH5AtdaHu6OycyQ4CdbRFczGuo2LSa0RXwKuEqhIGy5N0pIT3R8oWqpKCyBaWk+ogKrFjOIPzMKP+nwWlRFvJr7GeXH9QWTdaCz3ojWdt3cptJIYQiubD/hgD/+uJ5ePOVsK8duvpeKW402Qyuly4UnRzwfFuN8c+cAPQ9+UbvgHfu44+sBP58jSuoKcM8HMBAoGBAPjtTzHvLp5Sv9VrbYM3KPtZQ8ZlyU6KjbwHbQD9FVfKipzbsXC2LSbw6enseImtO9e0v3owc6fMSQWzkMyb/Hnl3UIvjyrROfmJp8bd5vAmhJ/XIavF71ak/Vz7VoItf6BOWfN5yWrYaAOvbD6QY9BkLbG0DcdmGnhu5Edv/wTzAoGBAPVnM3E5wIqqEN9AfUEJF6tTjCAblCDbAGI3c7SakCkKiuLEnZN+XKde9afmcznWwfriRgEQNUkZPpvtUPB/VrRxb8Y+XyBtbvPZImHRznSHf1RmmCERVyw0cj8IyZQ8TQzC/8I0yzi97/l5T56OR2ddlDEa7cLef4ZOoGTzZdU9AoGBAOIJ5Ass7UE5VRdAeO5ZDW7ITSIAVb9rU271s0bdih7xPdNYL5Vw6ClfRJl1cLNcSmYCrIkRLESn3Xs+5nLWBnrOf49VToUL/sAY/vA3mjhiUbYvjVTE5SPhqGxhktmc5TK1UzsjUQIjxrfp+LoLNYgLH+8o2AZEMi9ASyyPh5x/AoGBAI8OBhLvE6rB0OwT7/BFmKKrJXhiG0u73tFiefTCVV9XYfcnnqQoeWKoHJQv5uPEqXfTB/P+utFOAg1rnk9UK/ssVXg/S7zfjlpgLYbQg4WypytQU0aTkTmXqTHNsZTUQiY6VlWj6QO+1XGcoilPz5gWGRk3FXsPsU9d7mpq6OYRAoGBAJYl0R8Zk4Pk7EKRf1VeK45Z9hauUTULEbKAarfN19RHVo0GtacdRNtoK923z/+EERNgjUVGE6OmQJkghFSZIHIqAi3vEv9ojcUwMnkWNY315XTaqfRWoGK0Fuwo+uNyYbzQWL8ynFxV1TtjGSODk5Q0AN//4IHzymAJjdp3eWcx",
		
		//异步通知地址
		'notify_url' => "http://localhost/bookstore/public/index.php/front/pay/notify_url",
		
		//同步跳转
		'return_url' => "http://localhost/bookstore/public/index.php/front/pay/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAslJQf2/32+WQbJ301dKMZUBtvwGknYnsLLPuxlRP+qbXzxylgfFq0WOlGIgDQtU6PZ5JJR+OfIHbYcrFXES/ddrJmmJjvuug05olaJfm8MhVysIZRhWUKBaWiX3gptqhfSlBSvYNnhDl9XivQTsLkwXkYtPk2ktGeI7xO6vfoT8kE8MH5WtuRR+H9FcGSG6uU2ZWEGnMSjn5foCYO32HaLvX4IEJCHyklRI8nFMDR7L/hctZB6gGAID8w2yyt5j02IMO2UECtkIxSsFy2JSNsgCilR4o9Pt9Cd45YAti3tMoP75SRx9KdVQhEWbxQaSgHRHpvUn7PPLdlV0ve25zMQIDAQAB",
);