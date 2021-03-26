<?php

require_once(__DIR__ ."/../dao/tokendao.php");
require_once(__DIR__ ."/../config/authentification.php");

  class TokenController extends Authentification{
 /**
     * @OA\Get(
     *     path="/token",
     *     tags={"token"},
     *     summary="Find token by ID",
     *     description="Returns a single token",
     *     operationId="gettokenById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of token to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Token"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="token not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function getone(){

      $token = new TokenDao(null);
      $id = $_GET["id"];
      return $token->getone($id);
    }
	/**
	 * @OA\Get(
	 *   path="/tokens",
     *   tags={"token"},
	 *   summary="list tokens",
	 *   @OA\Response(
	 *     response=200,
	 *     description="A list with tokens"
	 *   ),
	 *   @OA\Response(
	 *     response="default",
	 *     description="an ""unexpected"" error" 
	 *   )
	 * )
	 */
    public function getall(){

      $token = new TokenDao(null);
      return $token->getall();
    }
	  /**
     * Add a new token 
     * 
     * @OA\Post(
     *     path="/token",
     *     tags={"token"},
     *     operationId="addToken",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Token")
	       )
     * )
     */
    public function create(){

      $data = json_decode(file_get_contents("php://input"));
      $token = new TokenDao($data);
      return $token->create($data);
    }
	  /**
     * Edit an existing token 
     * 
     * @OA\Patch(
     *     path="/token",
     *     tags={"token"},
     *     operationId="editToken",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     
     *     @OA\RequestBody(
 *         
 *          required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Token")
	       )
     * )
     */
    public function edit(){

      $data = json_decode(file_get_contents("php://input"));
      $token = new TokenDao($data);
      return $token->edit($data);
    }
	/**
     * @OA\Delete(
     *     path="/token",
     *     tags={"token"},
     *     summary="delete  token by ID",
     *     description="Deletess a single token",
     *     operationId="deletetokenById",
     *     @OA\Parameter(
     *         name="Id",
     *         in="query",
     *         description="ID of token to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *        
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid ID supplier"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="token not found"
     *     ),
     *    
     * )
     *
     * @param int $id
     */
    public function delete(){

      $data = json_decode(file_get_contents("php://input"));
      $token = new TokenDao($data);
      return $token->delete($data);
    }
	
	

}

?>