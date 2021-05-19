<?php namespace Controllers;
use Slim\Http\Response;
use Core\Base;
abstract class BaseController
{
	private $DB;

    protected function response($data, int $status, bool $error, Response $response): Response
    {
        $result = [
            "status" => $status,
            "error"  => $error,
            "message"=> $data
        ];
        return $response->withJson($result, $status);
    }

    protected function exist(string $table, array $data): bool
    {
    	$this->DB = new Base();
    	$result = null;
    	foreach ($data as $key => $value) {
    		$sql = "SELECT * FROM $table WHERE $key = '$value'";
    		$query = $this->DB->query($sql);
    		if ($query['response']->execute()) {
    			$data = $query["response"]->fetchAll();
    			$result .= (empty($data)) ? 0 : 1;
    		} else {
    			return false;
    		}
    	}
    	$response = strstr($result, 1);
    	return (!empty($response)) ? true : false;
    }

    protected function ip()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
    }

    protected function so($target)
    {
        if(strpos($target,'Windows') !== false) {
            return "Windows";
        } elseif (strpos($target,'Macintosh') !== false) {
            return "Mac";
        } elseif (strpos($target,'Linux') !== false) {
            return "Linux";
        } else {
            return "Otro SO";
        }
    }

    protected function browser($target)
    {
        if(strpos($target, 'MSIE') !== false)
               return 'Internet explorer';
             elseif(strpos($target, 'Edge') !== false)
               return 'Microsoft Edge';
             elseif(strpos($target, 'Trident') !== false)
                return 'Internet explorer';
             elseif(strpos($target, 'Opera Mini') !== false)
               return "Opera Mini";
             elseif(strpos($target, 'Opera') || strpos($target, 'OPR') !== false)
               return "Opera";
             elseif(strpos($target, 'Firefox') !== false)
               return 'Mozilla Firefox';
             elseif(strpos($target, 'Chrome') !== false)
               return 'Google Chrome';
             elseif(strpos($target, 'Safari') !== false)
               return "Safari";
             else
               return 'navegador no detectado';
    }

    public function __destruct()
    {
    	$this->DB = null;
    }
}