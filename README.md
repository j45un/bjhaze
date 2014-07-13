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
		components��������ü��ϡ�������ʹ��componentName => array('class' => 'classname')�滻Ĭ�ϼ����ࡣ����component������ڿ�����(Controller)��ģ��(Model)��ֱ�ӵ��á�
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
### ·��(Router)ʵ��
```php
return array(
    'rules' => array(
        '/' => 'home/index',
        '/{page}' => 'home/page/page/{page}',
        '/category/{tag}' => 'home/category/tag/{tag}',
        '/post/{id}' => 'home/post/id/{id}',
        '/comment' => 'home/comment'
    ),
    'patterns' => array(
        'page' => "[0-9]+",
        'tag' => '[0-9]+',
        'id' => '\d+'
    ),
	'separator' => '/'
);
```
### ����·��(Router)
		bjhaze����·��(Router)ʹ������controller/action/key/value(moudle/controller/action)�ķ�ʽ������������
		���Ӳ���Ĭ��ʹ��key/value����ʽ��
		router���õ�separator������޸ķָ�����
		defaultController��defaultAction���ӦĬ�Ͽ������ͷ�����
### ����·��(RegexRouter)
		bjhazeĬ�ϵ�����ַ���ʽ��
		�ڻ���·��(Router)�Ļ����ϣ�����·��(RegexRouter)�ṩ�˶�URL������д�Ĺ��ܡ�
		ͨ��������rules��patterns��������Ĭ��·�ɵĻ����Ͻ���URL����ƥ������д��
������(Controller)
-----------------------------------
### ���ҳ��
		bjhaze����������ʵ��XML,JSON,�Լ�HTMLҳ��������
		eg:$this->renderJSON(array('data' => array(..)));
		$this->renderXML(array('data' => array(..)));
		$this->render('homepage', array('data' => array(..)));
		������HTML���ʱ��Ĭ�ϴ�appliaction/views/controllername/
### ���عҼ�
		bjhaze������ʹ��widget�������عҼ���
		�����ֱ�ΪWidget�������ͼ��ز�����
		eg:$this->widget('Footer', array('friendLinks' => ..));
�Ҽ�(Widget)
-----------------------------------
### bjhaze�Ҽ�ͨ��ʵ��run���������ڷ����е���renderʵ����Ⱦ��ʵ����
```php
use BJHaze\Widget\Widget;

class Footer extends Widget
{

    public function run()
    {
        $this->render('footer', array(
            'categories' => (new Category())->getList()
        ));
    }
}
```
		
ҳ�����(Response)
-----------------------------------
### �����������
```php
'response' => array(
	'cachePaths' => array('home/page' => 60)//ҳ��home/page����60��
),
```
### ��������ַ���
```php
'response' => array(
	'charset' => 'gbk'
),
```
### ���header��
```php
$this->response->setHeader('Content-Type', 'text/xml');
```
ģ��(Model)
-----------------------------------
### BJHaze�ṩ����BJHaze\Database��ģ��(model)�㡣 ��Ҫʵ���˻�����������ɾ�Ĳ飬���ֶ���֤���ܡ�ʾ��:
```php
class Category extends Model
{
    protected $connection = 'access';//��Ӧ�����ݿ�����

    protected $table = '{{category}}';//��Ӧ�����ݱ�

    protected $primaryKey = 'id';//����,����������(��������).
    
    public function validations()
    {
        return array(
            'addtime' => 'date'//��Ӻ͸��¼�¼ʱ��Ӧ���ֶ���֤,
            //������֤֧����쿴BJHaze\Validation\Validator�ࡣ
        );
    }
}
```
### ģ��(Model)ʹ��ʵ����
```php
$category = new Category();

$category->create(array('name' => 'catname'));

$category->update(array('id' => 1,  'name' => 'catname'));//�����ṩ����id��Ϊ��������,
//�������������������ṩȫ��������Ӧ�ļ���

$category->delete(1)//����ǵ�һ����֧������array(1,2,3)����ʽ����ɾ��

$category->read(array(1,2,3));//ͬ�ϣ���һ����֧��ID�����ȡ�������ݡ�
```
PDO���ݿ�(Database)
-----------------------------------
### BJHazeʹ��PDO��Ϊ���ݿ�����㡣����ʵ����
```php
return array(
    'defaultConnection' => 'access',
    'connections' => array(
        'access' => array(
            'masters' => array(
                "odbc:driver={microsoft access driver (*.mdb)};dbq=" . dirname(__DIR__) . "/data/blog.mdb"
                //"mysql:host=localhost;dbname=blog;charset=gbk"
            ),
            'username' => 'root',
            'password' => '',
            'prefix' => 'bjhaze_',
            'attributes' => null
        )
    )
);
```
��ѯʾ��:
```php
$this->db->select()
         ->from('{{table}}')// ����ʹ��"{{ table_name}}"����SQLִ��ʱ�Զ���ӱ�ǰ׺��
         ->leftJoin('{{table2}}', '{{table}}.id = {{table2}}.id')
         ->where(array( 'id' => 11)) //  ���ͬ�� where('id = ?', 11) 
         ->orWhere('id > ?', 21)//����ʹ��'?'��Ϊռλ��,
         //BJHaze\Database\Manager������:id  ��������εĲ�������ͬһ��SQL��
         //��ʹ��һЩ��֧��������������ݿ�Ҳ������insert����������ݡ�
         ->limit(10,10)
         ->queryAll('def');//defΪ��Ӧ�����ݿ����� ���������д��ʹ��Ĭ�����ݿ�
```
����ʾ��:
```php
$data = array(
    array('name'=> 'jim','age'=>20),
    array('name'=>'tom','age'=>18)
)
$this->db->insert($table, $data)->execute($connection);
```
�޸�ʾ��:
```php
$this->db->update($table, array('age' =>19))
         ->where('id = ?', 11)
         ->execute($connection);
```
ɾ��ʾ��:
```php
$this->db->delete($table)
         ->where( 'id BETWEEN  ? AND ?', 100, 200)
         ->execute($connection);
```
����(Cache)
-----------------------------------
### ����ʾ��
```php
return array(
    'default' => 'apc',
    'servers' => array(
        'apc' => array(
            'driver' => 'apc'
        ),
        'redis' => array(
            'driver' => 'redis',
            'server' => array(
                'host' => 'localhost',
                'port' => 6379,
                'timeout' => 0,
                'pconnect' => false,
                'auth' => null
            ),
            'prefix' => 'bjhaze_redis'
        ),
        'memcache' => array(
            'driver' => 'memcache',
            'servers' => array(
                array(
                    'host' => 'localhost',
                    'port' => 11211
                )
            )
        )
    )
);
```