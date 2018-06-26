<?php 

namespace App\Middleware;

class Authentication
{
	
    /**
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
	   	   
        if(!empty($request->getAttribute('token'))){

	   		$dataAtual = date('Y-m-d H:i:s');
            $dataExpiracao = $request->getAttribute('token')->data->expiration_at;

	   		if($dataAtual <= $dataExpiracao){
		        $response = $next($request, $response);
		        return $response;
	   		}else{
	   			return $response->withJson(['status' => 'error', 'message' => 'Token inválido!'], 401)->withHeader('Content-type', 'application/json'); 
	   		}
    	}
    }
}