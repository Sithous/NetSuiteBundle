Netsuite implmentation for Symfony. The orginal source and samples can be found here: http://www.netsuite.com/portal/developers/resources/suitetalk-sample-applications.shtml

The license for the Netsuite PHP ToolKit is located at [NetSuite/NetSuite Toolkit License Agreement.docx](https://github.com/Sithous/NetSuiteBundle/blob/master/NetSuite/NetSuite%20Toolkit%20License%20Agreement.docx "Title")

#Installation 

using composer add the line below to your require section:

```json
	"sithous/netsuitebundle": "dev-master"
```

then

```bash
composer.phar update
```

Add the bundle to your AppKernel.php file

```php
	new Sithous\NetSuiteBundle\SithousNetSuiteBundle(),
```

Next you will copy and append these parameters to your app/config/parameters.yml and edit them appropriately:

```yaml
	    netsuite.host:      "https://webservices.netsuite.com"
	    netsuite.email:     "email@example.com"
	    netsuite.password:  "your_password"
	    netsuite.role:      "3"
	    netsuite.account:   "12345"
```
	    
We also recommend doing the exact same information into the app/config/parameters.yml.dist WITHOUT your creds so you can set them up when doing an initial install (such as deploying to production server).

I will do my best to keep this bundle up-to-date with the Symfony and NetSuite toolkit changes. But I am human and only have so much time. Feel free to contribute, the more the better.

#Usage
Inside your controller simply initialize using this command

```php
	$this->container->get('sithous.netsuite');
```

After you have initialized you can use the classes anywhere by adding it to your uses:

```php
	class MyController extends Controller {

		public function indexAction() {

			$this->container->get('sithous.netsuite');

			$service = new \NetSuiteService();

			$request = new \GetRequest();
			$request->baseRef = new \RecordRef();
			$request->baseRef->internalId = "21";
			$request->baseRef->type = "customer";
			$getResponse = $service->get($request);

			if (!$getResponse->readResponse->status->isSuccess) {
			    echo "GET ERROR";
			} else {
			    $customer = $getResponse->readResponse->record;
			    echo "GET SUCCESS, customer:";
			    echo "\nCompany name: ". $customer->companyName;
			    echo "\nInternal Id: ". $customer->internalId;
			    echo "\nEmail: ". $customer->email;
			} 
		}
	}
```

# Further reading

You can find the toolkit documentation here: http://tellsaqib.github.io/NSPHP-Doc/index.html

#License

This bundle comes with dual licenses. One for the bundle itself and another for the NetSuite PHP ToolKit. You should review both licenses before using this bundle. Everything inside the NetSuite folder is code that is originally from the NetSuite PHP ToolKit that has been modified to work with this bundle and Symfony.
