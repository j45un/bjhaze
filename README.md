bjhaze ʹ��˵����
===================================
Ӧ������(Application)
-----------------------------------
### Ӧ������(Application)ʵ��
```php
$config = array(
    'basePath' => dirname(__DIR__),
    'composer' => USE_COMPOSER,
    'timezone' => 'PRC',
    'site_name' => 'bjhaze demo',
    'site_keywords' => 'bjhaze,php5.4 framework',
    'site_description' => 'bjhaze is a simple php5.4 mvc framework',
    'modules' => array('admin'),
    'components' => array(
        'sessionHandler' => array(
            'class' => 'BJHaze\Session\Handler\File',
            'path' => dirname(__DIR__) . '/tmp'
        ),
        'db' => require 'db.php',
        'router' => require 'routes.php',
        'cache' => require 'cache.php',
        'response' => array(
            'charset' => 'gbk',
            'cachePaths' => array()
        )
    )
)
```
### Ӧ������(Application)��������
		basePath��Application�ĸ��ļ��С�
		composer���Ƿ�ʹ��composerʵ��php����Զ����ء�
		timezone��ʱ�����á�
		modules��վ��ģ��(module)���ϡ�
		components��������ü��ϡ�������ʹ��componentName => array('class' => 'classname')�滻Ĭ�ϼ����ࡣ
### bjhazeĬ�ϼ������
		request��BJHaze\Http\Request
		response��BJHaze\Http\Response
		router��BJHaze\Routing\RegexRouter
		db��BJHaze\Database\Manager
		cache��BJHaze\Cache\CacheManager
		session��BJHaze\Session\Manager
		sessionHandler��BJHaze\Session\Handler\File
		exceptionHandler��BJHaze\Exception\Handler
		encrypter��BJHaze\Encryption\Encrypter
		validator��BJHaze\Validation\Validator
·��(Router)
-----------------------------------
������(Controller)
-----------------------------------
�Ҽ�(Widget)
-----------------------------------
ҳ�����(Response)
-----------------------------------
ģ��(Model)
-----------------------------------
PDO���ݿ�(Database)
-----------------------------------
����(Cache)
-----------------------------------

