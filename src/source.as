package 
{
	import flash.display.Loader;
	import flash.display.LoaderInfo;
	import flash.display.Sprite;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.net.URLRequestHeader;
	import flash.net.URLRequestMethod;

	public class source extends Sprite 
	{

		public function source() 
		{
			var myJson: String = this.root.loaderInfo.parameters.jsonData;
			var url: String = this.root.loaderInfo.parameters.php_url;
			var endpoint: String = this.root.loaderInfo.parameters.endpoint;
			var ct: String = (this.root.loaderInfo.parameters.ct)?this.root.loaderInfo.parameters.ct:"application/json";
			var request: URLRequest = new URLRequest(url + "?endpoint=" + endpoint);
			request.requestHeaders.push(new URLRequestHeader("Content-Type", ct));
			request.data = (this.root.loaderInfo.parameters.reqmethod=="GET")?"":myJson;
			request.method = (this.root.loaderInfo.parameters.reqmethod)?this.root.loaderInfo.parameters.reqmethod:URLRequestMethod.POST;
			var urlLoader: URLLoader = new URLLoader();
			try 
			{
				urlLoader.load(request);
				return;
			}
			catch(e: Error) 
			{
				trace(e);
				return;
			}
		}
	}
}
